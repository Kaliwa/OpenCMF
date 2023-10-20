<?php
namespace App\Controllers;

use App\Core\View;

class Project
{
    public function project(): void
    {
        $myView = new View("Project/project", "front");
    }
}