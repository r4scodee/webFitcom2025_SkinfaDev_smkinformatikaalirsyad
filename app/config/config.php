<?php
// Kondigurasi database
define('DB_HOST', '192.168.0.10');      
define('DB_NAME', 'skinfadev');       
define('DB_USER', 'skinfadev');          
define('DB_PASS', 'skinfadev');               

// BASE_URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
define('BASE_URL', $protocol . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/');

// directory untuk gambar
define('UPLOAD_DIR', __DIR__ . '/../../uploads/'); 
define('UPLOAD_URL', BASE_URL . 'uploads/');      
