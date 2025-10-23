<?php
class GudangModel
{
    private $db;

    public function __construct()
    {
        // koneksi
        $this->db = Database::getInstance()->getConnection();
    }

    // ambil semua data
    public function all()
    {
        $stmt = $this->db->prepare("
            SELECT g.*, w.namagudang AS namagudang_parent, w.golongan
            FROM gudang g
            LEFT JOIN gudang w ON g.kodegudang = w.kodegudang
            ORDER BY g.kodegudang ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ambil satu data
    public function find($id)
    {
        $stmt = $this->db->prepare("
            SELECT g.*, w.namagudang AS namagudang_parent, w.golongan
            FROM gudang g
            LEFT JOIN gudang w ON g.kodegudang = w.kodegudang
            WHERE g.id = :id
            LIMIT 1
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // insert
    public function create($data)
    {
        $sql = "INSERT INTO gudang (kode, nama, harga, image, satuan, kodegudang) 
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
        $sql = "UPDATE gudang 
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
        $stmt = $this->db->prepare("DELETE FROM gudang WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // cek kode
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM gudang WHERE kode = :kode AND id != :id");
            $stmt->execute([':kode' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM gudang WHERE kode = :kode");
            $stmt->execute([':kode' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}
