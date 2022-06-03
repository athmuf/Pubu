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