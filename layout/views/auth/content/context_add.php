<?php
include_once("../../../../config/dbCon.php");
session_start();
// Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, so redirect to the login page
    header("Location: ../login.php");
    exit; // Make sure to exit to prevent further script execution
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    $connection = getDatabaseMainConnection();

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $insertQuery = "INSERT INTO context (Name) VALUES ('$name')";

    $insertResult = mysqli_query($connection, $insertQuery);

    if ($insertResult) {
        header("Location: ../dashboard.php");
    } else {
        echo "Error adding new content: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>