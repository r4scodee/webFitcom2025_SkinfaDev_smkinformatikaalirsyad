<?php
require_once __DIR__ . '/../library/Controller.php';

class DashboardController extends Controller
{
    public function __construct()
    {
        // Proteksi: cek session login
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            // user belum login, redirect ke login
            header("Location: /webFitcom2025_SkinfaDev_smkinformatikaalirsyad/login");
            exit;
        }
    }

    public function index()
    {
        $this->view('dashboard/index', [
            'title' => 'Dashboard Overview - Tani Digital',
            'active' => 'dashboard'
        ]);
    }

    public function products()
    {
        $this->view('dashboard/products/index', [
            'title' => 'Products - Tani Digital',
            'active' => 'products'
        ]);
    }
}
