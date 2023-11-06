<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User as UserModel;

class User
{
    public function profile()
    {
        $myView = new View("User/profile", "back");
    }

    public function listUsers()
    {
        $myView = new View("User/listuser", "back");
    }
}