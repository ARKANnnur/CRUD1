<?php
include "koneksi.php";

$nik =$ $_POST["nik"];
$nama =$ $_POST["nama"];
$password =$ $_POST["password"];

$sql = "INSERT INTO tb_user (nik, nama, password)
VALUES('$nik', '$nama', '$password')";
$query = mysqli_query($conn, $sql);

header("location:index.html");

$format = "\n$nik | $nama | $password";

$file = fopen('config/user_config.txt','a');
fwrite($file, $format);
fclose($file)
?>