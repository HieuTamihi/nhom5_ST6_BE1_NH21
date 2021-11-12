<?php 
class Product extends Db
{
public function getAllProducts()
{
$sql = self::$connection->prepare("SELECT * FROM products");
$sql->execute();//return an object
$item = array();
$item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $item; //return an array
public function getAllHighLight()
{
$sql = self::$connection->prepare("SELECT * FROM products WHERE `feature` = '1'");
$sql->execute();//return an object
$item = array();
$item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $item; //return an array
}
public function getAllNewProducts()
{
$sql = self::$connection->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 0,10");
$sql->execute();//return an object
$item = array();
$item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $item; //return an array
}
public function getProductById($id)
{
$sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
$sql->bind_param("i",$id);
$item = array();
$item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $item; //return an array
}
public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE `name` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}