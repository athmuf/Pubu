<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "parts/header.php";

$result=mysqli_query($conn, 'SELECT kategori FROM kategori_buku');
$kategori=mysqli_fetch_assoc($result);

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