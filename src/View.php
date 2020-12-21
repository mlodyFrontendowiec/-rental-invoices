<?php

declare(strict_types=1);

namespace App;

class View
{
    public function render(string $page, $data = []):void
    {
        if ($page === "login") {
            require_once("./templates/pages/login.php");
        } else {
            require_once("./templates/layout.php");
        }
    }
}
