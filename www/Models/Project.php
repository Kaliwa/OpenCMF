<?php 

namespace App\Models;

use App\Core\Database;


Class Project {

    private int $id;
    private string $image;
    private string $title;
    private string $category;
    private string $createdAt;
    private int $portfolioId;

    public function __construct(int $id, string $image, string $title, string $category, string $createdAt, int $portfolioId) {
        $this->id = $id;
        $this->image = $image;
        $this->title = $title;
        $this->category = $category;
        $this->createdAt = $createdAt;
        $this->portfolioId = $portfolioId;
    }



    public function getId(): int {
        return $this->id;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    public function getPortfolioId(): int {
        return $this->portfolioId;
    }




    public function setId(int $id) {
        $this->id = $id;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setCategory(string $category) {
        $this->category = $category;
    }

    public function setCreatedAt(string $createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setPortfolioId(int $portfolioId) {
        $this->portfolioId = $portfolioId;
    }


    // A faire dans le repository je pense
    public function saveToDatabase() {
        $db = new Database();
        $pdo = $db->getPDO();
    
        $request = 'INSERT INTO projects(id, image, title, category, createdAt, portfolioId) VALUES (:id, :image, :title, :category, :createdAt, :portfolioId)';
        $stmt = $pdo->prepare($request);
    
        $parameters = [
            ':id' => $this->id,           
            ':image' => $this->image,
            ':title' => $this->title,
            ':category' => $this->category,
            ':createdAt' => date("Y-m-d H:i:s"),
            ':portfolioId' => $this->portfolioId 
        ];
    
        if ($stmt->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }
    
}