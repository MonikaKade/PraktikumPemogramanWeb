<?php
require 'function.php'; // koneksi dan fungsi tambahmahasiswa()

if(isset($_POST["submit"])){
    if(tambahmahasiswa($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil disimpan!');
            document.location.href = 'datamahasiswa.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal menyimpan data!');
            document.location.href = 'datamahasiswa.php';
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
    <title>Tambah Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .back-btn {
            margin-top: 15px;
            display: inline-block;
            text-align: center;
            width: 100%;
            color: #555;
            text-decoration: none;
        }

        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap*" required />

            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" required />

            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" required />

            <label for="nohp">No HP:</label>
            <input type="text" name="nohp" id="nohp" required />

            <label for="img">Foto:</label>
            <input type="file" name="img" id="img" accept="image/*" required />

            <button type="submit" name="submit">+ Tambah Data</button>
        </form>

        <a href="datamahasiswa.php" class="back-btn">← Kembali ke Data Mahasiswa</a>
    </div>
</body>
</html>
