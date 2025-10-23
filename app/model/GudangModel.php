<?php
class GudangModel
{
    private $db;

    public function __construct()
    {
        // koneksi database
        $this->db = Database::getInstance()->getConnection();
    }

<<<<<<< HEAD
    // Ambil semua data gudang
    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM gudang ORDER BY id ASC");
=======
    // ambil semua data
    public function all()
    {
        $stmt = $this->db->prepare("
            SELECT g.*, w.namagudang AS namagudang_parent, w.golongan
            FROM gudang g
            LEFT JOIN gudang w ON g.kodegudang = w.kodegudang
            ORDER BY g.kodegudang ASC
        ");
>>>>>>> 8bf6a5a51b6bc509f5f74cfedde04c3d53a0a02e
        $stmt->execute();
        return $stmt->fetchAll();
    }

<<<<<<< HEAD
    // Cari data gudang berdasarkan ID (primary key baru)
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM gudang WHERE id = :id LIMIT 1");
=======
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
>>>>>>> 8bf6a5a51b6bc509f5f74cfedde04c3d53a0a02e
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Tambah data gudang
    public function create($data)
    {
<<<<<<< HEAD
        $sql = "INSERT INTO gudang (kodegudang, namagudang, golongan, keterangan) 
                VALUES (:kodegudang, :namagudang, :golongan, :keterangan)";
=======
        $sql = "INSERT INTO gudang (kode, nama, harga, image, satuan, kodegudang) 
                VALUES (:kode, :nama, :harga, :image, :satuan, :kodegudang)";
>>>>>>> 8bf6a5a51b6bc509f5f74cfedde04c3d53a0a02e
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
<<<<<<< HEAD
                SET kodegudang = :kodegudang, 
                    namagudang = :namagudang, 
                    golongan = :golongan, 
                    keterangan = :keterangan
=======
                SET kode = :kode, nama = :nama, harga = :harga, image = :image, satuan = :satuan, kodegudang = :kodegudang 
>>>>>>> 8bf6a5a51b6bc509f5f74cfedde04c3d53a0a02e
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

<<<<<<< HEAD
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
=======
    // cek kode
    public function existsByCode($code, $excludeId = null)
    {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM gudang WHERE kode = :kode AND id != :id");
            $stmt->execute([':kode' => $code, ':id' => $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM gudang WHERE kode = :kode");
            $stmt->execute([':kode' => $code]);
>>>>>>> 8bf6a5a51b6bc509f5f74cfedde04c3d53a0a02e
        }

        return $stmt->fetchColumn() > 0;
    }
}
?>
