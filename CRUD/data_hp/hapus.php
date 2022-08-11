<?php 
require 'koneksi.php';

$id = $_GET["id"];


$id = $_GET['id'];
mysqli_query($koneksi, "DELET FROM tb_produk where id= $id");
header("location:index.php");

if( hapus($id) > 0) {
    echo "
    <script>
        alert('data berhasil dihapus!');
        document.location.href = 'index.php';
    </script>";
} else {
    echo "
    <script>
        alert('data gagal dihapus!');
        document.location.href = 'index.php';
    </script>";
}

?>