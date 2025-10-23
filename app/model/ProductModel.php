<?php
class GudangModel
{
    private $db;

    public function __construct()
    {
        // koneksi database
        $this->db = Database::getInstance()->getConnection();
    }

    // Ambil semua data gudang
    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM gudang ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Cari data gudang berdasarkan ID (primary key baru)
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM gudang WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Tambah data gudang
    public function create($data)
    {
        $sql = "INSERT INTO gudang (kodegudang, namagudang, golongan, keterangan) 
                VALUES (:kodegudang, :namagudang, :golongan, :keterangan)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':kodegudang' => $data['kodegudang'],
            ':namagudang' => $data['namagudang'],
            ':golongan' => $data['golongan'],
            ':keterangan' => $data['keterangan'],
        ]);
        return $this->db->lastInsertId(); 
    }

    // Update data gudang berdasarkan id
    public function update($id, $data)
    {
        $sql = "UPDATE gudang 
                SET kodegudang = :kodegudang, 
                    namagudang = :namagudang, 
                    golongan = :golongan, 
                    keterangan = :keterangan
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kodegudang' => $data['kodegudang'],
            ':namagudang' => $data['namagudang'],
            ':golongan' => $data['golongan'],
            ':keterangan' => $data['keterangan'],
            ':id' => $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM gudang WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function existsByCode($kodegudang, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM gudang WHERE kodegudang = :kodegudang AND id != :id");
            $stmt->execute([
                ':kodegudang' => $kodegudang,
                ':id' => $excludeId
            ]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM gudang WHERE kodegudang = :kodegudang");
            $stmt->execute([':kodegudang' => $kodegudang]);
        }

        return $stmt->fetchColumn() > 0;
    }
}
?>