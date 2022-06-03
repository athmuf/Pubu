<?php
require "config.php";

if( isset($_POST["register"])) {
    if( register($_POST) > 0) {
        echo "<script> 
                alert('user baru berhasil ditambahkan!');
                </script>";
        header("Location: home.php");
        exit;
    }
    else {
        echo mysqli_error($conn);
    }
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
    <link rel="stylesheet" href="style/styleRegister.css">
    <title>Register | PUBU</title>
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

<!-- Form Register -->
<div class="d-flex align-items-center mt-5">
    <div class="container align-items-center justify-content-center w-75">
        <h1 class="cover-heading text-center">Create Your Account</h1>
        <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi password">
                </div>
                <div class="mt-3 d-grid gap-2 col-3 mx-auto">
                    <button name="register" type="submit" class="btn btn-dark">Register</button>
                </div>
        </form>
        <div>
            <p class="text-center mt-3 mb-3">Sudah punya akun? <a href="login.php" class="text-decoration-none">Login</a></p>
        </div>
    </div>
</div>
<!-- Form Register -->

<?php
require "parts/footer.php";
?> 