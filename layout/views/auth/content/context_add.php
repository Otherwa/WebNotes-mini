<?php
include_once("../../../../config/dbCon.php");
include_once('../../../../config/cusexceptions.php');

use CustomException\ContentsException as ContentExp;

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

        // ? Check if $name is empty
        if (empty($name)) {
            throw new ContentExp("Error adding new content");
        }

        if (!$connection) {
            throw new ContentExp("Database connection failed");
        }

        $insertQuery = "INSERT INTO context (Name) VALUES ('$name')";

        $insertResult = mysqli_query($connection, $insertQuery);

        if ($insertResult) {
            header("Location: ../dashboard.php");
            exit;
        } else {
            throw new ContentExp("Error adding new content");
        }
    }
} catch (ContentExp $e) {
    $msg = $e->getmsg();
    echo '<script type ="text/JavaScript">';
    echo "alert('" . "$msg" . "');";
    echo "setTimeout(()=>{window.history.back()}, 1000);";
    echo "</script>";
} finally {
    if (isset($DB)) {
        $DB->closeConnection();
    }
}
?>