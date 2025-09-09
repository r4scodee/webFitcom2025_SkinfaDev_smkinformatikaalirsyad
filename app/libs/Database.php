<?php
// Database.php - Singleton PDO wrapper dengan prepared statements
class Database
{
    // instance tunggal
    private static $instance = null;
    private $pdo;

    // private constructor agar tidak bisa diinstansiasi dari luar
    private function __construct()
    {
        // build DSN
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        // opsi PDO yang aman
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // exception saat error
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // fetch assoc default
            PDO::ATTR_EMULATE_PREPARES   => false,                  // pakai native prepares
        ];

        // buat koneksi PDO
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    }

    // dapatkan instance
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // dapatkan objek PDO
    public function getConnection()
    {
        return $this->pdo;
    }
}
