<?php

declare(strict_types=1);

namespace App;

class View
{
    public function render(string $page, $data =[]):void
    {
        require_once("./templates/layout.php");
    }
}
