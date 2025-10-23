<?php
require_once __DIR__ . '/../library/Controller.php';

class KendaraanController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new KendaraanModel();
    }

    // read
    public function index()
    {
        $kendaraans = $this->model->all();
        $this->view('kendaraan/index', [
            'title' => 'Manajemen Data Kendaraan - Tani Digital',
            'active' => 'kendaraan',
            'kendaraans' => $kendaraans
        ]);
    }

    // create
    public function create()
    {
        $csrf = $this->generateCSRFToken();
        $this->view('kendaraan/form', ['action' => 'store', 'csrf' => $csrf]);
    }

    // store
    public function store()
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $kode = trim($_POST['kode'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $tipe = trim($_POST['tipe'] ?? '');
        $warna = trim($_POST['warna'] ?? '');
        $harga = trim($_POST['harga'] ?? '0');
        $nopol = trim($_POST['nopol'] ?? '');

        $errors = [];

        if ($kode === '')
            $errors[] = "Kode kendaraan wajib diisi.";
        if ($nama === '')
            $errors[] = "Nama kendaraan wajib diisi.";
        if (!is_numeric($harga) || $harga < 0)
            $errors[] = "Harga harus berupa angka ≥ 0.";

        if ($this->model->existsByCode($kode))
            $errors[] = "Kode kendaraan sudah digunakan.";

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
            $this->view('kendaraan/form', [
                'action' => 'store',
                'errors' => $errors,
                'old' => [
                    'kode' => $kode,
                    'nama' => $nama,
                    'tipe' => $tipe,
                    'warna' => $warna,
                    'harga' => $harga,
                    'nopol' => $nopol
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kode' => $kode,
            'nama' => $nama,
            'tipe' => $tipe,
            'warna' => $warna,
            'harga' => $harga,
            'nopol' => $nopol,
            'image' => $uploadedFilename
        ];

        $this->model->create($data);
        $this->redirect('/kendaraan');
    }

    // edit
    public function edit($id)
    {
        $kendaraan = $this->model->find($id);
        if (!$kendaraan) {
            echo "Data kendaraan tidak ditemukan.";
            return;
        }
        $csrf = $this->generateCSRFToken();
        $this->view('kendaraan/form', ['action' => 'update', 'kendaraan' => $kendaraan, 'csrf' => $csrf]);
    }

    // update
    public function update($id)
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $kendaraan = $this->model->find($id);
        if (!$kendaraan) {
            echo "Data kendaraan tidak ditemukan.";
            return;
        }

        $kode = trim($_POST['kode'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $tipe = trim($_POST['tipe'] ?? '');
        $warna = trim($_POST['warna'] ?? '');
        $harga = trim($_POST['harga'] ?? '0');
        $nopol = trim($_POST['nopol'] ?? '');

        $errors = [];

        if ($kode === '')
            $errors[] = "Kode kendaraan wajib diisi.";
        if ($nama === '')
            $errors[] = "Nama kendaraan wajib diisi.";
        if (!is_numeric($harga) || $harga < 0)
            $errors[] = "Harga harus berupa angka ≥ 0.";

        if ($this->model->existsByCode($kode, $id))
            $errors[] = "Kode kendaraan sudah digunakan oleh kendaraan lain.";

        $uploadedFilename = $kendaraan['image'];
        if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['image']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
                if (!empty($kendaraan['image']) && is_file(UPLOAD_DIR . $kendaraan['image'])) {
                    @unlink(UPLOAD_DIR . $kendaraan['image']);
                }
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('kendaraan/form', [
                'action' => 'update',
                'errors' => $errors,
                'kendaraan' => [
                    'id' => $id,
                    'kode' => $kode,
                    'nama' => $nama,
                    'tipe' => $tipe,
                    'warna' => $warna,
                    'harga' => $harga,
                    'nopol' => $nopol,
                    'image' => $uploadedFilename
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kode' => $kode,
            'nama' => $nama,
            'tipe' => $tipe,
            'warna' => $warna,
            'harga' => $harga,
            'nopol' => $nopol,
            'image' => $uploadedFilename
        ];

        $this->model->update($id, $data);
        $this->redirect('/kendaraan');
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

        $kendaraan = $this->model->find($id);
        if (!$kendaraan) {
            echo "Data kendaraan tidak ditemukan.";
            return;
        }

        $this->model->delete($id);

        if (!empty($kendaraan['image']) && is_file(UPLOAD_DIR . $kendaraan['image'])) {
            @unlink(UPLOAD_DIR . $kendaraan['image']);
        }

        $this->redirect('/kendaraan');
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
