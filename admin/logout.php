<?php 
session_start();
include "login.php";
unset($_SESSION['user']);
header('location:../login/index.php');
?>