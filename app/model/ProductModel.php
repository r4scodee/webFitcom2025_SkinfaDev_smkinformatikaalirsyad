<?php
class ProductModel
{
    private $db; 

    public function __construct()
    {
        // koneksi
        $this->db = Database::getInstance()->getConnection();
    }

    public function all()
    {
        $stmt = $this->db->prepare("
        SELECT p.*, w.namagudang, w.golongan
        FROM produk p
        LEFT JOIN gudang w ON p.kodegudang = w.kodegudang
        ORDER BY p.id ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("
        SELECT p.*, w.namagudang, w.golongan
        FROM produk p
        LEFT JOIN gudang w ON p.kodegudang = w.kodegudang
        WHERE p.id = :id
        LIMIT 1
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // insert
    public function create($data)
    {
        $sql = "INSERT INTO produk (kode, nama, harga, image, satuan, kodegudang) 
                VALUES (:kode, :nama, :harga, :image, :satuan, :kodegudang)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':kode' => $data['kode'],
            ':nama' => $data['nama'],
            ':harga' => $data['harga'],
            ':image' => $data['image'],
            ':satuan' => $data['satuan'],
            ':kodegudang' => $data['kodegudang'] ?? null,
        ]);
        return $this->db->lastInsertId();
    }

    // update
    public function update($id, $data)
    {
        $sql = "UPDATE produk SET kode = :kode, nama = :nama, harga = :harga, image = :image, satuan = :satuan, kodegudang = :kodegudang WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kode' => $data['kode'],
            ':nama' => $data['nama'],
            ':harga' => $data['harga'],
            ':image' => $data['image'],
            ':satuan' => $data['satuan'],
            ':kodegudang' => $data['kodegudang'] ?? null,
            ':id' => $id,
        ]);
    }

    // hapus
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM produk WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // Cek kode produk
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM produk WHERE kode = :kode AND id != :id");
            $stmt->execute([':kode' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM produk WHERE kode = :kode");
            $stmt->execute([':kode' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}
