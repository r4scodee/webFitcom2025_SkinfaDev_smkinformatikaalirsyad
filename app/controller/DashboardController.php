<?php

require_once __DIR__ . '/../libs/Controller.php';

class DashboardController extends Controller {
    public function index() {
        $this->view('dashboard/index', [
            'title' => 'Dashboard - Skinfa Bertani',
            'active' => 'dashboard'
        ]);
    }
}