<?php 

namespace App\Models;

use App\Core\Database;

class Portfolio {

    private int $id;
    private string $name;
    private string $category;
    private string $createdAt;
    private int $userId;


    public function __construct(int $id, string $name, string $category, string $createdAt, int $userId) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->createdAt = $createdAt;
        $this->userId = $userId;
    }



    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    public function getUserId(): int {
        return $this->userId;
    }


    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setCategory(string $category) {
        $this->category = $category;
    }

    public function setCreatedAt(string $createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUserId(int $userId) {
        $this->userId = $userId;
    }





    public function saveToDatabase() {
        $db = new Database();
        $pdo = $db->getPDO();

        $request = 'INSERT INTO portfolios(id, name, category, createdAt, userId) VALUES (:id, :name, :category, :createdAt, :userId)';
        $stmt = $pdo->prepare($request);

        // Je sais pas si le prof va faire comme ça
        $parameters = [
            ':id' => 1,
            ':name' => $this->name,
            'category' => $this->category,
            'createdAt' => date("Y-m-d H:i:s"),
            'userId' => $this->userId
        ];

        // Je sais pas si le prof va faire comme ça
        if ($stmt->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }
}
?>