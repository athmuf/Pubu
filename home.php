<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}


require "parts/header.php";


$result=mysqli_query($conn, "SELECT * FROM buku ORDER BY id_buku DESC");

// when search button on 
if( isset($_POST["cari"])) {
    $result = cari($_POST["keyword"]);
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

<div class="d-flex align-items-center mt-5 mb-3">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center w-50">
        <h2 class="w3-wide w3-center">BOOKS LIST</h2>
        <p class="w3-opacity w3-center"><i>Segera checkout bukumu!</i></p><br>
    </div>
</div>

<form action="" method="post">
<div class="d-flex align-items-center mb-5">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center w-75">
            <div class="input-group">
                <input type="text"  name="keyword" class="form-control rounded" placeholder="Ketikkan judul buku atau pengarang..." />
                <button type="submit" name="cari" class="btn btn-outline-primary">Search</button>
            </div>
    </div>
</div>
</form>
<div class="d-flex align-items-center mt-3">
    <div class="container align-items-center justify-content-center w-75">
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