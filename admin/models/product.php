<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
FROM `products`,`manufactures`,`protypes`
WHERE `products`.`manu_id` = `manufactures`.`manu_id`
AND `products`.`type_id` = `protypes`.`type_id`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }

    public function addProduct($name, $manu, $type_id, $price, $image, $desc, $feature)
    {

        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`) VALUES(?,?,?,?,?,?,?)");
        $sql->bind_param("siiissi", $name, $manu, $type_id, $price, $image, $desc, $feature);
        
        return $sql->execute(); //return an array

    }
}
