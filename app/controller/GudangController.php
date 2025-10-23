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
            'active' => 'gudang',
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

        if ($kodegudang === '') $errors[] = "Kode Gudang wajib diisi.";
        if ($namagudang === '') $errors[] = "Nama Gudang wajib diisi.";
        if ($golongan === '')   $errors[] = "Golongan Gudang wajib diisi.";
        if ($keterangan === '') $errors[] = "Keterangan Gudang wajib diisi.";

        if ($this->model->existsByCode($kodegudang))
            $errors[] = "Kode Gudang sudah digunakan.";

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

        $data = [
            'kodegudang' => $kodegudang,
            'namagudang' => $namagudang,
            'golongan' => $golongan,
            'keterangan' => $keterangan
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
        $golongan   = trim($_POST['golongan'] ?? '');
        $keterangan = trim($_POST['keterangan'] ?? '');

        $errors = [];

        if ($kodegudang === '') $errors[] = "Kode Gudang wajib diisi.";
        if ($namagudang === '') $errors[] = "Nama Gudang wajib diisi.";
        if ($golongan === '')   $errors[] = "Golongan Gudang wajib diisi.";
        if ($keterangan === '') $errors[] = "Keterangan Gudang wajib diisi.";

        if ($this->model->existsByCode($kodegudang, $id))
            $errors[] = "Kode Gudang sudah digunakan oleh gudang lain.";

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
                    'keterangan' => $keterangan
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kodegudang' => $kodegudang,
            'namagudang' => $namagudang,
            'golongan' => $golongan,
            'keterangan' => $keterangan
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
        $this->redirect('/gudang');
    }
}
