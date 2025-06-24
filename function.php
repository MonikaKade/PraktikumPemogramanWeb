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
    $tmpName = $_FILES['img']['tmp_name'];

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
?>
