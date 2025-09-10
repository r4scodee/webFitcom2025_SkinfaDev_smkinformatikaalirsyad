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

// default controller = dashboard
$controllerName = ucfirst($segments[0] ?: 'dashboard') . 'Controller';
$method = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

// cek file controller
$controllerFile = __DIR__ . '/app/controller/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    require $controllerFile;
    if (!class_exists($controllerName)) {
        http_response_code(500);
        echo "Controller class $controllerName not found.";
        exit;
    }

    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        http_response_code(404);
        echo "Method not found: $method";
    }
} else {
    http_response_code(404);
    echo "Controller not found: $controllerName";
}
