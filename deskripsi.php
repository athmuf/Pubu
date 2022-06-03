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


?>

<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <img src="images/<?php echo $result['gambar'];?>" class="rounded mx-auto d-block w-25 mt-3 mb-3" alt="...">
        <header class="w3-container w3-padding-32 w3-center" id="home">
        <h1 class="w3-padding-16 w3-text-black"><span class="w3-hide-small"></span><?php echo $result['judul_buku'];?></h1>
        <p><?php echo $result['pengarang'];?></p>
        </header>
        <!-- About Section -->
        <div class="w3-content w3-justify w3-text-grey w3-padding-16" id="about">
            <h2 class="w3-text-black">Deskripsi</h2>
            <hr style="width:200px" class="w3-opacity">
            <p><?php echo $result['deskripsi'];?></p>
            <h3 class="w3-padding-16 w3-text-black">Informasi Lain</h3>

            <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
                <div class="w3-third w3-section">
                    <span class="w3-large"><?php echo $result['pengarang'];?></span><br>
                    Penulis
                </div>
                <div class="w3-third w3-section">
                    <span class="w3-large"><?php echo $result['penerbit'];?></span><br>
                    Penerbit
                </div>
                <div class="w3-third w3-section">
                    <span class="w3-large"><?php echo $result['kategori'];?></span><br>
                    Kategori
                </div>    
            </div>

            <!-- Testimonials -->
            <h3 class="w3-padding-24 w3-text-black">Informasi Pemilik</h3>  
            <p><span class="w3-large w3-margin-right"><?php echo $result['nama'];?></span></p>
            <p><?php echo $result['kontak'];?></p>
            <p><?php echo $result['alamat'];?></p><br>

        <div class="btn-toolbar align-items-center justify-content-center mb-5">
            <a href="https://wa.me/<?php echo $result['kontak'];?>" class="btn btn-dark mr-3">Hubungi</a>
            <a href="checkout.php?id_buku=<?php echo $result['id_buku'];?>"class="btn btn-dark">Checkout</a>
        </div>
    </div>
</div>


<br><br><br>

<?php
require "parts/footer.php"
?>