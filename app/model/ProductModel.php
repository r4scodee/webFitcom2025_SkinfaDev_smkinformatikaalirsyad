<?php
class PengirimanModel
{
    private $db;

    public function __construct()
    {
        // koneksi database
        $this->db = Database::getInstance()->getConnection();
    }

    // ambil semua data
    public function all()
    {
        $stmt = $this->db->prepare("
            SELECT p.*, w.namagudang, w.golongan
            FROM pengiriman p
            LEFT JOIN gudang w ON p.kodegudang = w.kodegudang
            ORDER BY p.id ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ambil satu data
    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT p.*, w.namagudang, w.golongan
            FROM pengiriman p
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
        $sql = "INSERT INTO pengiriman (kode, nama, harga, image, satuan, kodegudang) 
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
        $sql = "UPDATE pengiriman 
                SET kode = :kode, nama = :nama, harga = :harga, image = :image, satuan = :satuan, kodegudang = :kodegudang 
                WHERE id = :id";
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
        $stmt = $this->db->prepare("DELETE FROM pengiriman WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // cek kode pengiriman
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM pengiriman WHERE kode = :kode AND id != :id");
            $stmt->execute([':kode' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM pengiriman WHERE kode = :kode");
            $stmt->execute([':kode' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}
