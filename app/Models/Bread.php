<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Bread
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAll()
    {

        return $this->db->query('SELECT * FROM bread_types')->findAll();
    }
    public function getById($id)
    {
        return $this->db->query('SELECT * FROM bread_types WHERE id=:id', [':id' => $id])->find();
    }
}
