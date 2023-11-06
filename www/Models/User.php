<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private bool $emailConfirmed;
    private string $password;
    private string $avatar;
    private string $registrationDate;
    private int $role;

    public function __construct($email, $password, $role)
    {
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function saveToDatabase()
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $req = 'INSERT INTO users(id, email, password, firstname, lastname, emailconfirmation, avatar, registrationdate, role)
         VALUES (:id, :email, :password, :firstname, :lastname, :emailconfirmation, :avatar, :registrationdate, :role)';
        $stmt = $pdo->prepare($req);

        $params = [
            ':id' => 3,
            ':email' => $this->email,
            ':password' => $this->password,
            ':firstname' => "Pierre",
            ":lastname" => "Gueit-Dessus",
            "emailconfirmation" => True,
            "avatar" => "1",
            "registrationdate" => date("Y-m-d H:i:s"),
            ':role' => $this->role,
        ];

        if ($stmt->execute($params)) {
            return true; // Utilisateur enregistré avec succès
        } else {
            return false; // Erreur lors de l'enregistrement de l'utilisateur
        }
    }



}

?>