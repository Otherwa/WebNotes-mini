<?php

function getDatabaseMainConnection(){
    $SERVER_URL = 'localhost:3306';
    $USER_AGENT = 'root';
    $PASSWORD = '';
    $DB_NAME = 'WebNote';

    $servername = $SERVER_URL;
    $username = $USER_AGENT;
    $password = $PASSWORD;
    $database = $DB_NAME;

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}

?>

<!DOCTYPE html>