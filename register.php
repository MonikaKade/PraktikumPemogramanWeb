<?php

require 'function.php';

if (isset($_POST["username"])) {
    $message = register($_POST); //

    if ($message === "Register Berhasil") {
        echo "
            <script>
                alert ('" . addslashes($message) . "');
                document.location.href ='login.php'; 
            </script>
            ";
    } else {
        echo "
            <script>
                alert ('" . addslashes($message) . "');
            </script>
            ";
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-Xbg45MqvDIk1e563NLpGEulpX6AvL404DP+/iCgW9eFa2BqztiwTexswJo2jLMue" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</head>

<body style="padding: 0 400px;">
    <h2 align="center">Formulir Pendaftaran</h2>

    <div class="card" style="background-color: darkmagenta; color: whitesmoke">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="Password1" name="password1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="Password2" name="password2">
                </div>
                <button type="submit" name="register" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

</body>

</html>