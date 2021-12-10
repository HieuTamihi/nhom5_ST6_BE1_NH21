<?php 
include "login.php";
unset($_SESSION['username']);
header('location:./login/index.php');
?>