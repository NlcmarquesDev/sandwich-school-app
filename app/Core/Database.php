<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use DBconfig;
use PDOStatement;

require_once BASE_PATH . "DBconfig.php";

class Database
{


    private $stmt;

    public function connection()
    {

        $dsn = 'mysql:host=' . DBconfig::$DBhost . ';dbname=' . DBconfig::$DBname . ';charset=utf8';

        return new PDO($dsn, Dbconfig::$DBuser, DBconfig::$DBpass);
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->connection()->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function findAll()
    {
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find()
    {
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function lastInsertId($table)
    {
        $lastId = $this->query('SELECT MAX(id) AS last_id FROM ' . $table)->find();
        ['last_id' => $last_Id] = $lastId;
        return $last_Id;
    }
}
