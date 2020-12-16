<?php

namespace App\Model;

class Model
{
    public function __construct()
    {
        $this->mysqli = mysqli_connect("localhost", "admin_blog", "1joGSzxV7OfXUcdQ", "blog");
    }
    public function validateLogin(array $POST)
    {
        session_start();
        $password = $POST["password"];
        $login = $POST["login"];
        $res = mysqli_query($this->mysqli, "SELECT * FROM admins WHERE login = '$login'");
       
        $row = mysqli_fetch_assoc($res);
        if (!$row["password"]) {
            setcookie("login", "false");
            header("Location: /?action=failLogin");
        }

        if (password_verify($password, $row["password"])) {
            $_SESSION['user'] = $login;
            $_SESSION['acces'] = 1;
            setcookie("login", "true");
            header("Location: /?action=userPanel");
        } else {
            setcookie("login", "false");
            header("Location: /?action=failLogin");
        }
    }
}
