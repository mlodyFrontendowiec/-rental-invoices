<?php
declare(strict_types=1);

spl_autoload_register(function (string $classNamespace) {
    $path = str_replace(['\\','App/'], ['/',''], $classNamespace);
    $path = "src/$path.php";

    require_once($path);
});

use App\Controller\Controller;

require_once("src/Utils/debug.php");
require_once("src/Controller/Controller.php");
$data = ["get"=>$_GET,"post"=>$_POST];
(new Controller($data))->showPage();
