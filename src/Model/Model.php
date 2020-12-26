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
        dump($POST);
        $name = $POST['name'];
        $surname = $POST['surname'];
        $address = $POST['address'];
        $code = $POST['code'];
        $city=$POST['city'];
        $res = mysqli_query($this->mysqli, "INSERT INTO clients(name,surname,address,code,city) VALUES('$name','$surname','$address','$code','$city')");
        header("location: /?action=userPanel");
    }
    public function getClients():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM clients");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
    public function getClient(array $GET):array
    {
        $id = $GET['id'];
        $res = mysqli_query($this->mysqli, "SELECT * FROM clients WHERE id=$id");
        $row = mysqli_fetch_assoc($res);
        return $row ?? [];
    }
    public function deleteUser(array $GET)
    {
        $id = $GET['id'];
        mysqli_query($this->mysqli, "DELETE FROM clients WHERE id=$id");
        header("location: /?action=allClients");
    }
    public function editClient($POST, $GET)
    {
        $id = $GET['id'];
        $name = $POST['name'];
        $surname = $POST['surname'];
        $address = $POST['address'];
        $code = $POST['code'];
        $city=$POST['city'];
        $res = mysqli_query($this->mysqli, "UPDATE clients SET name='$name',surname='$surname',address='$address',code='$code',city='$city' WHERE id=$id");
        header("location: /?action=allClients");
    }
    public function createPdf(array $row):void
    {
        $name = $row['name'];
        require_once "C:/rachunek - php/vendor/autoload.php" ;
        $stylesheet = file_get_contents("C:/rachunek - php/style/css/pdf.css");
        $html = "<h1 class='pdf'>$name</h1>";
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output("$name.pdf", "D");
    }
}
