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
        $stmt = $this->db->prepare("SELECT * FROM masterkirim ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // ambil satu data
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM masterkirim WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // insert
    public function create($data)
    {
        $sql = "INSERT INTO masterkirim (kodekirim, tglkirim, nopol, totalqty) 
                VALUES (:kodekirim, :tglkirim, :nopol, :totalqty)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':kodekirim' => $data['kodekirim'],
            ':tglkirim' => $data['tglkirim'],
            ':nopol' => $data['nopol'],
            ':totalqty' => $data['totalqty'],
        ]);
        return $this->db->lastInsertId();
    }

    // update
    public function update($id, $data)
    {
        $sql = "UPDATE masterkirim 
                SET kodekirim = :kodekirim, 
                    tglkirim = :tglkirim, 
                    nopol = :nopol, 
                    totalqty = :totalqty
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kodekirim' => $data['kodekirim'],
            ':tglkirim' => $data['tglkirim'],
            ':nopol' => $data['nopol'],
            ':totalqty' => $data['totalqty'],
            ':id' => $id,
        ]);
    }

    // hapus
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM masterkirim WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // cek kode pengiriman
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM masterkirim WHERE kodekirim = :kodekirim AND id != :id");
            $stmt->execute([':kodekirim' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM masterkirim WHERE kodekirim = :kodekirim");
            $stmt->execute([':kodekirim' => $code]);
        }
        return $stmt->fetchColumn() > 0;
    }
}
