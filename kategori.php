<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "parts/header.php";

$result=mysqli_query($conn, 'SELECT kategori FROM kategori');
$kategori=mysqli_fetch_assoc($result);
$query2=mysqli_query($conn, 'SELECT kategori FROM buku');
$hasil=mysqli_fetch_assoc($query2);


?>
<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <h1 class="cover-heading text-center mb-5">Cari buku berdasarkan kategori</h1>
        <ul class="list-group">
        <?php while($kategori=mysqli_fetch_assoc($result)) : ?>            
            <li class="list-group-item d-flex justify-content-between align-items-center"
                href ="akun.php">
                <p class="text-center mt-3 mb-3"><a href="list.php?kategori=<?php echo $kategori['kategori'];?>" class="text-decoration-none link-secondary"><?php echo $kategori['kategori'];?></a></p>
                <!-- <span class="badge bg-dark rounded-pill">14</span> !-->
            </li>
            <?php  endwhile; ?>
        </ul>
    </div>
</div>
<br><br><br>

<?php
require "parts/footer.php"
?>