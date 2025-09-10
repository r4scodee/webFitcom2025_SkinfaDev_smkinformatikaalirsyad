<?php
// Controller.php - base controller dengan helper render, redirect, escape, CSRF
class Controller
{
    // Render view: otomatis include header & footer layout
    protected function view($viewPath, $data = [])
    {
    // ekstrak data jadi variabel di view (misal $products, $title, $active)
    extract($data);

    // Mulai buffer
    ob_start();

    // file view utama
    $viewFile = __DIR__ . '/../views/' . $viewPath . '.php';
    if (is_file($viewFile)) {
        require $viewFile;
    } else {
        echo "<div class='alert alert-danger'>View $viewPath tidak ditemukan.</div>";
    }

    // Ambil hasil render view dan simpan ke $content
    $content = ob_get_clean();

    // Sekarang panggil layout utama
    require __DIR__ . '/../views/layouts/layout.php';
    }

    // Redirect helper
    protected function redirect($path)
    {
        $url = BASE_URL . ltrim($path, '/');
        header("Location: $url");
        exit;
    }

    // Escape output untuk mencegah XSS
    protected function e($string)
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    // ===== CSRF helpers =====
    // Buat token CSRF dan simpan di session
    protected function generateCSRFToken()
    {
        if (empty($_SESSION['_csrf_token'])) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf_token'];
    }

    // Validasi token CSRF dari form (kembalikan bool)
    protected function verifyCSRFToken($token)
    {
        if (empty($token) || empty($_SESSION['_csrf_token'])) return false;
        return hash_equals($_SESSION['_csrf_token'], $token);
    }
}
