<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID buku tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = "SELECT * FROM buku WHERE id_buku = '$id'";
$result = $koneksi->query($query);

if ($result->num_rows == 0) {
    echo "Data buku tidak ditemukan.";
    exit;
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
        <style>
body {
    background-image: url('library.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
    padding: 20px;
    color: #333;
}
</style>
<head>
    <title>Detail Buku</title>
</head>
<body>
    
    <h2>Detail Buku</h2>
    <p><strong>Judul:</strong> <?= $data['judul'] ?></p>
    <p><strong>Pengarang:</strong> <?= $data['pengarang'] ?></p>
    <p><strong>Tahun Terbit:</strong> <?= $data['tahun_terbit'] ?></p>
    <p><strong>Cover:</strong><br>
        <?php if (!empty($data['cover'])): ?>
            <img src="uploads/<?= $data['cover'] ?>" width="150">
        <?php else: ?>
            <em>Tidak ada cover</em>
        <?php endif; ?>
    </p>
    <a href="tampil_buku.php">Kembali ke Daftar Buku</a>
</body>
</html>
