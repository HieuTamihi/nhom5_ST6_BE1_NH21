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
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    $feature = $_POST['feature'];
    $product->addProduct($name, $manu_id, $type_id, $price, $image, $desc,  $feature);

}