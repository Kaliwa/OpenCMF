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
    public function refering(): void
    {
        $myView = new View("Main/refering", "front");
    }
}