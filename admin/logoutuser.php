<?php 
session_start();
include "./login/login.php";
unset($_SESSION['user']);

header('location:../index.php');
?>