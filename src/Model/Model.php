<?php

declare(strict_types=1);

namespace App\Model;

class Model
{
    public function __construct()
    {
        $this->mysqli = mysqli_connect("localhost", "user_rachunek", "tPqj5iofaALXQKrC", "rachunek");
    }
    public function validateLogin(array $POST)
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
}
