<?php

namespace App\Models;

class Page
{
    private int $id;
    private string $image;
    private string $category;
    private string $created_at;
    private int $project_id;

    public function __construct(int $id, string $image, string $category, string $created_at, int $project_id)
    {
        $this->id = $id;
        $this->image = $image;
        $this->category = $category;
        $this->created_at = $created_at;
        $this->project_id = $project_id;
    }
}


?>