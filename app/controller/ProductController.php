<?php
require_once __DIR__ . '/../library/Controller.php';
require_once __DIR__ . '/../library/fpdf.php';

class ProductController extends Controller
{
    private $model;

    public function __construct()
    {
        // Proteksi login
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: /webFitcom2025_SkinfaDev_smkinformatikaalirsyad/login");
            exit;
        }

        $this->model = new ProductModel();
    }
    // GET /products (list semua produk)
    public function index()
    {
        $products = $this->model->all();
        $this->view('products/index', [
            'title' => 'Table Management Products - Tani Digital',
            'active' => 'products',
            'products' => $products
        ]);
    }

    // GET /products/create (tampilkan form create)
    public function create()
    {
        $csrf = $this->generateCSRFToken();
        $this->view('products/form', ['action' => 'store', 'csrf' => $csrf]);
    }

    // POST /products/store (proses simpan)
    public function store()
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '0');
        $unit = trim($_POST['unit'] ?? '');

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
                'old' => ['code' => $code, 'name' => $name, 'price' => $price, 'unit' => $unit],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'code' => $code,
            'name' => $name,
            'price' => $price,
            'image' => $uploadedFilename,
            'unit' => $unit,
        ];

        $id = $this->model->create($data);

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

        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $price = trim($_POST['price'] ?? '0');
        $unit = trim($_POST['unit'] ?? '');

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
                'product' => ['id' => $id, 'code' => $code, 'name' => $name, 'price' => $price, 'unit' => $unit, 'image' => $uploadedFilename],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'code' => $code,
            'name' => $name,
            'price' => $price,
            'image' => $uploadedFilename,
            'unit' => $unit
        ];

        $this->model->update($id, $data);

        $this->redirect('products');
    }

    // GET or POST /products/delete/{id}
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

        $this->redirect('products');
    }

    // ===== helper untuk upload file image aman =====
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

    public function exportPdf()
    {
        // Set timezone di awal fungsi
        date_default_timezone_set('Asia/Jakarta');

        $products = $this->model->all();

        $pdf = new FPDF();
        $pdf->AddPage();

        // ==== HEADER ====
        $pdf->Image(__DIR__ . '/../../assets/img/logo/logo-dashboard-img.png', 10, 8, 20); // logo
        $pdf->SetFont('Helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Tani Digital', 0, 1, 'C');
        $pdf->SetFont('Helvetica', '', 10);
        $pdf->Cell(0, 5, 'Jl. Pertanian No. 123, Cirebon | 0812-3456-7890', 0, 1, 'C');
        $pdf->Ln(5);

        // Garis pemisah
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(10, 35, 200, 35);
        $pdf->Ln(15);

        // ==== JUDUL ====
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Laporan Data Produk', 0, 1, 'C');
        $pdf->Ln(5);

        // ==== TABEL ====
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->SetFillColor(200, 220, 255);

        $w = [10, 30, 70, 40, 30];
        $header = ['No', 'Kode', 'Nama Produk', 'Harga', 'Satuan'];

        for ($i = 0; $i < count($header); $i++) {
            $pdf->Cell($w[$i], 10, $header[$i], 1, 0, 'C', true);
        }
        $pdf->Ln();

        $pdf->SetFont('Helvetica', '', 10);
        $fill = false;
        $no = 1;
        foreach ($products as $row) {
            $pdf->SetFillColor(245, 245, 245);
            $pdf->Cell($w[0], 8, $no++, 1, 0, 'C', $fill);
            $pdf->Cell($w[1], 8, $row['code'], 1, 0, 'C', $fill);
            $pdf->Cell($w[2], 8, $row['name'], 1, 0, 'L', $fill);
            $pdf->Cell($w[3], 8, number_format($row['price']), 1, 0, 'R', $fill);
            $pdf->Cell($w[4], 8, $row['unit'], 1, 0, 'C', $fill);
            $pdf->Ln();
            $fill = !$fill;
        }

        // ==== FOOTER ====
        $pdf->Ln(5);
        $pdf->SetFont('Helvetica', 'I', 9);

        // Format waktu: Minggu, 28 September 2025 14:32:10
        $tanggalCetak = date('l, d F Y H:i:s');
        // Terjemahkan hari & bulan ke bahasa Indonesia (opsional)
        $indonesianDays = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $indonesianMonths = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $tanggalCetak = strtr($tanggalCetak, $indonesianDays);
        $tanggalCetak = strtr($tanggalCetak, $indonesianMonths);

        $pdf->Cell(0, 10, 'Dicetak pada: ' . $tanggalCetak, 0, 0, 'L');
        $pdf->Cell(0, 10, 'Halaman ' . $pdf->PageNo(), 0, 0, 'R');

        // Output PDF
        $pdf->Output('D', 'laporan_produk_' . date('Y-m-d_H.i') . '.pdf');
    }



}
