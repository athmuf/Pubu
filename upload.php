<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "parts/header.php";
// check submit is done
if (isset($_POST["upload"])) {
    // check is data success upload
    if( upload($_POST) > 0) {
        echo "<script> 
                alert('Berhasil mengupload buku!');
                </script>";
    }
    else {
        echo "<script> 
                alert('Gagal mengupload buku!');
                </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/styleRegister.css">
    <title>Register | PUBU</title>
</head>
<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <h1 class="cover-heading text-center">Upload Buku</h1>
        <form action="" method="post">
                <!-- Infromasi Buku -->
                <h4 class="mt-5 cover-heading">Informasi Buku</h1>
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Masukkan judul buku">
                </div>
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan nama pengarang">
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan nama penerbit">
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="kategori" name="kategori" id="kategori">
                        <option selected>Pilih kategori buku</option>
                        <option value="Realigi">Realigi</option>
                        <option value="Bisnis">Bisnis & Investasi</option>
                        <option value="Sains">Sains</option>
                        <option value="Komik">Komik</option>
                        <option value="Novel">Novel</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="text" class="form-control" name="gambar" id="gambar" placeholder="Masukkan gambar">
                </div>
                <!-- End of Infromasi Buku -->

                <!-- Infromasi Pemilik -->
                <h4 class="mt-5 cover-heading">Informasi Pemilik</h1>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Masukkan nomor handphone">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat">
                </div>
                <!-- End of Infromasi Pemilik -->
                
                <div class="mt-3 d-grid gap-2 col-3 mx-auto">
                    <button name="upload" type="submit" class="btn btn-dark">Upload</button>
                </div>
                <br><br><br><br>
        </form>
    </div>
</div>
<?php
require "parts/footer.php"
?>