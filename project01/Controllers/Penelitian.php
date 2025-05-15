<?php
require_once 'config/connection.php';

class Penelitian
{
    private $pdo;
    
    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }
    
    public function index()
    {
        $stmt=$this->pdo->query("SELECT
        p.*, bi.nama as bidang_ilmu_nama
        FROM penelitian p
        LEFT JOIN bidang_ilmu bi ON bi.id = p.bidang_ilmu_id
        ");
        $data=$stmt->fetchAll();
        return $data;
    }

    public function show($id)
    {
        if ($id === null) {
            return [];
        }
        
        $stmt = $this->pdo->query("SELECT
            p.*, bi.nama as bidang_ilmu_nama
            FROM penelitian p
            LEFT JOIN bidang_ilmu bi ON bi.id = p.bidang_ilmu_id
            WHERE p.id = $id
        ");
        $data = $stmt->fetch();
        return $data;
    }

    private function getBidangIlmuId($nama) {
        // First check if bidang ilmu exists
        $stmt = $this->pdo->prepare("SELECT id FROM bidang_ilmu WHERE nama = ?");
        $stmt->execute([$nama]);
        $result = $stmt->fetch();
        
        if ($result) {
            return $result['id'];
        }
        
        // If not exists, create new bidang ilmu
        $stmt = $this->pdo->prepare("INSERT INTO bidang_ilmu (nama) VALUES (?)");
        $stmt->execute([$nama]);
        return $this->pdo->lastInsertId();
    }

    public function create($data)
    {
        // Get or create bidang ilmu id
        $bidang_ilmu_id = $this->getBidangIlmuId($data['bidang_ilmu_id']);
        
        $sql = "INSERT INTO penelitian (judul, mulai, akhir, tahun_ajaran, bidang_ilmu_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['judul'],
            $data['mulai'],
            $data['akhir'],
            $data['tahun_ajaran'],
            $bidang_ilmu_id,
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        // Get or create bidang ilmu id
        $bidang_ilmu_id = $this->getBidangIlmuId($data['bidang_ilmu_id']);
        
        $sql = "UPDATE penelitian SET judul=:judul, mulai=:mulai, akhir=:akhir, tahun_ajaran=:tahun_ajaran, bidang_ilmu_id=:bidang_ilmu_id WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':judul', $data['judul']);
        $stmt->bindParam(':mulai', $data['mulai']);
        $stmt->bindParam(':akhir', $data['akhir']);
        $stmt->bindParam(':tahun_ajaran', $data['tahun_ajaran']);
        $stmt->bindParam(':bidang_ilmu_id', $bidang_ilmu_id);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        return $this->show($id);
    }

    public function delete($id)
    {  
        $row = $this->show($id);
        
        // Delete related records in tim_penelitian table first
        $sql_delete_tim = "DELETE FROM tim_penelitian WHERE penelitian_id = ?";
        $stmt_tim = $this->pdo->prepare($sql_delete_tim);
        $stmt_tim->execute([$id]);
        
        // Then delete the penelitian record
        $sql = "DELETE FROM penelitian WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        
        return $row;
    }
}
$penelitian=new Penelitian($pdo);
