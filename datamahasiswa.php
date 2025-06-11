<?php
    require 'function.php';
    $query = "SELECT * FROM mahasiswa";
    $rows = query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>datamahasiswa</h1>
<table border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
        <th>NoHp</th>
    </tr>
    <?php 
    $i = 1;
    foreach ($rows as $mhs) { ?> 
        <tr>
            <td> <?= $i ?> </td>
            <td>  
                 <img src="img/<?= $mhs['img'] ?>" alt="Foto Mahasiswa" width="80">
            </td>
            <td> <?php echo $mhs["nama"] ?> </td>
            <td> <?= $mhs["nim"] ?> </td>
            <td> <?= $mhs["jurusan"] ?></td>
            <td> <?= $mhs["nohp"] ?></td>
        </tr>
    <?php $i++; } ?>
</body>
</html>