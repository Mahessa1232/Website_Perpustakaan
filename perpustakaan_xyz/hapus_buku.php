<?php
include "koneksi.php";

// Cek apakah parameter ID dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $koneksi->prepare("DELETE FROM buku WHERE id_buku = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: tampil_buku.php?hapus=sukses");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
