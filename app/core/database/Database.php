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
    public static mixed $conn;
    private static string $table;
    private static string $columns;
    private static string $where;
    private static string $modelName;

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

    /**
     * @param string|null $where
     * @return $this
     */
    public function Where(string $where = null): self
    {
        self::$where = trim($where);
        return $this;
    }

    /**
     * @param string $table
     * @return $this
     */
    public function From(string $table): self
    {
        self::$table = trim($table);
        return $this;
    }

    /**
     * @param string $columns
     * @return $this
     */
    public function Columns(string $columns = "*"): self
    {
        self::$columns = trim($columns);
        return $this;
    }

    private static function parseClassName($className): mixed
    {
        $parse = (str_contains($className, 'Models') || str_contains($className, 'Controller')) ? $className : null;
        $parse = explode('\\', $className);
        $parse = strtolower(end($parse));
        $parse = str_replace('models', '', $parse);
        $parse = str_replace('controller', '', $parse);
        return $parse;
    }

    /**
     * @return array
     */
    public static function getById(): array{
        $backtrace      = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $parseClass     = self::parseClassName($backtrace[1]['class']);
        $table          = !isset(self::$table) ? $parseClass : self::$table;
        self::$where    = !is_null(self::$where) ? "WHERE id = ".self::$where : null;

        $sql    = "SELECT " . self::$columns . " FROM " . $table . " " . self::$where;
        $que    = self::$conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }


    /**
     * @return array
     */
    public static function Find(): array{
        $backtrace      = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $parseClass     = self::parseClassName($backtrace[1]['class']);
        $table          = !isset(self::$table) ? $parseClass : self::$table;
        self::$where    = !is_null(self::$where) ? "WHERE ".self::$where : null;

        $sql    = "SELECT " . self::$columns . " FROM " . $table . "`" .self::$where. "`";
        $que    = self::$conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

    /**
     * @return array
     */
    public static function getAll(): array{
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $parseClass = self::parseClassName($backtrace[1]['class']);
        $table      = !isset(self::$table) ? $parseClass : self::$table;
        $columns    = !isset(self::$columns) ? "*" : self::$columns;
        $sql        = "SELECT " . $columns . " FROM " . $table;
        $que        = self::$conn->prepare($sql);
        $que->execute();
        return $que->fetchAll();
    }

}