<?php

if( isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}

require "config.php";
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

    <title>Pungut Buku</title>
</head>

<body>
    <nav class="navbar bg-secondary">
        <div class="container-fluid">
            <a href="index.php"><span class="navbar-brand mb-0 h1 text-light">PUBU</span></a>
        </div>
    </nav>
  <div class="d-flex align-items-center mt-5">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center w-50">
        <h1 class="cover-heading">Welcome to Pungut Buku</h1>
        <p>Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <div class="btn-toolbar">
            <a href="login.php" class="btn btn-dark mr-3">Login</a>
            <a href="register.php"class="btn btn-dark">Register</a>
        </div>
    </div>
  </div>
<?php
require "parts/footer.php"
?>