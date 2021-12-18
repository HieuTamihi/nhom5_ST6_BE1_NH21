<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/user.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$user = new User;
if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $user_id = $_POST['user_id'];
    $user->changePhoto($image, $user_id);

    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header('location:profile.php');
}
