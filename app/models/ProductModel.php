<?php
// ProductModel.php
// Model untuk tabel products. Berisi method CRUD menggunakan PDO prepared statements.
// Semua query menggunakan prepared statements untuk mencegah SQL injection.

class ProductModel
{
    private $db; // instance PDO

    public function __construct()
    {
        // Dapatkan koneksi PDO dari Database singleton
        $this->db = Database::getInstance()->getConnection();
    }

    // Ambil semua produk (optionally paginated nanti)
    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM products ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Ambil satu produk berdasarkan id
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Masukkan data produk baru (return inserted id)
    public function create($data)
    {
        $sql = "INSERT INTO products (code, name, price, image, supplier) 
                VALUES (:code, :name, :price, :image, :supplier)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':code'     => $data['code'],
            ':name'     => $data['name'],
            ':price'    => $data['price'],
            ':image'    => $data['image'],
            ':supplier' => $data['supplier'],
        ]);
        return $this->db->lastInsertId();
    }

    // Update produk berdasarkan id
    public function update($id, $data)
    {
        $sql = "UPDATE products SET code = :code, name = :name, price = :price, image = :image, supplier = :supplier WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':code'     => $data['code'],
            ':name'     => $data['name'],
            ':price'    => $data['price'],
            ':image'    => $data['image'],
            ':supplier' => $data['supplier'],
            ':id'       => $id,
        ]);
    }

    // Hapus produk berdasarkan id
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // Cek apakah code produk sudah ada (untuk validasi unique)
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM products WHERE code = :code AND id != :id");
            $stmt->execute([':code' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM products WHERE code = :code");
            $stmt->execute([':code' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}
