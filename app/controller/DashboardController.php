<?php
require_once __DIR__ . '/../libs/Controller.php';

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
            'title' => 'Dashboard - Tani Digital',
            'active' => 'dashboard'
        ]);
    }

    public function products()
    {
        $this->view('dashboard/products', [
            'title' => 'Products - Tani Digital',
            'active' => 'products'
        ]);
    }

    public function sensors()
    {
        $this->view('dashboard/sensors', [
            'title' => 'Sensors - Tani Digital',
            'active' => 'sensors'
        ]);
    }

    public function reports()
    {
        $this->view('dashboard/reports', [
            'title' => 'Reports - Tani Digital',
            'active' => 'reports'
        ]);
    }

    public function settings()
    {
        $this->view('dashboard/settings', [
            'title' => 'Settings - Tani Digital',
            'active' => 'settings'
        ]);
    }
}
