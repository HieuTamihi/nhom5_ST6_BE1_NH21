<?php
require "config.php";
require "models/db.php";
require "models/product.php"; 
require "models/manufacture.php"; 
require "models/protype.php";
require "models/sale.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
if(isset($_POST['submit'])){
    if($_FILES["image"]["tmp_name"]!=null)
    {
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    $feature = $_POST['feature'];
    $id = $_POST['id'];
    $product->updateProduct($name, $manu_id, $type_id, $price, $image, $desc, $feature, $id);

    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header('location:products.php');
    }
    else
    {
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $feature = $_POST['feature'];
    $id = $_POST['id'];
    $product->updateProductNotImage($name, $manu_id, $type_id, $price, $desc,  $feature, $id);
    header('location:products.php?status=ec');
    }
}