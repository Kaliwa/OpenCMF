<?php
namespace App\Controllers;

use App\Core\View;

class Page
{
    public function page():void
    {
        $myView = new View("Page/page", "front");
    }
}