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
    <title>Form Peminjaman Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-box {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #2e86de;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 600;
            color: #333;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #2e86de;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #1e6fc2;
        }
        #hasil {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
        .btn-kembali {
    display: block;
    margin-top: 10px;
    text-align: center;
    background-color: #2e86de; /* sama dengan tombol Pinjam Buku */
    color: white;
    padding: 12px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}
.btn-kembali:hover {
    background-color: #1e6fc2; /* sama efek hover Pinjam Buku */
}


    </style>
</head>
<body>

<div class="form-box">
    <h2>Peminjaman Buku</h2>
    <form id="formPinjam">
        <label>Nama Peminjam:</label>
        <input type="text" name="nama_peminjam" required>

        <label>ID Buku:</label>
        <input type="number" name="id_buku" required>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required>

        <input type="submit" value="Pinjam Buku">
    </form>
<a href="dashboard.php" class="btn-kembali">Kembali</a>

    <div id="hasil"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#formPinjam').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'simpan_peminjaman.php',
        data: $(this).serialize(),
        success: function(response) {
            $('#hasil').html(response);
        },
        error: function() {
            $('#hasil').html("Terjadi kesalahan. Coba lagi.");
        }
    });
});
</script>

</body>
</html>
