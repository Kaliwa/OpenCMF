<?php
namespace App\Controllers;

use App\Core\View;

class Portfolio
{
    public function portfolio(): void
    {
        $myView = new View("Main/portfolio", "front");
    }
    public function project():void
    {
        $myView = new View("Main/project", "front");
    }
    public function page():void
    {
        $myView = new View("Main/page", "front");
    }
}