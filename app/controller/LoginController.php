<?php
require_once __DIR__ . '/../libs/Controller.php';

class LoginController extends Controller
{
    public function index()
    {
        $this->view('auth/login', [
            'title' => 'Login - Tani Digital'
        ], false);
    }
}
