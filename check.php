<?php
session_start();
if(isset($_SESSION['user'])){

	header('location:checkout.php');
}else{

    header('location:login/index.php');
}