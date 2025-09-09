<?php
// ProductsController.php
// Controller untuk handle semua request CRUD produk.
// Memakai Controller base class (render, e(), CSRF helpers).

class ProductsController extends Controller
{
    private $model;

    public function __construct()
    {
        // instantiate model
        $this->model = new ProductModel();
    }

    // GET /products (list semua produk)
    public function index()
    {
        $products = $this->model->all();
        // panggil view dengan data products
        $this->view('products/index', ['products' => $products]);
    }

    // GET /products/create (tampilkan form create)
    public function create()
    {
        // buat CSRF token untuk form
        $csrf = $this->generateCSRFToken();
        $this->view('products/form', ['action' => 'store', 'csrf' => $csrf]);
    }

    // POST /products/store (proses simpan)
    public function store()
    {
        // Validasi CSRF
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        // Sanitasi & validasi input dasar
        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '0');
        $supplier = trim($_POST['supplier'] ?? '');

        $errors = [];

        // Validasi: required fields
        if ($code === '') $errors[] = "Kode produk wajib diisi.";
        if ($name === '') $errors[] = "Nama produk wajib diisi.";
        if (!is_numeric($price) || $price < 0) $errors[] = "Harga harus angka >= 0.";

        // cek unique code
        if ($this->model->existsByCode($code)) $errors[] = "Kode produk sudah digunakan.";

        // Proses upload file jika ada
        $uploadedFilename = null;
        if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['image']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            // kalau ada error, tampilkan form lagi dengan pesan error
            $csrf = $this->generateCSRFToken();
            $this->view('products/form', [
                'action' => 'store',
                'errors' => $errors,
                'old'    => ['code'=>$code,'name'=>$name,'price'=>$price,'supplier'=>$supplier],
                'csrf'   => $csrf
            ]);
            return;
        }

        // Siapkan data untuk disimpan
        $data = [
            'code'     => $code,
            'name'     => $name,
            'price'    => $price,
            'image'    => $uploadedFilename,
            'supplier' => $supplier,
        ];

        $id = $this->model->create($data);

        // Redirect balik ke list
        $this->redirect('products');
    }

    // GET /products/edit/{id}
    public function edit($id)
    {
        $product = $this->model->find($id);
        if (!$product) {
            echo "Produk tidak ditemukan.";
            return;
        }
        $csrf = $this->generateCSRFToken();
        $this->view('products/form', ['action' => 'update', 'product' => $product, 'csrf' => $csrf]);
    }

    // POST /products/update/{id}
    public function update($id)
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $product = $this->model->find($id);
        if (!$product) {
            echo "Produk tidak ditemukan.";
            return;
        }

        // Ambil input dan validasi
        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '0');
        $supplier = trim($_POST['supplier'] ?? '');

        $errors = [];
        if ($code === '') $errors[] = "Kode produk wajib diisi.";
        if ($name === '') $errors[] = "Nama produk wajib diisi.";
        if (!is_numeric($price) || $price < 0) $errors[] = "Harga harus angka >= 0.";

        // cek unique code kecuali baris yang diedit
        if ($this->model->existsByCode($code, $id)) $errors[] = "Kode produk sudah digunakan oleh produk lain.";

        // Handle upload (jika user upload file baru maka hapus file lama setelah sukses)
        $uploadedFilename = $product['image']; // default keep old
        if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['image']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
                // hapus file lama jika ada & bukan null
                if (!empty($product['image']) && is_file(UPLOAD_DIR . $product['image'])) {
                    @unlink(UPLOAD_DIR . $product['image']);
                }
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('products/form', [
                'action' => 'update',
                'errors' => $errors,
                'product'=> ['id'=>$id,'code'=>$code,'name'=>$name,'price'=>$price,'supplier'=>$supplier,'image'=>$uploadedFilename],
                'csrf'   => $csrf
            ]);
            return;
        }

        $data = [
            'code'     => $code,
            'name'     => $name,
            'price'    => $price,
            'image'    => $uploadedFilename,
            'supplier' => $supplier
        ];

        $this->model->update($id, $data);

        $this->redirect('products');
    }

    // GET or POST /products/delete/{id}
    public function delete($id)
    {
        // Untuk keamanan, gunakan method POST di UI. Namun front controller memanggil method ini.
        // Kita cek kalau request method adalah POST dan CSRF valid, kalau tidak tolak.
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die('Invalid request method.');
        }
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $product = $this->model->find($id);
        if (!$product) {
            echo "Produk tidak ditemukan.";
            return;
        }

        // Hapus record
        $this->model->delete($id);

        // Hapus file image jika ada
        if (!empty($product['image']) && is_file(UPLOAD_DIR . $product['image'])) {
            @unlink(UPLOAD_DIR . $product['image']);
        }

        $this->redirect('products');
    }

    // ===== helper untuk upload file image aman =====
    private function handleUpload($file)
    {
        // Max file size 2MB (ubah kalau perlu)
        $maxSize = 2 * 1024 * 1024;

        // ekstensi yang diizinkan
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        // cek error upload dasar
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['success'=>false, 'error'=>'Upload error kode: ' . $file['error']];
        }

        // cek size
        if ($file['size'] > $maxSize) {
            return ['success'=>false, 'error'=>'Ukuran file terlalu besar (max 2MB).'];
        }

        // gunakan finfo untuk cek MIME type (lebih aman daripada bergantung ekstensi)
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        $validMimes = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'];

        if (!isset($validMimes[$mime])) {
            return ['success'=>false, 'error'=>'Tipe file tidak diizinkan.'];
        }

        // tentukan ekstensi dari MIME type
        $ext = $validMimes[$mime];

        // generate nama file unik (random + time) untuk mencegah collision & directory traversal
        $newName = bin2hex(random_bytes(8)) . '_' . time() . '.' . $ext;

        // pastikan upload dir ada
        if (!is_dir(UPLOAD_DIR)) {
            if (!mkdir(UPLOAD_DIR, 0755, true)) {
                return ['success'=>false, 'error'=>'Gagal membuat folder upload.'];
            }
        }

        // pindahkan file dari tmp ke folder uploads (gunakan move_uploaded_file)
        $target = UPLOAD_DIR . $newName;
        if (!move_uploaded_file($file['tmp_name'], $target)) {
            return ['success'=>false, 'error'=>'Gagal menyimpan file.'];
        }

        // set permission file (opsional)
        @chmod($target, 0644);

        return ['success'=>true, 'filename'=>$newName];
    }
}
