<?php 
sleep(1);

require'../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM siswa WHERE 
NISN LIKE '$keyword%' OR
Nama LIKE '$keyword%' OR
Alamat LIKE '$keyword%' OR
Kelamin LIKE '$keyword%' OR
Agama LIKE '$keyword%' OR
Asalsekol LIKE '$keyword%' OR
Telepon LIKE '$keyword%' 
    ";
$mhs = query($query);
?>


<div class="container">
<div id="container">
<table class="table table-dark ">

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
