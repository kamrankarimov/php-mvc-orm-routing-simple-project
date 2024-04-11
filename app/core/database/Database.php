<?php

namespace App\Core\Database;

use App\Core\Library\EnvReader;
use PDO;
use PDOException;

class Database
{
    private string $servername;
    private string $username;
    private string $database;
    private string $password;
    private string $charset;
    protected static mixed $conn;

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

    private function connect(): void
    {
        try {
            self::$conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->database, $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->exec("set names ".$this->charset);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function disconnect(): void
    {
        self::$conn = null;
    }

    protected static function getById($table, $columns = "*", $where=null){
        $where  = !is_null($where) ? "WHERE $where" : null;
        $sql    = "SELECT " . $columns . " FROM " . $table . " " . $where;
        $que    = self::$conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

    public static function getAll($table, $columns = "*"){
        $sql    = "SELECT " . $columns . " FROM " . $table;
        $que    = self::$conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

}