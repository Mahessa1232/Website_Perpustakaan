<?php
include 'koneksi.php';
$nama = $_POST['nama_peminjam'];
$id_buku = $_POST['id_buku'];
$tanggal = $_POST['tanggal_pinjam'];

$koneksi->query("INSERT INTO peminjaman (id_buku, nama_peminjam, tanggal_pinjam)
VALUES ('$id_buku', '$nama', '$tanggal')");

echo "Data peminjaman berhasil disimpan!";
?>