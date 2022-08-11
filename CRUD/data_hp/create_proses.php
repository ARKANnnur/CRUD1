<?php
include "koneksi.php";
//menangkap data yang dikirim dari form
$id             =$_POST["id"];
$nama_produk    =$_POST["nama_produk"];
$harga          =$_POST["harga"];
$stok           =$_POST["stok"];

//mengimput data ke database
$sql="INSERT INTO tb_produk (id,nama_produk,harga,stok) VALUES('$id','$nama_produk','$harga','$stok')";
$query= mysqli_query($koneksi,$sql);

//mengalihkan halaman kembali ke index.php
header("location:index.php");

?>