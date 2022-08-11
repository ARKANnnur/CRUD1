<?php 

session_start();

if( !isset($_SESSION["login"]) ){
    header("location: login.php");
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// quey data waifu
$mhs = query("SELECT * from siswa WHERE id = $id")[0] ; 

// cek tombol submit sudah di tekan/belum
if( isset($_POST["submit"]) ) {

    // cek data apakah berhasil di ubah atau tidak
    if( ubah($_POST)  > 0 ) {
        echo "<script>
        alert('data berhasil ubah!');
        document.location.href = 'index.php';
        </script>";
    }else {
        echo "<script>
        alert('data gagal ubah!');
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
    <title>Ubah data Siswa</title>
</head>
<body>
    <h1>Ubah data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $wf["id"]; ?>">
        <ul>
            <li>
                <label for="NISN">NISN : </label>
                <input type="text" name="NISN" id="NISN" required 
                value="<?= $mhs["NISN"]; ?>">
            </li>
            <li>
                <label for="Nama">Nama : </label>
                <input type="text" name="Nama" id="Nama" required 
                value="<?= $mhs["Nama"]; ?>">
            </li>
            <li>
                <label for="Alamat">Alamat : </label>
                <input type="text" name="Alamat" id="Alamat" required 
                value="<?= $mhs["Alamat"]; ?>">
            </li>
            <li>
                <label for="Kelamin">Jenis Kelamin : </label>
                <input type="text" name="Kelamin" id="Kelamin" required 
                value="<?= $mhs["Kelamin"]; ?>">
            </li>
            <li>
                <label for="Agama">Agama : </label>
                <input type="text" name="Agama" id="Agama" required 
                value="<?= $mhs["Agama"]; ?>">
            </li>
            <li>
                <label for="Asalsekol">Asal sekolah : </label>
                <input type="text" name="Asalsekol" id="Asalsekol" required 
                value="<?= $mhs["Asalsekol"]; ?>">
            </li>
            <li>
                <label for="Telepon">Nomor Telepon : </label>
                <input type="text" name="Telepon" id="Telepon" required 
                value="<?= $mhs["Telepon"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>


    </form>
    <a href="index.php" type="submit">Kembali</a>



</body>
</html>
