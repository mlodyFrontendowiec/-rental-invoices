<?php

declare(strict_types=1);


namespace App\Model;

use stdClass;

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
    
    public function addClient(array $POST):void
    {
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
    public function getServices():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM services");
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
    public function getService(array $GET):array
    {
        $id = $GET['id'];
        $res = mysqli_query($this->mysqli, "SELECT * FROM services WHERE id=$id");
        $row = mysqli_fetch_assoc($res);
        return $row ?? [];
    }
    public function deleteUser(array $GET)
    {
        $id = $GET['id'];
        mysqli_query($this->mysqli, "DELETE FROM clients WHERE id=$id");
        header("location: /?action=allClients");
    }
    public function deleteService(array $GET)
    {
        $id = $GET['id'];
        mysqli_query($this->mysqli, "DELETE FROM services WHERE id=$id");
        header("location: /?action=allServices");
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
    public function editService(array $POST, array $GET)
    {
        $id = $GET['id'];
        $name = $POST['name'];
        $sign = $POST['sign'];
        $price = $POST['price'];
        $unit = $POST['unit'];
        $res = mysqli_query($this->mysqli, "UPDATE services SET name='$name',sign='$sign',price='$price',unit='$unit' WHERE id=$id");
        header("location: /?action=allServices");
    }
    public function createService(array $POST)
    {
        $sign = $POST['sign'];
        $name = $POST['name'];
        $unit = $POST['unit'];
        $price = $POST['price'];
        
        $res = mysqli_query($this->mysqli, "INSERT INTO services(sign,name,unit,price) VALUES('$sign','$name','$unit','$price')");
        header("location: /?action=allServices");
    }
    public function createBill(array $POST):void
    {
        $clientId = $POST['recipient'];
        $serviceId =$POST['service'];
        mysqli_query($this->mysqli, "INSERT INTO bills(clientId,serviceId) VALUES('$clientId','$serviceId')");
        header("location: /");
    }
    public function getBills():array
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM bills");
        $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
        return $rows ?? [];
    }
    public function getBillsData($rows)
    {
        $data = [];
        
        foreach ($rows as $row) {
            array_push($data, ["clientId"=>$row['clientId'],"serviceId"=>$row["serviceId"]]);
        }
        
        return $data;
    }
    public function getBillsAndUsers($data)
    {
        $bills = [];
        foreach ($data as $row) {
            $clientId = $row['clientId'];
            $serviceId = $row['serviceId'];
            $client = $this->getClientById($clientId);
            $service =  $this->getServiceById($serviceId);
            array_push($bills, [$client,$service]);
        }
        return $bills;
    }
    public function getClientById($id)
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM clients WHERE id = $id");
        $row = mysqli_fetch_assoc($res);
        return $row;
    }
    public function getServiceById($id)
    {
        $res = mysqli_query($this->mysqli, "SELECT * FROM services WHERE id = $id");
        $row = mysqli_fetch_assoc($res);
        return $row;
    }
    
    public function createPdf(array $GET):void
    {
        $clientId = $GET["user"];
        $serviceId = $GET["service"];


        $client = $this->getClientById($clientId);
        $service = $this->getServiceById($serviceId);
        dump($client);
        dump($service);
        
        $id = $client['id'];
        $name = $client['name'];
        $surname = $client['surname'];
        $address = $client['address'];
        $code = $client['code'];
        $city = $client['city'];

        $idServie = $service['id'];
        $serviceName = $service['name'];
        $unit = $service['unit'];
        $price = $service['price'];
        $today =  date("d/y");
        dump("$id/".$today);

        


        require_once  './vendor/autoload.php';
        $stylesheet = file_get_contents("C:/rachunek - php/style/css/pdf.css");
        $html = "<p>Rachunek nr $id/$today<p>";
        $mpdf = new \Mpdf\Mpdf([[
            'autoMarginPadding' => 0
        ]]);
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();
        // "$name.pdf", "D"
    }
}
