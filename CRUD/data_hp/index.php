<!DOCTYPE html>
<html> 
    <head>
        <title>saidftdzkri</title>
        <style type ="text/css">
            *{
                font-family:"Trebuchet MS";
            }
            h1 {
                text-transform:uppercase;
                color:brown;
            }
            table {
                border: 1px solid #ddeeee;
                border-collapse: collapse;
                border-spacing: 0;
                width: 70%;
                margin: 10px auto 10px auto;
            }
            th, td {
                border: 1px solid #ddeeee;
                padding: 20px;
                text-align: left;
            }
            </style>
    </head>
    <body>
    <center><h1>Pencarian Produk</h1></center>
    <center>|<a href="create.html">Tambah Data</a>|</center>
    <form method="GET" action="index.php" style="text-align: center;">
    <label>Kata Pencarian : </label>
    <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo
    $_GET['kata_cari']; } ?>" />
    <button type="submit">Cari</button>

    </form>
    <table border="1">
    <thead>
    <tr>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>harga</th>
    <th>stok</th>
    <th>Opsi</th>
    </tr>
    </thead>
    <tbody>
    <?php

        include('koneksi.php');

        if(isset($_GET['kata_cari'])) {

            $kata_cari=$_GET['kata_cari'];
            
            

            $query="SELECT * FROM tb_produk WHERE id like '%".$kata_cari."%' OR
            nama_produk like'%".$kata_cari. "%' OR harga like'%".$kata_cari. "%' ORDER BY id ASC";
        } else {
            $query="SELECT *FROM tb_produk ORDER BY id ASC";
        }
        $result=mysqli_query($koneksi, $query);
        if(!$result){
            die("Query Error :".mysqli_error($koneksi)."-".mysqli_error($koneksi));
        }
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['nama_produk'];?></td>
                <td><?php echo $row['harga'];?></td>
                <td><?php echo $row['stok'];?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $row['id'];?>">Hapus</a>
                </td>

            </tr>
            <?php
        }
        ?>
</tbody>
</table>
</body>
</html>