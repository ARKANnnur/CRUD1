<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>

        <!--membungkus tampilan Read Data -->
        <fieldset>
        <!--Judul pada fieldset -->
        <legend align="center">form input data</legend>
        <!--Tampilan form input data -->
        <form action="create_proses.php" method="post" align="center">
            <input type="text" name="id" placeholder="id" size="40px" required>
            <br><br>
            <input type="text" name="nama_produk" placeholder="nama produk" size="40px" required>
            <br><br>
            <input type="text" name="harga" placeholder="input harga" size="40px" required>
            <br><br>
            <input type="text" name="stok" placeholder="input stok" size="40px" required>
            <br><br>
            <button type="submit" name="submit">SIMPAN</button>
            <button type="RESET" name="RESET">HAPUS</button>
</fieldset>
</body>
</html>