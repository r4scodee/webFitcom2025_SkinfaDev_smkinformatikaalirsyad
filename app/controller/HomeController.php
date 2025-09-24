<?php
require_once __DIR__ . '/../libs/Controller.php';

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index', [
            'title' => 'Tani Digital'
        ], false);
    }
}
