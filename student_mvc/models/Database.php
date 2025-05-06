<?php
class Database {
    private $connection;

    public function __construct() {
        $configFile = __DIR__ . '/../config/database.php';
        
        if (!file_exists($configFile)) {
            die("Config file not found: $configFile");
        }

        $config = require $configFile;
        
        if (!is_array($config)) {
            die("Invalid database configuration");
        }

        try {
            $this->connection = new mysqli(
                $config['host'],
                $config['username'],
                $config['password'],
                $config['database']
            );

            if ($this->connection->connect_error) {
                throw new Exception("Connection failed: " . $this->connection->connect_error);
            }
        } catch (Exception $e) {
            die("Database error: " . $e->getMessage());
        }
    }


    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function escape($value) {
        return $this->connection->real_escape_string($value);
    }
}
?>