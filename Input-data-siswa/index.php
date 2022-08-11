<?php 
session_start();

if( !isset($_SESSION["login"]) ){
    header("location: login.php");
}

require "functions.php";

// pagination
// konfigurasi
// ceil=bulatkan keatas,floor= bulatkan ke bawah,round=bulatkan.
$jumlahdataperhalaman = 3;
$jumlahdata = count(query("SELECT * FROM siswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$hal_on = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $hal_on) - $jumlahdataperhalaman;


$mhs = query("SELECT * from siswa LIMIT $awaldata,$jumlahdataperhalaman");

if( isset($_POST["cari"]) ) {
    $mhs = cari($_POST["keyword"]);
}; 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
        <nav>
            <label class="logo">Dzikri</label>
            <ul>
                <li>
                <a href="logout.php">logout</a>
                </li>
            </ul>
        </nav>
    </header>
<br>


<div class="container">
    <h1>Daftar Siswa</h1>

<a href="tambah.php">Tambah data Siswa</a>
<br><br>


    <form action="" method="post">

        <input type="text" name="keyword" size="50px" autofocus
        placeholder="masukan:pencarian" autocomplete="off" 
        id="keyword">

        <button hidden type="submit" name="cari" id="tombol-cari">Cari</button>


    </form>
<br>


<div id="container">
<!-- navigasi -->

    <?php if( $hal_on > 1) : ?>
        <a href="?halaman=<?= $hal_on - 1; ?>">&laquo;</a>
<?php endif; ?>


<?php for($i = 1; $i <= $jumlahhalaman; $i++) : ?>
    
    <?php if( $i == $hal_on) : ?>
        <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:chartreuse;"><?=  $i; ?></a>
    <?php else : ?>
        <a href="?halaman=<?= $i; ?>" style="font-weight: bold;"><?=  $i; ?></a>
    <?php endif; ?>

<?php endfor;?>

<?php if( $hal_on < $jumlahhalaman) : ?>
    <a href="?halaman=<?= $hal_on + 1; ?>">&raquo;</a>
<?php endif; ?>

<!-- navigation -->



    <table class="table table-dark">

            <tr class="table-active">
                <th scope="col">No</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Agama</th>
                <th scope="col">Asal Sekolah</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Opsi</th>

            </tr>
            <?php $i = 1;?>
            <?php foreach( $mhs as $row) : ?>
            <tr>
                <td scope="row"><?= $i?></td>
                <td scope="row"><?= $row["NISN"]; ?></td>
                <td scope="row"><?= $row["Nama"]; ?></td>
                <td scope="row"><?= $row["Alamat"]; ?></td>
                <td scope="row"><?= $row["Kelamin"]; ?></td>
                <td scope="row"><?= $row["Agama"]; ?></td>
                <td scope="row"><?= $row["Asalsekol"]; ?></td>
                <td scope="row"><?= $row["Telepon"]; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>"
                    onclick="return confirm('yakin');">hapus</a>
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach ;?>
    </table>

    </div>
</div>


<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>