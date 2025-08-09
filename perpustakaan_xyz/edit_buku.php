<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$buku = $koneksi->query("SELECT * FROM buku WHERE id_buku=$id")->fetch_assoc();
?>
<form method="POST">
    Judul: <input type="text" name="judul" value="<?= $buku['judul'] ?>"><br>
    Pengarang: <input type="text" name="pengarang" value="<?= $buku['pengarang'] ?>"><br>
    Tahun: <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>"><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $koneksi->query("UPDATE buku SET judul='$_POST[judul]', pengarang='$_POST[pengarang]', tahun_terbit='$_POST[tahun_terbit]' WHERE id_buku=$id");
    echo "Data berhasil diupdate!";
}
?>