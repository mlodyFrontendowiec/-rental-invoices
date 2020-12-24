<?php

declare(strict_types=1);

namespace App\Model;

class Model
{
    public function __construct()
    {
        $this->mysqli = mysqli_connect("localhost", "user_rachunek", "tPqj5iofaALXQKrC", "rachunek");
    }
    public function validateLogin(array $POST):void
    {
        session_start();
        $password = $POST["password"];
        $login = $POST["login"];
        $res = mysqli_query($this->mysqli, "SELECT * FROM users WHERE login = '$login'");
       
        $row = mysqli_fetch_assoc($res);
        if (!$row["password"]) {
            header("Location: /?action=failLogin");
        }

        if (password_verify($password, $row["password"])) {
            $_SESSION['user'] = $login;
            $_SESSION['acces'] = 1;
            header("Location: /?action=userPanel");
        } else {
            header("Location: /?action=failLogin");
        }
    }
    public function logoutUser():void
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: /");
    }
    public function addUser(array $POST):void
    {
        $name = $POST['name'];
        $flat = $POST['flat'];
        $price = $POST['price'];
        $res = mysqli_query($this->mysqli, "INSERT INTO clients(name,flat,price) VALUES ('$name','$flat','$price')");
        header("Location: /?action=userPanel");
    }
    public function getClients():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM clients");
        $rows = mysqli_fetch_all($res);
        return $rows;
    }
    public function detailsClient(array $GET)
    {
        $id = $GET['id'];
        $res = mysqli_query($this->mysqli, "SELECT * FROM clients  WHERE id = '$id' ");
        $row = mysqli_fetch_assoc($res);
        return $row;
    }
}
