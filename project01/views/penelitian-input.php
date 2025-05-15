<?php
require_once 'Controllers/penelitian.php';
require_once 'Helpers/helper.php';

$penelitian_id = isset($_GET['id']) ? $_GET['id'] : null;
$show_penelitian = $penelitian_id ? $penelitian->show($penelitian_id) : [];

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'create') {
        $id = $penelitian->create($_POST);
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location='?url=penelitian'</script>";
    } else if ($_POST['type'] == 'update') {
        $row = $penelitian->update($penelitian_id, $_POST);
        echo "<script>alert('Data $row[nama] berhasil diperbarui')</script>";
        echo "<script>window.location='?url=penelitian'</script>";
    }
}
?>

<div class="container">
    <form method="post">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Tambah penelitian
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $show_penelitian['judul'] ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="mulai">Mulai</label>
                    <input type="date" class="form-control" id="mulai" name="mulai" value="<?= $show_penelitian['mulai'] ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="akhir">Akhir</label>
                    <input type="date" class="form-control" id="akhir" name="akhir" value="<?= $show_penelitian['akhir'] ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $show_penelitian['tahun_ajaran'] ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="bidang_ilmu_id">Bidang Ilmu</label>
                    <input type="text" class="form-control" id="bidang_ilmu_id" name="bidang_ilmu_id" value="<?= $show_penelitian['bidang_ilmu_nama'] ?? '' ?>" required>
                </div>
            </div>

            <div class="card-footer text-right">
                <input type="hidden" name="type" value="<?= $penelitian_id ? 'update' : 'create' ?>">
                <input type="hidden" name="id" value="<?= $penelitian_id ?>">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>

    </form>
</div>
