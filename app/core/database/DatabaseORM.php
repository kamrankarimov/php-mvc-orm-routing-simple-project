<?php

namespace App\Core\Database;
class DatabaseORM extends DatabaseDriver
{
    public function getById($table, $columns = "*", $where=null){
        $where  = !is_null($where) ? "WHERE $where" : null;
        $sql    = "SELECT $columns FROM $table $where";
        $que    = $this->db->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

    public function getAll($table, $columns = "*",){
        $sql    = "SELECT $columns FROM $table";
        $que    = $this->db->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }
}