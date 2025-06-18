<!-- //post mengirim
///get mengambil -->
<?php
require 'function.php';
    $id= $_GET['id'];


    if(hapusdata($id)>0){
         echo "
        <script>
            alert('Berhasil diHapus!');
            document.location.href = '../datamahasiswa.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Gagal Menghapus data!');
            document.location.href = '../datamahasiswa.php';
        </script>
        ";
    }
    mysqli_error($koneksi);

?>