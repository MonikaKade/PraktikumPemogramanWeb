<?php
// 1. Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "webif");

if (!$koneksi) {
    die("Koneksi gagal! " . mysqli_connect_error());
}

// 2. Fungsi untuk mengambil data dari query
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// 3. Fungsi untuk menambahkan data mahasiswa
function tambahmahasiswa($data) {
    global $koneksi;

    // Ambil data dari form
    $nama = htmlspecialchars($data["nama"]); 
    $nim = htmlspecialchars($data["nim"]); 
    $jurusan = htmlspecialchars($data["jurusan"]); 
    $nohp = htmlspecialchars($data["nohp"]);

    // ===== Upload Gambar =====
    $namaFile = $_FILES['img']['name'];
    $tmpName = $_FILES['img']['tmp_name']; //fungsnya untuk menyimpan sementara

    // Cek ekstensi file (opsional keamanan)
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensi, $ekstensiGambarValid)) {
        echo "<script>alert('Yang diupload bukan gambar!');</script>";
        return 0;
    }

    // Generate nama unik (hindari nama file sama)
    $namaFileBaru = uniqid() . '.' . $ekstensi;

    // Pindahkan file ke folder img/
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    // Query insert ke database
    $query = "INSERT INTO mahasiswa VALUES ('', '$namaFileBaru', '$nama', '$nim', '$jurusan', '$nohp')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// 4. Fungsi untuk menghapus data berdasarkan id
function hapusdata($id) {
    global $koneksi;

    // Tambahan: hapus gambar dari folder juga (opsional)
    $foto = query("SELECT img FROM mahasiswa WHERE id = $id")[0]['img'];
    if (file_exists('img/' . $foto)) {
        unlink('img/' . $foto); // hapus file gambar dari folder img/
    }

    // Hapus dari database
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function ubahdata($data) {
    global $koneksi;

    // Ambil data dari form
    $id = $data["id"]; // HARUS ditambahkan
    $nama = htmlspecialchars($data["nama"]); 
    $nim = htmlspecialchars($data["nim"]); 
    $jurusan = htmlspecialchars($data["jurusan"]); 
    $nohp = htmlspecialchars($data["nohp"]);
    $gambarLama = $data["gambarLama"]; // dari input hidden form

    // ===== Upload Gambar =====
    if ($_FILES['img']['error'] === 4) {
        // Jika tidak upload gambar baru
        $namaFileBaru = $gambarLama;
    } else {
        $namaFile = $_FILES['img']['name'];
        $tmpName = $_FILES['img']['tmp_name'];
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        if (!in_array($ekstensi, $ekstensiGambarValid)) {
            echo "<script>alert('Yang diupload bukan gambar!');</script>";
            return 0;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensi;
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        // (Opsional) Hapus gambar lama jika ada:
        if (file_exists('img/' . $gambarLama)) {
            unlink('img/' . $gambarLama);
        }
    }

    // Query update
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                nohp = '$nohp',
                img = '$namaFileBaru'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}


function register($data)
{
   global $koneksi;

   //ambil data register.php
   $username = stripslashes($data["username"]);
   $password1 = $data["password1"];
   $password2 = $data["password2"];

   $query = "SELECT * FROM user WHERE username = '$username'";

   $username_check = mysqli_query($koneksi, $query);
//untuk mengecek agr username tdk lebih dari satu
   if(mysqli_num_rows($username_check) > 0)
   {
    return "Username Sudah Terdaftar";
   }

//aturan untuk membuat usrname
   if(!preg_match('/^[a-zA-Z0-9.-_]+$/', $username))
   {
    return  "Username tidak Valid!";
   }

//untuk pengecekan pass
   if($password1 !== $password2)
   {
    return "Konfirmasi Password Salah!";
   }

   $encrypt_pass = password_hash($password1, PASSWORD_DEFAULT);

   $query_insert = "INSERT INTO user (username, password) VALUE ('$username', '$encrypt_pass')";

   if(mysqli_query($koneksi, $query_insert))
   {
    return "Registrasi Berhasil!";
   }
   else {
    return "Gagal" . mysqli_error($koneksi);
   }
}
?>
