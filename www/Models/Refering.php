<?php 

namespace App\Models;

use App\Core\Database;

Class Refering {

    private int $id;
    private string $title;
    private string $image;
    private string $job;


    public function __construct(int $id, string $title, string $image, string $job) {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->job = $job;
    }

       
    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getJob(): string {
        return $this->job;
    }




    public function setId(int $id) {
        $this->id = $id;
    }

    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    public function setJob(string $job) {
        $this->job = $job;
    }


    

    public function saveToDatabase() {
        $db = new Database();
        $pdo = $db->getPDO();

        $request = 'INSERT INTO projects(id, image, title, job) VALUES (:id, :image, :title, :job)';
        $stmt = $pdo->prepare($request);

        $parameters = [
            ':id' => $this->id,
            ':image' => $this->image,
            ':title' => $this->title,
            ':job' => $this->job
        ];

        if ($stmt->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }
}

?>