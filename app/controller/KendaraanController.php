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
        $kendaraan = $this->model->all();
        $this->view('kendaraan/index', [
            'title' => 'Manajemen Data Kendaraan - Tani Digital',
            'active' => 'kendaraan',
            'kendaraans' => $kendaraan
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

        $nopol = trim($_POST['nopol'] ?? '');
        $namakendaraan = trim($_POST['namakendaraan'] ?? '');
        $jenis = trim($_POST['jenis'] ?? '');
        $tahun = trim($_POST['tahun'] ?? '');
        $kapasitas = trim($_POST['kapasitas'] ?? '0');
        $driver = trim($_POST['driver'] ?? '');
        $kontakdriver = trim($_POST['kontakdriver'] ?? '');

        $errors = [];

        if ($nopol === '')
            $errors[] = "Nomor polisi wajib diisi.";
        if ($namakendaraan === '')
            $errors[] = "Nama kendaraan wajib diisi.";
        if ($jenis === '')
            $errors[] = "Jenis kendaraan wajib diisi.";
        if ($tahun !== '' && !is_numeric($tahun))
            $errors[] = "Tahun harus berupa angka.";
        if ($kapasitas !== '' && !is_numeric($kapasitas))
            $errors[] = "Kapasitas harus berupa angka.";

        if ($this->model->existsByCode($nopol)) {
            $errors[] = "Nomor polisi sudah digunakan.";
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('kendaraan/form', [
                'action' => 'store',
                'errors' => $errors,
                'old' => [
                    'nopol' => $nopol,
                    'namakendaraan' => $namakendaraan,
                    'jenis' => $jenis,
                    'tahun' => $tahun,
                    'kapasitas' => $kapasitas,
                    'driver' => $driver,
                    'kontakdriver' => $kontakdriver
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'nopol' => $nopol,
            'namakendaraan' => $namakendaraan,
            'jenis' => $jenis,
            'tahun' => $tahun,
            'kapasitas' => $kapasitas,
            'driver' => $driver,
            'kontakdriver' => $kontakdriver
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

        $nopol = trim($_POST['nopol'] ?? '');
        $namakendaraan = trim($_POST['namakendaraan'] ?? '');
        $jenis = trim($_POST['jenis'] ?? '');
        $tahun = trim($_POST['tahun'] ?? '');
        $kapasitas = trim($_POST['kapasitas'] ?? '0');
        $driver = trim($_POST['driver'] ?? '');
        $kontakdriver = trim($_POST['kontakdriver'] ?? '');

        $errors = [];

        if ($nopol === '')
            $errors[] = "Nomor polisi wajib diisi.";
        if ($namakendaraan === '')
            $errors[] = "Nama kendaraan wajib diisi.";
        if ($jenis === '')
            $errors[] = "Jenis kendaraan wajib diisi.";
        if ($tahun !== '' && !is_numeric($tahun))
            $errors[] = "Tahun harus berupa angka.";
        if ($kapasitas !== '' && !is_numeric($kapasitas))
            $errors[] = "Kapasitas harus berupa angka.";

        if ($this->model->existsByNopol($nopol, $id)) {
            $errors[] = "Nomor polisi sudah digunakan oleh kendaraan lain.";
        }

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('kendaraan/form', [
                'action' => 'update',
                'errors' => $errors,
                'kendaraan' => [
                    'id' => $id,
                    'nopol' => $nopol,
                    'namakendaraan' => $namakendaraan,
                    'jenis' => $jenis,
                    'tahun' => $tahun,
                    'kapasitas' => $kapasitas,
                    'driver' => $driver,
                    'kontakdriver' => $kontakdriver
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'nopol' => $nopol,
            'namakendaraan' => $namakendaraan,
            'jenis' => $jenis,
            'tahun' => $tahun,
            'kapasitas' => $kapasitas,
            'driver' => $driver,
            'kontakdriver' => $kontakdriver
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
        $this->redirect('/kendaraan');
    }
}