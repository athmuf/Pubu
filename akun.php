<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require "parts/header.php"
?>
<a href="endsession.php">logout</a>



<?php
require "parts/footer.php"
?>

