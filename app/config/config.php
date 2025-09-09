<?php
// config.php - simpan konfigurasi aplikasi di sini
// NOTE: Untuk production, letakkan file ini di luar public_html jika memungkinkan.

define('DB_HOST', 'localhost');      // host DB
define('DB_NAME', 'market_crud_app');       // nama DB (ubah sesuai yang kamu buat)
define('DB_USER', 'root');           // user DB
define('DB_PASS', '');               // password DB

// BASE_URL berguna buat redirect / membuat asset URL (ubah kalau di subfolder)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
define('BASE_URL', $protocol . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/');

// Uploads dir (relative ke project root)
define('UPLOAD_DIR', __DIR__ . '/../../uploads/');   // path sistem file
define('UPLOAD_URL', BASE_URL . 'uploads/');         // url untuk mengakses gambar
