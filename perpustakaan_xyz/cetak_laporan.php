<?php
include 'koneksi.php';

if (!empty($_POST['buku_terpilih'])) {
    $ids = implode(",", $_POST['buku_terpilih']);
    $query = $koneksi->query("SELECT * FROM buku WHERE id_buku IN ($ids)");

    echo "<h2>Daftar Buku Terpilih</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Tahun</th></tr>";

    while ($row = $query->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_buku']}</td>
                <td>{$row['judul']}</td>
                <td>{$row['pengarang']}</td>
                <td>{$row['tahun_terbit']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada buku yang dipilih.";
}
?>
