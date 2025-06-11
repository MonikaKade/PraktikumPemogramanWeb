<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">

</head>
<body>
    <form>
        <h2  align= "center">Formulir Pendaftaran</h2>
        <label for="nama lengkap">Nama Lengkap:</label><br>
        <input type="text" name="nama lengkap"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="femail" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password"> <br>
        <label for="Umur">Umur:</label><br>
        <input type="number" name="Umur"><br>
        <label for="tanggallahir">Tanggal Lahir:</label><br>
        <input type="date" name="tanggallahir"><br><br>
        <label for="uploadfotoprofile">Upload Foto Profile</label><br>
        <input type="file" name="uploadfotoprofile">
        <p>Jenis Kelamin</p>
            <div class="radio-group">
                <label><input type="radio" name="jeniskelamin" value="Laki-laki">Laki-laki</label>
                <label><input type="radio" name="jeniskelamin" value="Perempuan">Perempuan</label>
            </div>

        <p>Hobi</p>
            <div class="checkbox-group">
                <label><input type="checkbox" name="hobi" value="Membaca">Membaca</label>
                <label><input type="checkbox" name="hobi" value="Travelling">Travelling</label>
                <label><input type="checkbox" name="hobi" value="Olahraga">Olahraga</label>
            </div>

        <label>Negara:</label><br>
        <select id="negara" name="negara">
        <option value="Jepang">Jepang</option>
        <option value="Australia">Australia</option>
        <option value="Indonesia">Indonesia</option>
        </select><br><br>
        <label for="bio">Biografi Singkat:</label><br>
        <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br><br>
  
      <input type="submit" value="Daftar">
    

        

    </form>
</body>
</html>