<?php
include_once("../../../../config/dbCon.php");
session_start();

try {
    // ? Check if the user is already logged in and has an active session
    if (!isset($_SESSION['user_id'])) {
        // ? User is not logged in, so redirect to the login page
        header("Location: ../login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];

        $DB = new DatabaseConnection();
        $connection = $DB->getConnection();

        if (!$connection) {
            throw new Exception("Database connection failed: " . mysqli_connect_error());
        }

        $insertQuery = "INSERT INTO context (Name) VALUES ('$name')";

        $insertResult = mysqli_query($connection, $insertQuery);

        if ($insertResult) {
            header("Location: ../dashboard.php");
            exit;
        } else {
            throw new Exception("Error adding new content: " . mysqli_error($connection));
        }
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage();
} finally {
    if (isset($DB)) {
        $DB->closeConnection();
    }
}
?>