<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Buku Terpilih</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 20px;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-bottom: 25px;
        }
        table {
            border-collapse: collapse;
            margin: auto;
            width: 90%;
            background: white;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f7f5;
        }
        .no-data {
            text-align: center;
            font-size: 16px;
            color: red;
        }
        .btn-kembali {
            display: block;
            margin: 25px auto;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            width: fit-content;
        }
        .btn-kembali:hover {
            background-color: #2980b9;
        }
        @media print {
            body {
                background: white;
                color: black;
            }
            table {
                box-shadow: none;
                border: 1px solid #000;
            }
            th {
                background-color: #ddd !important;
                color: black !important;
            }
            .btn-kembali {
                display: none; /* tombol tidak ikut tercetak */
            }
        }
    </style>
</head>
<body>
<?php
if (!empty($_POST['buku_terpilih'])) {
    $ids = implode(",", $_POST['buku_terpilih']);
    $query = $koneksi->query("SELECT * FROM buku WHERE id_buku IN ($ids)");

    echo "<h2>Daftar Buku Terpilih</h2>";
    echo "<div class='subtitle'>Laporan ini dicetak otomatis dari Sistem Perpustakaan XYZ</div>";
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun</th>
            </tr>";

    while ($row = $query->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_buku']}</td>
                <td>{$row['judul']}</td>
                <td>{$row['pengarang']}</td>
                <td>{$row['tahun_terbit']}</td>
            </tr>";
    }
    echo "</table>";

    echo "<a href='tampil_buku.php' class='btn-kembali'>⬅ Kembali ke Daftar Buku</a>";

    echo "<script>window.print();</script>";
} else {
    echo "<p class='no-data'>Tidak ada buku yang dipilih.</p>";
    echo "<a href='tampil_buku.php' class='btn-kembali'>⬅ Kembali ke Daftar Buku</a>";
}
?>
</body>
</html>
