<?php
class Sale extends Db
{
    public function getAllSales()
    {
        $sql = self::$connection->prepare("SELECT * 
FROM `sales`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
}