<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_toko";
    $koneksi = mysqli_connect($host,$user,$pass,$db);

    if(!$koneksi) {
        die("koneksi dengan data base gagal:".mysqli_connect_error($host,$user,$pass,$db));
    }

?>