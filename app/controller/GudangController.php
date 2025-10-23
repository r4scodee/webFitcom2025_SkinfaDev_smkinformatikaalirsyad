<?php
require_once __DIR__ . '/../library/Controller.php';

class GudangController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new GudangModel();
    }

    public function index()
    {
        $gudang = $this->model->all();
        $this->view('gudang/index', [
            'title' => 'Table Management Gudang - Tani Digital',
            'active' => 'Gudang',
            'gudang' => $gudang
        ]);
    }

    public function create()
    {
        $csrf = $this->generateCSRFToken();
        $this->view('gudang/form', [
            'action' => 'store',
            'csrf' => $csrf
        ]);
    }

    public function store()
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $kodegudang = trim($_POST['kodegudang'] ?? '');
        $namagudang = trim($_POST['namagudang'] ?? '');
        $golongan   = trim($_POST['golongan'] ?? '');
        $keterangan = trim($_POST['keterangan'] ?? '');

        $errors = [];

        if ($kodegudang === '')
            $errors[] = "Kode gudang wajib diisi.";
        if ($namagudang === '')
            $errors[] = "Nama gudang wajib diisi.";

        if ($this->model->existsByCode($kodegudang))
            $errors[] = "Kode gudang sudah digunakan.";

        // Upload Gambar
        $uploadedFilename = null;
        if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['image']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        // Jika ada error
        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('gudang/form', [
                'action' => 'store',
                'errors' => $errors,
                'old' => [
                    'kodegudang' => $kodegudang,
                    'namagudang' => $namagudang,
                    'golongan' => $golongan,
                    'keterangan' => $keterangan
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        // Simpan data
        $data = [
            'kodegudang' => $kodegudang,
            'namagudang' => $namagudang,
            'golongan' => $golongan,
            'keterangan' => $keterangan,
            'image' => $uploadedFilename
        ];

        $this->model->create($data);

        $this->redirect('/gudang');
    }

    public function edit($id)
    {
        $gudang = $this->model->find($id);
        if (!$gudang) {
            echo "Gudang tidak ditemukan.";
            return;
        }

        $csrf = $this->generateCSRFToken();
        $this->view('gudang/form', [
            'action' => 'update',
            'gudang' => $gudang,
            'csrf' => $csrf
        ]);
    }

    public function update($id)
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $gudang = $this->model->find($id);
        if (!$gudang) {
            echo "Gudang tidak ditemukan.";
            return;
        }

        $kodegudang = trim($_POST['kodegudang'] ?? '');
        $namagudang = trim($_POST['namagudang'] ?? '');
        $golongan = trim($_POST['golongan'] ?? '');
        $keterangan = trim($_POST['keterangan'] ?? '');

        $errors = [];

        if ($kodegudang === '')
            $errors[] = "Kode gudang wajib diisi.";
        if ($namagudang === '')
            $errors[] = "Nama gudang wajib diisi.";

        if ($this->model->existsByCode($kodegudang, $id))
            $errors[] = "Kode gudang sudah digunakan oleh gudang lain.";

        // Upload baru jika ada
        $uploadedFilename = $gudang['image'];
        if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $uploadResult = $this->handleUpload($_FILES['image']);
            if ($uploadResult['success']) {
                $uploadedFilename = $uploadResult['filename'];
                if (!empty($gudang['image']) && is_file(UPLOAD_DIR . $gudang['image'])) {
                    @unlink(UPLOAD_DIR . $gudang['image']);
                }
            } else {
                $errors[] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('gudang/form', [
                'action' => 'update',
                'errors' => $errors,
                'gudang' => [
                    'id' => $id,
                    'kodegudang' => $kodegudang,
                    'namagudang' => $namagudang,
                    'golongan' => $golongan,
                    'keterangan' => $keterangan,
                    'image' => $uploadedFilename
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kodegudang' => $kodegudang,
            'namagudang' => $namagudang,
            'golongan' => $golongan,
            'keterangan' => $keterangan,
            'image' => $uploadedFilename
        ];

        $this->model->update($id, $data);

        $this->redirect('/gudang');
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die('Invalid request method.');
        }

        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $gudang = $this->model->find($id);
        if (!$gudang) {
            echo "Gudang tidak ditemukan.";
            return;
        }

        $this->model->delete($id);

        if (!empty($gudang['image']) && is_file(UPLOAD_DIR . $gudang['image'])) {
            @unlink(UPLOAD_DIR . $gudang['image']);
        }

        $this->redirect('/gudang');
    }
}
