<?php
session_start();
require 'function.php';
$error = false;

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perbaikan: masukkan input username ke query
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Perbaikan: cek password terhadap kolom 'password'
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = $user['id'];
            // Redirect jika berhasil login
            header("Location: datamahasiswa.php");
            exit;
        }
    }

    $error = true;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</head>

<body style="padding: 0 400px;">
    <h2 align="center">Login</h2>

    <div class="card" style="background-color: darkmagenta; color: whitesmoke">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password" name="password">
                </div>

                <button type="submit" name="login" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
    <?php if ($error): ?>
        <p style="color: red"> Username/Password Salah!</p>
    <?php endif; ?>
</body>

</html>