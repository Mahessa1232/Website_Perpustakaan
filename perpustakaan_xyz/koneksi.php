<?php
$koneksi = new mysqli("localhost", "root", "", "perpustakaan_xyz");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>