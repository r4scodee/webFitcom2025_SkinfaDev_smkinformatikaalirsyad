<?php
class KendaraanModel
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
            SELECT k.*, w.namagudang, w.golongan
            FROM kendaraan k
            LEFT JOIN gudang w ON k.kodegudang = w.kodegudang
            ORDER BY k.id ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ambil satu data
    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT k.*, w.namagudang, w.golongan
            FROM kendaraan k
            LEFT JOIN gudang w ON k.kodegudang = w.kodegudang
            WHERE k.id = :id
            LIMIT 1
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // insert
    public function create($data)
    {
        $sql = "INSERT INTO kendaraan (kode, nama, harga, image, satuan, kodegudang) 
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
        $sql = "UPDATE kendaraan 
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
        $stmt = $this->db->prepare("DELETE FROM kendaraan WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // cek kode kendaraan
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM kendaraan WHERE kode = :kode AND id != :id");
            $stmt->execute([':kode' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM kendaraan WHERE kode = :kode");
            $stmt->execute([':kode' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}
