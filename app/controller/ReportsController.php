<?php
require_once __DIR__ . '/../libs/Controller.php';

class ReportsController extends Controller
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
        $this->view('reports/index', [
            'title' => 'Reports - Tani Digital',
            'active' => 'reports'
        ]);
    }
}
