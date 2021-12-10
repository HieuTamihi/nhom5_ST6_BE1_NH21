<?php
class User extends Db
{
    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getRoleId($username)
    {
        $sql = self::$connection->prepare("SELECT `role_id` FROM `users` WHERE `username` =?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function register($username, $password, $passwordAgain)
    {
        if ($password == $passwordAgain) {
            $sql = self::$connection->prepare("INSERT INTO `users`( `username`, `password`, `role_id`) VALUES (?,?,2)");
            $password = md5($password);
            $sql->bind_param("ss", $username, $password);
            $sql->execute();
            return true;
        }
    }

    public function getAllUsername()
    {
        $sql = self::$connection->prepare("SELECT `username` FROM `users`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
