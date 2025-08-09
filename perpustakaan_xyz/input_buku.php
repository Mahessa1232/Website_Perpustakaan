<?php include 'koneksi.php'; session_start(); if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; } ?>
<!DOCTYPE html>
<html lang="id">
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
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            padding: 30px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 25px 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-kembali {
            background-color: #ccc;
            color: #333;
            text-decoration: none;
        }
        .btn-kembali:hover {
            background-color: #b3b3b3;
        }
        .btn-simpan {
            background-color: #4CAF50;
            color: white;
        }
        .btn-simpan:hover {
            background-color: #45a049;
        }
        .pesan {
            margin-top: 20px;
            padding: 10px;
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left: 5px solid #4CAF50;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Buku Baru</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="judul" required>

        <label>Pengarang:</label>
        <input type="text" name="pengarang" required>

        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" min="1900" max="2099" required>

        <label>Cover Buku:</label>
        <input type="file" name="cover" accept="image/*" required>

        <div class="btn-container">
            <a href="dashboard.php" class="btn btn-kembali">← Kembali</a>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-simpan">
        </div>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $tahun = $_POST['tahun_terbit'];
        $cover = $_FILES['cover']['name'];
        $tmp = $_FILES['cover']['tmp_name'];
        $folder = "uploads/";

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        move_uploaded_file($tmp, $folder . $cover);

        $koneksi->query("INSERT INTO buku (judul, pengarang, tahun_terbit, cover) VALUES 
        ('$judul', '$pengarang', '$tahun', '$cover')");

        echo "<div class='pesan'>✅ Data Buku <strong>$judul</strong> berhasil disimpan!</div>";
    }
    ?>
</div>

</body>
</html>
