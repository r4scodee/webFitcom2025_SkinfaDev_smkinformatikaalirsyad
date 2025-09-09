<?php
// index.php - Front controller sederhana
// Mulai session untuk CSRF token & kebutuhan session lainnya
session_start();

// ===== Autoload sederhana =====
// Mencari class di folder app/libs, app/controller, app/models
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/app/libs/',
        __DIR__ . '/app/controller/',
        __DIR__ . '/app/models/',
    ];
    foreach ($paths as $p) {
        $file = $p . $class . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

// ===== Load config =====
require_once __DIR__ . '/app/config/config.php'; // file config (dibuat di step ini)

// ===== Simple routing =====
// Ambil URI path (tanpa query string)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Jika aplikasi berjalan di subfolder, hapus base path
$scriptName = dirname($_SERVER['SCRIPT_NAME']); // bisa jadi '/'
if ($scriptName !== '/') {
    $uri = preg_replace('#^' . preg_quote($scriptName) . '#', '', $uri);
}

// Hilangkan leading/trailing slash dan pecah segmen
$uri = trim($uri, '/');
$segments = $uri === '' ? [] : explode('/', $uri);

// Default controller/action
$controllerSegment = $segments[0] ?? 'products';        // contoh: /products/create
$actionSegment     = $segments[1] ?? 'index';           // contoh: 'create' atau 'edit'
$idSegment         = $segments[2] ?? null;              // contoh: id

// Buat nama class controller: ProductsController
$controllerName = ucfirst($controllerSegment) . 'Controller';
$actionName = $actionSegment;

// Path file controller
$controllerFile = __DIR__ . '/app/controller/' . $controllerName . '.php';

// Jika file controller ada, include lalu panggil action; kalau nggak ada, 404 sederhana
if (is_file($controllerFile)) {
    require_once $controllerFile;
    if (!class_exists($controllerName)) {
        header("HTTP/1.0 500 Internal Server Error");
        echo "Controller class $controllerName tidak ditemukan.";
        exit;
    }
    $controller = new $controllerName();

    // Jika method ada, panggil. Pass $id jika tersedia.
    if (method_exists($controller, $actionName)) {
        if ($idSegment !== null) {
            $controller->{$actionName}($idSegment);
        } else {
            $controller->{$actionName}();
        }
    } else {
        // action tidak ditemukan
        header("HTTP/1.0 404 Not Found");
        echo "Action '$actionName' tidak ditemukan pada controller $controllerName.";
    }
} else {
    // controller file tidak ditemukan -> default ke products index (opsional) atau 404
    header("HTTP/1.0 404 Not Found");
    echo "Halaman tidak ditemukan.";
}
