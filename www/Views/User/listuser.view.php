<?php

namespace App\Views\User;

use App\Models\User;
use App\Core\Database;

echo '<h2>List users</h2>';


$user = new User("pierregueitdessus@gmail.com", "password", 1);
$user->saveToDatabase();
?>