<?php
    include "koneksi.php";

// membaca data pada form edit
$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok =  $_POST['stok'];

// update data 
mysqli_query($koneksi, "update tb_produk set nama_produk='$nama_produk', harga='$harga' stok='$stok' where id='$id'");

header("location:index.php");



?>