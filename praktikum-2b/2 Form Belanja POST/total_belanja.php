<?php
$ar_produk = [
    'TV' => 4200000,
    'KULKAS' => 3100000,
    "MESIN CUCI" => 3800000,
];

$nama_customer = $_POST['nama'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];

$harga_produk = $ar_produk[$produk];
$total_belanja = $harga_produk * $jumlah;

echo "<h1>Rincian Belanja</h1>";
echo "<p>Nama Customer: $nama_customer</p>";
echo "<p>Produk Pilihan: $produk</p>";
echo "<p>Harga Satuan: Rp " . number_format($harga_produk, 0, ',', '.') . "</p>";
echo "<p>Jumlah: $jumlah</p>";
echo "<p>Total Belanja: Rp " . number_format($total_belanja, 0, ',', '.') . "</p>";

?>