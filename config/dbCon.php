<?php

class DatabaseConnection
{
    private const servername = 'sql105.infinityfree.com';
    private const username = 'if0_35374573';
    private const password = 'bUxZ5PZ6co';
    private const database = 'if0_35374573_webnote';
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