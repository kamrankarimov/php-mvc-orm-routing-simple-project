<?php

namespace App\Core\Database;

use PDO;

class DatabaseDriver
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=charity', 'root', '');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}