<?php
require_once 'Config/Connection.php';

class JenisKegiatan
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $stmt = $this->pdo->query("SELECT * FROM jenis_kegiatan");
        $data = $stmt->fetchAll();

        return $data;
    }

    public function show($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM jenis_kegiatan WHERE id=$id");
        $data = $stmt->fetch();
        return $data;
    }

    public function create($data)
    {
        $sql = "INSERT INTO jenis_kegiatan (id, nama) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['id'], $data['nama']]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE jenis_kegiatan SET nama=:nama WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {
        $row = $this->show($id);
        
        // Delete related records in dosen_kegiatan table first
        $sql_delete_dosen_kegiatan = "DELETE dk FROM dosen_kegiatan dk 
                                     INNER JOIN kegiatan k ON dk.kegiatan_id = k.id 
                                     WHERE k.jenis_kegiatan_id = ?";
        $stmt_dosen_kegiatan = $this->pdo->prepare($sql_delete_dosen_kegiatan);
        $stmt_dosen_kegiatan->execute([$id]);
        
        // Then delete records in kegiatan table
        $sql_delete_kegiatan = "DELETE FROM kegiatan WHERE jenis_kegiatan_id = ?";
        $stmt_kegiatan = $this->pdo->prepare($sql_delete_kegiatan);
        $stmt_kegiatan->execute([$id]);
        
        // Finally delete the jenis_kegiatan record
        $sql = "DELETE FROM jenis_kegiatan WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        
        return $row;
    }
}

$jeniskegiatan = new JenisKegiatan($pdo);
