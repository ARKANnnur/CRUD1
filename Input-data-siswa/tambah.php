<?php 

session_start();

if( !isset($_SESSION["login"]) ){
    header("location: login.php");
}

require 'functions.php';

// cek tombol submit sudah di tekan/belum
if( isset($_POST["submit"]) ) {


    // cek data apakah berhasil di tambahkan atau tidak
    if( tambah($_POST)  > 0 ) {
        echo "<script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }else {
        echo "<script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data waifu</title>
</head>
<body>
    <h1>Tambah data waifu</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="NISN">NISN : </label>
                <input type="text" name="NISN" id="NISN" required>
            </li>
            <li>
                <label for="Nama">Nama : </label>
                <input type="text" name="Nama" id="Nama" required>
            </li>
            <li>
                <label for="Alamat">Alamat : </label>
                <input type="text" name="Alamat" id="Alamat" required>
            </li>
            <li>
                <label for="Kelamin">Jenis Kelamin : </label>
                <input type="text" name="Kelamin" id="Kelamin" required placeholder="Pria/Wanita">
            </li>
            <li>
                <label for="Agama">Agama : </label>
                <input type="text" name="Agama" id="Agama" required>
            </li>
            <li>
                <label for="Asalsekol">Asal sekolah : </label>
                <input type="text" name="Asalsekol" id="Asalsekol" required>
            </li>
            <li>
                <label for="Telepon">Nomor Telepon : </label>
                <input type="text" name="Telepon" id="Telepon" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>


    </form>
    <a href="index.php" type="submit">Kembali</a>



</body>
</html>