<?php

namespace App\Core\Database;

use App\Core\Library\EnvReader;
use PDO;

class Database
{
    private $servername;
    private $username;
    private $database;
    private $password;
    private $charset;
    protected static $conn;

    public function __construct()
    {
        $this->servername = EnvReader::get("DB_HOST");
        $this->username   = EnvReader::get("DB_USER");
        $this->password   = EnvReader::get("DB_PASS");
        $this->database   = EnvReader::get("DB_NAME");
        $this->charset    = EnvReader::get("DB_CHAR");

        $this->connect();
    }

    public function __destruct() {
        $this->disconnect();
    }

    private function connect(){
        try {
            self::$conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->database, $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->exec("set names ".$this->charset);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return self::$conn;
    }

    public function disconnect() {
        self::$conn = null;
    }

    protected function getById($table, $columns = "*", $where=null){
        $where  = !is_null($where) ? "WHERE $where" : null;
        $sql    = "SELECT $columns FROM $table $where";
        $que    = $this->conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

    public static function getAll($table, $columns = "*",){
        $sql    = "SELECT $columns FROM $table";
        $que    = self::$conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

}