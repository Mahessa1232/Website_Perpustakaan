<?php session_start(); if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; } ?>
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
    <title>Dashboard Perpustakaan</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }
        header {
            background-color: #2e86de;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .card:hover {
            background-color: #dfefff;
            transform: translateY(-5px);
        }
        .card a {
            text-decoration: none;
            color: #2e86de;
            font-size: 16px;
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 40px;
            padding: 10px;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>
<body>

<header>
    📚 Dashboard Perpustakaan
</header>

<div class="container">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?> 👋</h2>
    <div class="menu">
        <div class="card"><a href="input_buku.php">➕ Input Buku</a></div>
        <div class="card"><a href="tampil_buku.php">📖 Daftar Buku</a></div>
        <div class="card"><a href="input_peminjaman.php">📅 Peminjaman Buku</a></div>
        <div class="card"><a href="logout.php">🚪 Logout</a></div>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Perpustakaan XYZ. All rights reserved.
</footer>

</body>
</html>
