<?php
   $koneksi = mysqli_connect("localhost", "root", "", "webif");
    if(!$koneksi)
    {
        die("Koneksi gagal!".mysqli_connect_error());
    }
   function query($query)
   {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows=[];///wadah

    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
   }
?>