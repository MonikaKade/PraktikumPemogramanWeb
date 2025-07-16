<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$query = "SELECT * FROM mahasiswa";
$rows = query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-tambah {
            background-color: #2ecc71;
            color: white;
        }

        .btn-hapus {
            background-color: #e74c3c;
            color: white;
        }

        img {
            border-radius: 6px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>

        <a href="tambahdata.php"><button class="btn-tambah">+ Tambah Data</button></a>

        <table>
            <tr>
                <th>NO</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>No Hp</th>
                <th>Aksi</th>
            </tr>

            <?php
            $i = 1;
            foreach ($rows as $mhs) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><img src="img/<?= $mhs['img'] ?>" alt="Foto Mahasiswa" width="80"></td>
                    <td><?= $mhs["nama"] ?></td>
                    <td><?= $mhs["nim"] ?></td>
                    <td><?= $mhs["jurusan"] ?></td>
                    <td><?= $mhs["nohp"] ?></td>
                    <td>
                        <a href="hapusdata.php?id=<?= $mhs['id'] ?>" onclick="return confirm('Yakin ingin dihapus?');">
                            <button class="btn-hapus">Hapus</button>
                        </a>
                        |
                        <a href="ubahdata.php?id=<?= $mhs['id'] ?>">
                            <button style="margin-bottom: 12px; background-color: blue; color: white;">Edit</button>
                        </a>
                    </td>

                </tr>
                <?php $i++;
            } ?>
        </table>
    </div>
</body>

</html>