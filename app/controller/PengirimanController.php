<?php
require_once __DIR__ . '/../library/Controller.php';

class PengirimanController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new PengirimanModel();
    }

    public function index()
    {
        $pengiriman = $this->model->all();
        $this->view('pengiriman/index', [
            'title' => 'Table Management Pengiriman - Tani Digital',
            'active' => 'pengiriman',
            'pengiriman' => $pengiriman
        ]);
    }

    public function create()
    {
        $csrf = $this->generateCSRFToken();
        $this->view('pengiriman/form', [
            'action' => 'store',
            'csrf' => $csrf
        ]);
    }

    public function store()
    {
        if (!$this->verifyCSRFToken($_POST['_csrf'] ?? '')) {
            die('CSRF token tidak valid.');
        }

        $kodekirim = trim($_POST['kodekirim'] ?? '');
        $tglkirim = trim($_POST['tglkirim'] ?? '');
        $nopol   = trim($_POST['nopol'] ?? '');
        $totalqty = trim($_POST['totalqty'] ?? '');

        $errors = [];

        if ($kodekirim === '') $errors[] = "Kode kirim wajib diisi.";
        if ($tglkirim === '') $errors[] = "Tanggal wajib diisi.";
        if ($nopol === '')   $errors[] = "nopol wajib diisi.";
        if ($totalqty === '') $errors[] = "todalqty wajib diisi.";

        if ($this->model->existsByCode($kodekirim))
            $errors[] = "Kode kirim sudah digunakan.";

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('pengiriman/form', [
                'action' => 'store',
                'errors' => $errors,
                'old' => [
                    'kodekirim' => $kodekirim,
                    'tglkirim' => $tglkirim,
                    'nopol' => $nopol,
                    'totalqty' => $totalqty
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kodekirim' => $kodekirim,
            'tglkirim' => $tglkirim,
            'nopol' => $nopol,
            'totalqty' => $totalqty
        ];

        $this->model->create($data);

        $this->redirect('/pengiriman');
    }

    public function edit($id)
    {
        $pengiriman = $this->model->find($id);
        if (!$pengiriman) {
            echo "Pengiriman tidak ditemukan.";
            return;
        }

        $csrf = $this->generateCSRFToken();
        $this->view('pengiriman/form', [
            'action' => 'update',
            'pengiriman' => $pengiriman,
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
            echo "Pengiriman tidak ditemukan.";
            return;
        }

        $kodekirim = trim($_POST['kodekirim'] ?? '');
        $tglkirim = trim($_POST['tglkirim'] ?? '');
        $nopol   = trim($_POST['nopol'] ?? '');
        $totalqty = trim($_POST['totalqty'] ?? '');

        $errors = [];

        if ($kodekirim === '') $errors[] = "Kode kirim wajib diisi.";
        if ($tglkirim === '') $errors[] = "Tanggal wajib diisi.";
        if ($nopol === '')   $errors[] = "nopol wajib diisi.";
        if ($totalqty === '') $errors[] = "todalqty wajib diisi.";

        if ($this->model->existsByCode($kodekirim, $id))
            $errors[] = "Kode kirim sudah digunakan oleh gudang lain.";

        if (!empty($errors)) {
            $csrf = $this->generateCSRFToken();
            $this->view('pengiriman/form', [
                'action' => 'update',
                'errors' => $errors,
                'pengiriman' => [
                    'id' => $id,
                    'kodekirim' => $kodekirim,
                    'tglkirim' => $tglkirim,
                    'nopol' => $nopol,
                    'totalqty' => $totalqty
                ],
                'csrf' => $csrf
            ]);
            return;
        }

        $data = [
            'kodekirim' => $kodekirim,
            'tglkirim' => $tglkirim,
            'nopol' => $nopol,
            'totalqty' => $totalqty
        ];

        $this->model->update($id, $data);
        $this->redirect('/pengiriman');
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
        $this->redirect('/pengiriman');
    }
}
