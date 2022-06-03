<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require "parts/header.php";

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $q=mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '{$id_buku}'");
    $result=mysqli_fetch_assoc($q);
}

// check submit is done
if (isset($_POST["checkout"])) {
    $id_buku = ($result['id_buku']);
    // check is data success upload
    if( checkout($_POST) > 0) {
        echo "<script> 
                alert('Berhasil mengcheckout buku!');
                </script>";
    }
    else {
        echo "<script> 
                alert('Gagal mengcheckout buku!');
                </script>";
    }
}

// check if book available?

?>
<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card h-100">
                        <img src="images/<?php echo $result['gambar'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $result['judul_buku'];?></h5>
                            <p class="text-secondary"><?php echo $result['pengarang'];?></p>
                            <p class="card-text"><?php echo $result['deskripsi'];?></p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h4>Checkout Buku "<?php echo $result['judul_buku'];?>"</h4>
                    <p>Isikan informasi diri mu untuk pengiriman buku</p>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="penerima" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Masukkan nama penerima">
                        </div>
                        <div class="mb-3">
                            <label for="kontak_penerima" class="form-label">Kontak</label>
                            <input type="text" class="form-control" name="kontak_penerima" id="kontak_penerima" placeholder="Masukkan nomor handphone penerima">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_kirim" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat_kirim" id="alamat_kirim" placeholder="Masukkan alamat pengiriman">
                        </div>
                        <div class="mt-3 d-grid gap-2 col-3 mx-auto">
                            <button name="checkout" type="submit" class="btn btn-dark">Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br>

<?php
require "parts/footer.php"
?>