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

    if (isset($_GET['Id'])) {
        $id = $_GET['Id'];

        $DB = new DatabaseConnection();
        $connection = $DB->getConnection();

        if (!$connection) {
            throw new Exception("Database connection failed: " . mysqli_connect_error());
        }

        $deleteQuery = "DELETE FROM context WHERE Id = $id";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if ($deleteResult) {
            header("Location: ../dashboard.php");
            exit;
        } else {
            throw new Exception("Error deleting record: " . mysqli_error($connection));
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