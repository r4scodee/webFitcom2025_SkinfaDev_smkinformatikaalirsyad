<?php
session_start();

// Autoload sederhana
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

// Load config
require_once __DIR__ . '/app/config/config.php';

// Router sederhana
$url = $_GET['url'] ?? '';
$segments = explode('/', trim($url, '/'));

// default controller & method
$controllerName = ucfirst($segments[0] ?: 'home') . 'Controller';
$method = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

// fungsi helper untuk 404
function show404()
{
    http_response_code(404);
    require_once __DIR__ . '/app/controller/ErrorController.php';
    $controller = new ErrorController();
    $controller->index();
    exit;
}

// --- Routing khusus untuk dashboard child pages ---
if (!empty($segments[0]) && $segments[0] === 'dashboard') {
    $controllerName = 'DashboardController';
    // kalau cuma /dashboard -> index
    if (empty($segments[1])) {
        $method = 'index';
        $params = [];
    } else {
        // /dashboard/products -> products(), dll.
        $method = $segments[1];
        $params = array_slice($segments, 2);
    }
}

// cek file controller
$controllerFile = __DIR__ . '/app/controller/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    require $controllerFile;
    if (!class_exists($controllerName)) {
        show404();
    }

    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        show404();
    }
} else {
    show404();
}
