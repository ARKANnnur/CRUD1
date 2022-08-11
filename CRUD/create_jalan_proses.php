<?php
include "koneksi.php";

$nik        = $_POST["nik"];
$tanggal    = $_POST["tanggal"];
$waktu      = $_POST["waktu"];
$lokasi     = $_POST["lokasi"];
$suhu       = $_POST["suhu"];

$sql = "INSERT INTO tb_perjalanan(nik, waktu, lokasi, suhu)
VALUES('$nik', '$tanggal', '$waktu', '$lokasi', '$suhu')";
$query = mysqli_query($conn, $sql);

header("location:beranda.html");

$format = "\n$nik | $tanggal | $waktu | $lokasi | $suhu";

$file = fopen('config/jalan_config.txt','a');
fwrite($file, $format);

fclose($file)

?>