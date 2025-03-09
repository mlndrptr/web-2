<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="container mt-4">
<h2 class="text-center">Form Nilai Siswa</h2>
<br>
<form method="GET" action="form_nilai.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <input id="nama" name="nama" placeholder="Nama Lengkap" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="matkul" class="col-4 col-form-label">Mata Kuliah</label> 
    <div class="col-8">
      <select id="matkul" name="matkul" class="custom-select">
        <option value="DDP">Dasar Dasar Pemrograman</option>
        <option value="BD">Basis Data</option>
        <option value="Pemrograman Web">Pemrograman Web</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uts" class="col-4 col-form-label">Nilai UTS</label> 
    <div class="col-8">
      <input id="nilai_uts" name="nilai_uts" placeholder="Nilai UTS" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_uas" class="col-4 col-form-label">Nilai UAS</label> 
    <div class="col-8">
      <input id="nilai_uas" name="nilai_uas" placeholder="Nilai UAS" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nilai_tugas" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
    <div class="col-8">
      <input id="nilai_tugas" name="nilai_tugas" placeholder="Nilai Tugas" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>

<?php
// Pastikan tombol simpan sudah ditekan sebelum menampilkan hasil
if (isset($_GET['proses'])) {
    $nama_siswa = isset($_GET['nama']) ? $_GET['nama'] : '';
    $mata_kuliah = isset($_GET['matkul']) ? $_GET['matkul'] : '';
    $nilai_uts = isset($_GET['nilai_uts']) ? $_GET['nilai_uts'] : '';
    $nilai_uas = isset($_GET['nilai_uas']) ? $_GET['nilai_uas'] : '';
    $nilai_tugas = isset($_GET['nilai_tugas']) ? $_GET['nilai_tugas'] : '';
    // Cek apakah semua input telah diisi
    if (!empty($nama_siswa) && !empty($mata_kuliah) && !empty($nilai_uts) && !empty($nilai_uas) && !empty($nilai_tugas)) {
        echo 'Nama: '.$nama_siswa;
        echo '<br/>Mata Kuliah: '.$mata_kuliah;
        echo '<br/>Nilai UTS: '.$nilai_uts;
        echo '<br/>Nilai UAS: '.$nilai_uas;
        echo '<br/>Nilai Tugas/Praktikum: '.$nilai_tugas;
    }
}
?>
</body>
</html>
