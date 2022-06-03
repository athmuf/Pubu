<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "parts/header.php";

if (isset($_GET['kategori'])) {
    $kategori = $_GET['kategori'];  
    $result=mysqli_query($conn, "SELECT * FROM buku WHERE kategori = '{$kategori}'");
    $cari=mysqli_fetch_assoc($result);
}


?>
<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <h1 class="cover-heading text-center mb-5"><?php echo $kategori;?></h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while($cari=mysqli_fetch_assoc($result)) : ?>
            <div class="col">  
                <div class="card h-100">
                    <img src="images/<?php echo $cari['gambar'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $cari['judul_buku'];?></h5>
                        <p class="text-secondary"><?php echo $cari['pengarang'];?></p>
                        <p class="card-text"><?php echo $cari['deskripsi'];?></p>
                        <a href="deskripsi.php?id_buku=<?php echo $cari['id_buku'];?>" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <?php  endwhile; ?>
        </div>
    </div>
</div>

<br><br><br><br><br>
<?php
require "parts/footer.php"
?>