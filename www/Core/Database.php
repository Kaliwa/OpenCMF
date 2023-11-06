<?php

namespace App\Core;

use PDO;

class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_port;
    private $dbo;

    public function __construct($db_name = "postgres", $db_user = "postgres", $db_pass = "postgres", $db_host = "bdd", $db_port = "5432")
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
    }

    public function getPDO()
    {
        $pdo = new PDO("pgsql:host=bdd;port=5432;dbname=postgres;user=postgres;password=postgres");
        // Configurer les options de PDO si nécessaire
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }

    public function query($statement)
    {
        $req = $this->getPDO()->query($statement);
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

}