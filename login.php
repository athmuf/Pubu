<?php
session_start();

if( isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}

require 'config.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");

    //check username
    if( mysqli_num_rows($result) === 1 ) {
        //check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;
            header("Location: home.php");
            exit;
        }
    }

    $error = true;
}
?>

<!-- Header -->
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
    <link rel="stylesheet" href="style/styleLogin.css">
    <title>Login | PUBU</title>
</head>

<body>
    <div class="navigasi">
    <nav class="navbar bg-secandary">
        <div class="container-fluid">
            <a href="index.php"><span class="navbar-brand mb-0 h1 text-secandary">PUBU</span></a>
        </div>
    </nav>
    </div>
<!-- Header -->

<!-- Form Login -->
<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <h1 class="cover-heading text-center">Login to PUBU</h1>
        <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                </div>

                <?php if(isset ($error)) : ?>
                    <p class="fst-italic text-danger">Username atau password salah</p>
                <?php endif; ?>

                <div class="mt-3 d-grid gap-2 col-3 mx-auto">
                    <button name="login" type="submit" class="btn btn-dark">Login</button>
                </div>
        </form>
        <div>
            <p class="text-center mt-3 ">Belum punya akun?<a href="register.php" class="text-decoration-none">Buat akun</a></p>
        </div>
    </div>
</div>
<!-- Form Login -->

<?php
require "parts/footer.php";
?> 