<?php
namespace App\Controllers;

use App\Core\View;

class Error
{
    public function page404(): void
    {

        //Penser à modifier le code http
        echo "Page 404";
    }
}