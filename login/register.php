<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    $getAllUsername =   $user->getAllUsername();
    $temp = 0;
    foreach ($getAllUsername as $value) {
        if ($value['username'] == $username) {
            
            header('location:notification1.php');
         
            $temp += 1;
           
        }
    }
    if ($temp==0) {
        if($user->register($username, $password, $passwordAgain)){
            
        header('location:notification2.php');
        }
        
    }
    /*  $message = "Đăng kí thành công";
        echo "<script type='text/javascript'>alert('$message');</script>"; */
    //   header('location:index.php');
}