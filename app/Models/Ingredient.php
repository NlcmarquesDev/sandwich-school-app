<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Ingredient
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAll()
    {
        return $this->db->query('SELECT * FROM ingredients')->findAll();
    }
    public function getById($id)
    {
        return $this->db->query('SELECT * FROM ingredients WHERE id=:id', [':id' => $id])->find();
    }
}
