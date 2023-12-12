<?php

class DatabaseConnection
{
    private const servername = 'localhost';
    private const username = 'root';
    private const password = '';
    private const database = 'webnote';
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new mysqli(self::servername, self::username, self::password, self::database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}


?>
<!DOCTYPE html>