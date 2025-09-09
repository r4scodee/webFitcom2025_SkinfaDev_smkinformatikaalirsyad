<?php
// config.php - simpan konfigurasi aplikasi di sini
// NOTE: Untuk production, letakkan file ini di luar public_html jika memungkinkan.

define('DB_HOST', '103.163.138.166');      // host DB
define('DB_NAME', 'smkinfor_lombafitcom2025');       // nama DB (ubah sesuai yang kamu buat)
define('DB_USER', 'smkinfor_root_lombafitcom2025');           // user DB
define('DB_PASS', 'JoB!um&aTxvuWvq2');               // password DB

// BASE_URL berguna buat redirect / membuat asset URL (ubah kalau di subfolder)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
define('BASE_URL', $protocol . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/');

// Uploads dir (relative ke project root)
define('UPLOAD_DIR', __DIR__ . '/../../uploads/');   // path sistem file
define('UPLOAD_URL', BASE_URL . 'uploads/');         // url untuk mengakses gambar
