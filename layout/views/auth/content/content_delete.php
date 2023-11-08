<?php
include_once("../../../../config/dbCon.php");
session_start();
// Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, so redirect to the login page
    header("Location: ../login.php");
    exit; // Make sure to exit to prevent further script execution
}

if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $connection = getDatabaseMainConnection();

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM content WHERE Id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $deleteQuery = "DELETE FROM content WHERE Id = $id";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if ($deleteResult) {
            header("Location: ../dashboard.php");
        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }
    } else {
        echo "Record not found!";
    }
    mysqli_close($connection);
} else {
    header("Location: ../dashboard.php");
}
?>
<!DOCTYPE html>