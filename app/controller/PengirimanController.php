<?php
require_once __DIR__ . '/../library/Controller.php';

class PengirimanController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PengirimanModel();
    }

    // read
    public function index()
    {
        $pengirimen = $this->model->all();
        $this->view('pengiriman/index', [
            'title' => 'Manajemen Data Pengiriman - Tani Digital',
            'active' => 'pengiriman',
            'pengirimen' => $pengirimen
        ]);
    }

    // create
    public function create()
    {
        $csrf = $this->generateCSRFToken();
        $this->view('pengiriman/form', ['action' => 'store', 'csrf' => $csrf]);
    }

    // store
    public function store()
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $kode = trim($_POST['kode'] ?? '');
        $kendaraan = trim($_POST['kendaraan'] ?? '');
        $tujuan = trim($_POST['tujuan'] ?? '');
        $tanggal = trim($_POST['tanggal'] ?? '');
        $harga = trim($_POST['harga'] ?? '0');

        $errors = [];

        if ($kode === '')
            $errors[] = "Kode pengiriman wajib diisi.";
        if ($kendaraan === '')
            $errors[] = "Kendaraan wajib diisi.";
        if ($tujuan === '')
            $errors[] = "Tujuan wajib diisi.";
        if (!is_numeric($harga) || $harga < 0)
            $errors[] = "Harga harus berupa angka ≥ 0.";

        if ($this->model->existsByCode($kode))
            $errors[] = "Kode pengiriman sudah digunakan.";

        $uploadedFilename = null;
        if (!empty($_FILES['dokumen']) && $_FILES['dokumen']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['dokumen']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('pengiriman/form', [
                'action' => 'store',
                'errors' => $errors,
                'old' => [
                    'kode' => $kode,
                    'kendaraan' => $kendaraan,
                    'tujuan' => $tujuan,
                    'tanggal' => $tanggal,
                    'harga' => $harga
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kode' => $kode,
            'kendaraan' => $kendaraan,
            'tujuan' => $tujuan,
            'tanggal' => $tanggal,
            'harga' => $harga,
            'dokumen' => $uploadedFilename
        ];

        $this->model->create($data);
        $this->redirect('/pengiriman');
    }

    // edit
    public function edit($id)
    {
        $pengiriman = $this->model->find($id);
        if (!$pengiriman) {
            echo "Data pengiriman tidak ditemukan.";
            return;
        }
        $csrf = $this->generateCSRFToken();
        $this->view('pengiriman/form', ['action' => 'update', 'pengiriman' => $pengiriman, 'csrf' => $csrf]);
    }

    // update
    public function update($id)
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $pengiriman = $this->model->find($id);
        if (!$pengiriman) {
            echo "Data pengiriman tidak ditemukan.";
            return;
        }

        $kode = trim($_POST['kode'] ?? '');
        $kendaraan = trim($_POST['kendaraan'] ?? '');
        $tujuan = trim($_POST['tujuan'] ?? '');
        $tanggal = trim($_POST['tanggal'] ?? '');
        $harga = trim($_POST['harga'] ?? '0');

        $errors = [];

        if ($kode === '')
            $errors[] = "Kode pengiriman wajib diisi.";
        if ($kendaraan === '')
            $errors[] = "Kendaraan wajib diisi.";
        if ($tujuan === '')
            $errors[] = "Tujuan wajib diisi.";
        if (!is_numeric($harga) || $harga < 0)
            $errors[] = "Harga harus berupa angka ≥ 0.";

        if ($this->model->existsByCode($kode, $id))
            $errors[] = "Kode pengiriman sudah digunakan oleh data lain.";

        $uploadedFilename = $pengiriman['dokumen'];
        if (!empty($_FILES['dokumen']) && $_FILES['dokumen']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['dokumen']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
                if (!empty($pengiriman['dokumen']) && is_file(UPLOAD_DIR . $pengiriman['dokumen'])) {
                    @unlink(UPLOAD_DIR . $pengiriman['dokumen']);
                }
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('pengiriman/form', [
                'action' => 'update',
                'errors' => $errors,
                'pengiriman' => [
                    'id' => $id,
                    'kode' => $kode,
                    'kendaraan' => $kendaraan,
                    'tujuan' => $tujuan,
                    'tanggal' => $tanggal,
                    'harga' => $harga,
                    'dokumen' => $uploadedFilename
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kode' => $kode,
            'kendaraan' => $kendaraan,
            'tujuan' => $tujuan,
            'tanggal' => $tanggal,
            'harga' => $harga,
            'dokumen' => $uploadedFilename
        ];

        $this->model->update($id, $data);
        $this->redirect('/pengiriman');
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

        $pengiriman = $this->model->find($id);
        if (!$pengiriman) {
            echo "Data pengiriman tidak ditemukan.";
            return;
        }

        $this->model->delete($id);

        if (!empty($pengiriman['dokumen']) && is_file(UPLOAD_DIR . $pengiriman['dokumen'])) {
            @unlink(UPLOAD_DIR . $pengiriman['dokumen']);
        }

        $this->redirect('/pengiriman');
    }

    // helper upload
    private function handleUpload($file)
    {
        $maxSize = 2 * 1024 * 1024;

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['success' => false, 'error' => 'Upload error kode: ' . $file['error']];
        }

        if ($file['size'] > $maxSize) {
            return ['success' => false, 'error' => 'Ukuran file terlalu besar (max 2MB).'];
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']);
        $validMimes = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'application/pdf' => 'pdf'
        ];

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
