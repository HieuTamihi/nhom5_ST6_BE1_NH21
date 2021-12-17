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
    $first_name = $_POST['First_name'];
    $last_name = $_POST['Last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    $user->addUser($first_name, $last_name, $username, $password, $role_id);
    header('location:users.php');
}
