<?php
class Manufacture extends Db
{
    public function getAllManu()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllManufacturesDESC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `manufactures` ORDER BY `manu_id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function addManufacture($manu_name)
    {

        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`) VALUES(?)");
        $sql->bind_param("s", $manu_name);
        return $sql->execute(); //return an object
    }
    public function deleteManufacture($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `manu_id`=?");
        $sql->bind_param("i", $manu_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($item) == 0) {
            $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id`=?");
            $sql->bind_param("i", $manu_id);
            header('location:manufactures.php');
            return $sql->execute(); //return an object
           
        }
        else{
            header('location:manufactures.php');
        }
        /*  $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id`=?");
        $sql->bind_param("i", $manu_id);
        return $sql->execute(); */
    }
    /* public function deleteManufacture1($manu_id)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM `products` WHERE `manu_id`=?");
        $sql->bind_param("i", $manu_id);
        var_dump($sql);
        if (count($sql)==0) {
            $sql1 = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id`=?");
            $sql1->bind_param("i", $manu_id);           
            return $sql1->execute();

        }
        else{
            header('location:products.php');
        }
        } */
}
