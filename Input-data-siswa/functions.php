<?php 
// koneksi ke database
$conn =  mysqli_connect("localhost", "root", "", "db_siswa");



function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;
    $NISN = htmlspecialchars($data ["NISN"]);
    $Nama = htmlspecialchars($data ["Nama"]);
    $Alamat = htmlspecialchars($data ["Alamat"]);
    $Kelamin = htmlspecialchars($data ["Kelamin"]);
    $Agama = htmlspecialchars($data ["Agama"]);
    $Asalsekol = htmlspecialchars($data ["Asalsekol"]);
    $Telepon = htmlspecialchars($data ["Telepon"]);
 

    $query = "INSERT INTO siswa VALUES('', '$NISN', '$Nama', '$Alamat', '$Kelamin', '$Agama', '$Asalsekol', '$Telepon') ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}




function ubah($data) {
    global $conn;
    $id = $data["id"];
    $NISN = htmlspecialchars($data ["NISN"]);
    $Nama = htmlspecialchars($data ["Nama"]);
    $Alamat = htmlspecialchars($data ["Alamat"]);
    $Kelamin = htmlspecialchars($data ["Kelamin"]);
    $Agama = htmlspecialchars($data ["Agama"]);
    $Asalsekol = htmlspecialchars($data ["Asalsekol"]);
    $Telepon = htmlspecialchars($data ["Telepon"]);



    $query = "UPDATE siswa SET
    NISN = '$NISN',
    Nama = '$Nama',
    Alamat = '$Alamat',
    Kelamin = '$Kelamin',
    Agama = '$Agama',
    Asalsekol = '$Asalsekol',
    Telepon = '$Telepon'
    WHERE id = $id
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);

    // $file = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM waifu WHERE id='$id'"));
    // unlink('img/' . $file["gambar"]);
    // $hapus = "DELETE FROM waifu WHERE id='$id'";
    // mysqli_query($koneksi,$hapus);
    // return mysqli_affected_rows($koneksi);
}

function cari($keyword) {
    $query = "SELECT * FROM siswa WHERE 
        NISN LIKE '$keyword%' OR
        Nama LIKE '$keyword%' OR
        Alamat LIKE '$keyword%' OR
        Kelamin LIKE '$keyword%' OR
        Agama LIKE '$keyword%' OR
        Asalsekol LIKE '$keyword%' OR
        Telepon LIKE '$keyword%' 
            ";
    return query($query);
}


function signup($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo
        "<script>
        alert('Username sudah terdaftar!');
        </script>";
        return false;
    }


    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo
        "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    } 

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', 'password')");

    return mysqli_affected_rows($conn); 


}


?>
