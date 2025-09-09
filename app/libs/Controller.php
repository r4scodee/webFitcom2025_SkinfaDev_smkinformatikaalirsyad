<?php
// Controller.php - base controller dengan helper render, redirect, escape, CSRF
class Controller
{
    // Render view: otomatis include header & footer layout
    protected function view($viewPath, $data = [])
    {
        // ekstrak data jadi variabel di view (misal $products)
        extract($data);

        // header layout
        require_once __DIR__ . '/../views/layouts/header.php';

        // main view
        $viewFile = __DIR__ . '/../views/' . $viewPath . '.php';
        if (is_file($viewFile)) {
            require_once $viewFile;
        } else {
            echo "<div class='container mt-4'><div class='alert alert-danger'>View $viewPath tidak ditemukan.</div></div>";
        }

        // footer layout
        require_once __DIR__ . '/../views/layouts/footer.php';
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
