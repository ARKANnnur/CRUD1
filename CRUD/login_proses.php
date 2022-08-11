<?php
session_start();
include 'koneksi.php';

$nik = $_POST['nik'];
$pass = $_POST['password'];

$data = mysqli_query($cann, "SELECT * FROM tb_user WHERE nik='$nik and password='$passs'");

$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['nik'] = $nik;
    $_SESSION['status'] = "login";
    header("location:beranda.html");
}
else {
    header("location:index.html");
}
?>