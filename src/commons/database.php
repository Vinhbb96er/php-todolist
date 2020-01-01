<?php

class DatabaseManager
{
    private $host;
    private $username;
    private $password;
    private $dbName;
    private $connection = null;

    private static $DM = null;

    private function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->username = constant('DB_USERNAME');
        $this->password = constant('DB_PASSWORD');
        $this->dbName = constant('DB_DATABASE');
    }

    public static function getDM()
    {
        if (!self::$DM) {
            self::$DM = new DatabaseManager();
        }

        return self::$DM;
    }

    public function connect()
    {
        try {
            if (!$this->connection) {
                $url = "mysql:host={$this->host};dbname={$this->dbName}";
                $this->connection = new PDO($url, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->query('SET NAMES utf8');
            }
        } catch (PDOException $e) {
            die ('Error: ' . $e);
        }
    }

    public function close()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function excute($sql, $params = [], $isGet = true)
    {
        $this->connect();
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $isGet ? $stmt->fetchAll() : $stmt->rowCount();
    }
}
