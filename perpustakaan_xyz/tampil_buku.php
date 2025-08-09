<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
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
        h3 {
            text-align: center;
            color: #fff;
            text-shadow: 1px 1px 2px #000;
        }
        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e0f7fa;
        }
        .button-container {
            text-align: center;
            margin-top: 25px;
        }
        .btn-cetak {
            background-color: #e67e22;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-cetak:hover {
            background-color: #cf711c;
        }
        .btn-edit, .btn-hapus {
            padding: 5px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }
        .btn-edit {
            background-color: #3498db;
        }
        .btn-hapus {
            background-color: #e74c3c;
        }
        .btn-edit:hover {
            background-color: #2980b9;
        }
        .btn-hapus:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<h3>Daftar Buku Perpustakaan XYZ</h3>

<form action="laporan_buku.php" method="post" target="_blank">
<table>
    <tr>
        <th>Pilih</th>
        <th>ID</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun</th>
        <th>Aksi</th>
    </tr>
    <?php
    $data = $koneksi->query("SELECT * FROM buku");
    while ($row = $data->fetch_assoc()) {
        echo "<tr>
            <td><input type='checkbox' name='buku_terpilih[]' value='{$row['id_buku']}'></td>
            <td>{$row['id_buku']}</td>
            <td>{$row['judul']}</td>
            <td>{$row['pengarang']}</td>
            <td>{$row['tahun_terbit']}</td>
            <td>
                <a href='edit_buku.php?id={$row['id_buku']}' class='btn-edit'>Edit</a>
                <a href='hapus_buku.php?id={$row['id_buku']}' class='btn-hapus' onclick=\"return confirm('Yakin ingin menghapus buku ini?')\">Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>

<div class="button-container">
    <button type="submit" class="btn-cetak">📄 Cetak Buku Terpilih</button>
</div>
        <div class="button-container">
            <a href="dashboard.php" class="btn-cetak">← Kembali</a>
        </div>
</form>

</body>
</html>
