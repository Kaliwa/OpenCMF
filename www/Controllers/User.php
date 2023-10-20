<?php

namespace App\Controllers;

use App\Core\View;

class User
{
    public function profile()
    {
        $myView = new View("User/profile", "back");
    }
}