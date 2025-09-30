<?php
require_once __DIR__ . '/../library/Controller.php';

class ReportController extends Controller
{
    public function index()
    {
        $this->view('reports/index', [
            'title' => 'Reports - Tani Digital',
            'products' => []
        ]);
    }

    public function generate()
    {
        $productModel = new ProductModel();
        $products = $productModel->all(); 

        $this->view('reports/index', [
            'title' => 'Generate Reports - Tani Digital',
            'products' => $products
        ]);
    }
}
