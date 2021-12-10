<?php 

include "./login/login.php";
unset($_SESSION['username']);

header('location:../index.php');
?>