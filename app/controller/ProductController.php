<?php
require_once __DIR__ . '/../library/Controller.php';

class ProductController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    // read
    public function index()
    {
        $products = $this->model->all();
        $this->view('products/index', [
            'title' => 'Table Management Products - Tani Digital',
            'active' => 'products',
            'products' => $products
        ]);
    }

    // create
    public function create()
    {
        $csrf = $this->generateCSRFToken();
        $this->view('products/form', ['action' => 'store', 'csrf' => $csrf]);
    }

    // store
    public function store()
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $code = trim($_POST['kode'] ?? '');
        $name = trim($_POST['nama'] ?? '');
        $price = trim($_POST['harga'] ?? '0');
        $unit = trim($_POST['satuan'] ?? '');

        $errors = [];

        if ($code === '')
            $errors[] = "Kode produk wajib diisi.";
        if ($name === '')
            $errors[] = "Nama produk wajib diisi.";
        if (!is_numeric($price) || $price < 0)
            $errors[] = "Harga harus angka >= 0.";

        if ($this->model->existsByCode($code))
            $errors[] = "Kode produk sudah digunakan.";

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
            $csrf = $this->generateCSRFToken();
            $this->view('products/form', [
                'action' => 'store',
                'errors' => $errors,
                'old' => ['kode' => $code, 'nama' => $name, 'harga' => $price, 'satuan' => $unit],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kode' => $code,
            'nama' => $name,
            'harga' => $price,
            'image' => $uploadedFilename,
            'satuan' => $unit,
        ];

        $id = $this->model->create($data);

        $this->redirect('/');
    }

    // edit
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

    // update
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

        $code = trim($_POST['kode'] ?? '');
        $name = trim($_POST['nama'] ?? '');
        $price = trim($_POST['harga'] ?? '0');
        $unit = trim($_POST['satuan'] ?? '');

        $errors = [];
        if ($code === '')
            $errors[] = "Kode produk wajib diisi.";
        if ($name === '')
            $errors[] = "Nama produk wajib diisi.";
        if (!is_numeric($price) || $price < 0)
            $errors[] = "Harga harus angka >= 0.";

        if ($this->model->existsByCode($code, $id))
            $errors[] = "Kode produk sudah digunakan oleh produk lain.";

        $uploadedFilename = $product['image'];
        if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['image']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
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
                'product' => ['id' => $id, 'kode' => $code, 'nama' => $name, 'harga' => $price, 'satuan' => $unit, 'image' => $uploadedFilename],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kode' => $code,
            'nama' => $name,
            'harga' => $price,
            'image' => $uploadedFilename,
            'satuan' => $unit
        ];

        $this->model->update($id, $data);

        $this->redirect('/');
    }

    // delete
    public function delete($id)
    {
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

        $this->model->delete($id);

        if (!empty($product['image']) && is_file(UPLOAD_DIR . $product['image'])) {
            @unlink(UPLOAD_DIR . $product['image']);
        }

        $this->redirect('/');
    }

    // helper upload
    private function handleUpload($file)
    {
        $maxSize = 2 * 1024 * 1024;

        $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['success' => false, 'error' => 'Upload error kode: ' . $file['error']];
        }

        if ($file['size'] > $maxSize) {
            return ['success' => false, 'error' => 'Ukuran file terlalu besar (max 2MB).'];
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        $validMimes = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp'];

        if (!isset($validMimes[$mime])) {
            return ['success' => false, 'error' => 'Tipe file tidak diizinkan.'];
        }

        $ext = $validMimes[$mime];

        $newName = bin2hex(random_bytes(8)) . '_' . time() . '.' . $ext;

        if (!is_dir(UPLOAD_DIR)) {
            if (!mkdir(UPLOAD_DIR, 0755, true)) {
                return ['success' => false, 'error' => 'Gagal membuat folder upload.'];
            }
        }

        $target = UPLOAD_DIR . $newName;
        if (!move_uploaded_file($file['tmp_name'], $target)) {
            return ['success' => false, 'error' => 'Gagal menyimpan file.'];
        }

        @chmod($target, 0644);

        return ['success' => true, 'filename' => $newName];
    }
}
