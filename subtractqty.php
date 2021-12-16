<?php 
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
   if($_SESSION['cart'][$id]>1){
         $_SESSION['cart'][$id]--;
   }
      
    header('location:cart.php');
}