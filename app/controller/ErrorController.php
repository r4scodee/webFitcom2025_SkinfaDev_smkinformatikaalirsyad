<?php
require_once __DIR__ . '/../libs/Controller.php';

class ErrorController extends Controller
{
    public function index()
    {
        $this->view('errors/404', [
            'title' => 'Tani Digital'
        ], false);
    }
}
