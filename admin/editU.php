<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/sale.php";
require "models/user.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
$user = new User;
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $image = $_FILES['image']['name'];
    $getPasswordByID =  $user->getPasswordByID($user_id);
    foreach ($getPasswordByID as $values) {
        if ($values['password'] == $password) {
            $user->updateUserNoChangePassword($user_id, $username, $role_id);
            header('location:users.php?status=ef');
        } else {
            $user->updateUser($first_name, $last_name, $phone, $username, $password, $role_id, $image, $user_id);
            header('location:users.php?status=ec');
        }
    }
}
