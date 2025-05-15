<?php
require_once 'Controllers/Dosen.php';
require_once 'Helpers/helper.php';

$list_Dosen = $dosen->index();

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'delete') {
        $row = $dosen->delete($_POST['id']);
        echo "<script>alert('Data $row[nama] berhasil dihapus')</script>";
        echo "<script>window.location='?url=dosen'</script>";
    }
}
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="mb-2">
                <a class="btn btn-success btn-sm" href="?url=dosen-input">
                    Tambah Dosen
                </a>
            </div>

            <div style="overflow-x: auto;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="vertical-align: middle; min-width: 50px;">No</th>
                            <th style="vertical-align: middle; min-width: 100px;">NIDN</th>
                            <th style="vertical-align: middle; min-width: 150px;">Nama</th>
                            <th style="vertical-align: middle; min-width: 120px;">Gelar Depan</th>
                            <th style="vertical-align: middle; min-width: 120px;">Gelar Belakang</th>
                            <th style="vertical-align: middle; min-width: 100px;">Tahun Masuk</th>
                            <th style="vertical-align: middle; min-width: 150px;">Email</th>
                            <th style="vertical-align: middle; min-width: 200px;">Alamat</th>
                            <th style="vertical-align: middle; min-width: 120px;">Tanggal Lahir</th>
                            <th style="vertical-align: middle; min-width: 150px;">Tempat Lahir</th>
                            <th style="vertical-align: middle; min-width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($list_Dosen as $row): ?>
                            <tr style="text-align: center;">
                                <td style="vertical-align: middle;"><?= $no++ ?></td>
                                <td style="vertical-align: middle;"><?= $row['nidn'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['nama'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['gelar_depan'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['gelar_belakang'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['tahun_masuk'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['email'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['alamat'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['tanggal_lahir'] ?></td>
                                <td style="vertical-align: middle;"><?= $row['tempat_lahir'] ?></td>
                                <td style="vertical-align: middle;">
                                    <a href="?url=dosen-input&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="" method="post" style="display: inline;" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="type" value="delete">
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
