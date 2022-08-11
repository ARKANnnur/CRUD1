<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
</head>
<body>
    <h3>Edit Data</h3>
    <?php 
        include "koneksi.php";
        
        $id = $_GET['id'];
        $edit = mysqli_query($koneksi, "SELECT * from tb_produk WHERE id ='$id'");
        while ($row = mysqli_fetch_array($edit)) {
  
    ?>

<form method="post" action="edit_proses.php">
    <table>
        <tr>
            <td>Nama Produk</td>
            <td>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <input type="text" name="nama_produk" value="<?php echo $row['nama_produk'];?>">
            </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>
                <input type="text" name="harga" value="<?php echo $row['harga'];?>">
            </td>
        </tr>
        <tr>
            <td>Stok</td>
            <td>
                <input type="text" name="stok" value="<?php echo $row['stok'];?>">
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="SIMPAN">
            </td>
        </tr>
    </table>
</form>

<?php }?>

</body>
</html>