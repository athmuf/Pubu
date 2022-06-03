<?php

// The MySQL service 
// change for configuration
$host = 'localhost';

// Database username
$user = 'root';

//database user password
$pass = '';

// database name
$database = 'pubu';

/* connect to MySQL database */
$conn = mysqli_connect($host, $user, $pass, $database);

// Check connection
if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// function for upload
function upload($data) {
    global $conn;

    $judul_buku = htmlspecialchars($data["judul_buku"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $kontak = htmlspecialchars($data["kontak"]);
    $alamat = htmlspecialchars($data["alamat"]) ;

    //query insert data buku
    $query = "INSERT INTO buku
                 VALUES ('0', '0', '$judul_buku', '$pengarang', '$penerbit', '$kategori', '$deskripsi', '$gambar', '$nama', '$kontak', '$alamat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function for register
function register ($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //check is username available
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah terdaftar')
            </script>";
        return false;
    }

    //check confirmation password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
                </script>";
        return false;
    }

    // password encryption
    $password = password_hash($password, PASSWORD_DEFAULT);

    // add new user ke database
    mysqli_query($conn, "INSERT INTO user(user_id, username, password, nama, no_hp, alamat) VALUES('0', '$username', '$password', NULL, NULL, NULL)");

    return mysqli_affected_rows($conn);
}

// function for search
function cari($keyword) {
    $query = "SELECT * FROM buku
                WHERE
                judul_buku = '$keyword'";
    return query($query);
}


// function for checkout
function checkout($data) {
    global $conn;

    if (isset($_GET['id_buku'])) {
        $id_buku = $_GET['id_buku'];
        $q=mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '{$id_buku}'");
        $result=mysqli_fetch_assoc($q);
        $id_buku = ($result['id_buku']);
    }

    $id_buku = ($result['id_buku']);
    $penerima = htmlspecialchars($data["penerima"]);
    $kontak_penerima = htmlspecialchars($data["kontak_penerima"]);
    $alamat_kirim = htmlspecialchars($data['alamat_kirim']);
    $tgl_kirim = date('Y-m-d H:i:s');

    var_dump($id_buku);
    var_dump($penerima);
    var_dump($id_buku);
    //query insert data checkout
    $query = "INSERT INTO pengiriman
                VALUES ('0', '$id_buku', '$penerima', '$kontak_penerima', '$alamat_kirim', '$tgl_kirim', '','')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}