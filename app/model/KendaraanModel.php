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
        SELECT * 
        FROM kendaraan
        ORDER BY nopol ASC
    ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    // ambil satu data
    public function find($id)
    {
        $stmt = $this->db->prepare("
        SELECT *
        FROM kendaraan
        WHERE nopol = :id
        LIMIT 1
    ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // insert
    public function create($data)
    {
        $sql = "INSERT INTO kendaraan (nopol, namakendaraan, jenis, tahun, kapasitas, driver, kontakdriver) 
                VALUES (:nopol, :namakendaraan, :jenis, :tahun, :kapasitas, :driver, :kontakdriver)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nopol' => $data['nopol'],
            ':namakendaraan' => $data['namakendaraan'],
            ':jenis' => $data['jenis'],
            ':tahun' => $data['tahun'],
            ':kapasitas' => $data['kapasitas'],
            ':driver' => $data['driver'] ?? null,
            ':kontakdriver' => $data['kontakdriver'] ?? null,
        ]);
        return $this->db->lastInsertId();
    }

    // update
    public function update($id, $data)
    {
        $sql = "UPDATE kendaraan 
            SET nopol = :nopol, 
                namakendaraan = :namakendaraan, 
                jenis = :jenis, 
                tahun = :tahun, 
                kapasitas = :kapasitas, 
                driver = :driver, 
                kontakdriver = :kontakdriver
            WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nopol' => $data['nopol'],
            ':namakendaraan' => $data['namakendaraan'],
            ':jenis' => $data['jenis'],
            ':tahun' => $data['tahun'],
            ':kapasitas' => $data['kapasitas'],
            ':driver' => $data['driver'] ?? null,
            ':kontakdriver' => $data['kontakdriver'] ?? null,
            ':id' => $id,  // penting! harus dikirim
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
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM kendaraan WHERE nopol = :nopol AND id != :id");
            $stmt->execute([':nopol' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM kendaraan WHERE nopol = :nopol");
            $stmt->execute([':nopol' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}