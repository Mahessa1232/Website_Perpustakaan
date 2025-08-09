<?php 
include 'koneksi.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-image: url('library.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background-color: rgba(255,255,255,0.95);
            padding: 30px 40px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            border-radius: 6px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <input type="submit" name="login" value="Login">
    </form>

    <?php
    if (isset($_POST['login'])) {
        $u = $_POST['username'];
        $p = $_POST['password'];

        $cek = $koneksi->query("SELECT * FROM admin WHERE username='$u' AND password=MD5('$p')");
        
        if ($cek->num_rows > 0) {
            $_SESSION['admin'] = $u;
            echo "<script>
                alert('Selamat datang $u');
                window.location.href = 'dashboard.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Login gagal! Username atau password salah.');
                window.location.href = 'login.php';
            </script>";
            exit;
        }
    }
    ?>
</div>

</body>
</html>
