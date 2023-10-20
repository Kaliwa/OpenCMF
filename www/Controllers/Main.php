<?php
namespace App\Controllers;

use App\Core\View;

class Main
{
    public function home(): void
    {
        $myView = new View("Main/home", "front");
    }

    public function contact(): void
    {
        $myView = new View("Main/contact", "front");
    }
    public function aboutus(): void
    {
        $myView = new View("Main/aboutus", "front");
    }
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