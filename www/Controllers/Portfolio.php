<?php
namespace App\Controllers;

use App\Core\View;

class Portfolio
{
    public function portfolio(): void
    {
        $myView = new View("Portfolio/portfolio", "front");
    }
    public function page(): void
    {
        $myView = new View("Portfolio/page", "front");
    }
}