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

    if (isset($_GET['Id'])) {
        $id = $_GET['Id'];

        $DB = new DatabaseConnection();
        $connection = $DB->getConnection();


        $deleteQuery = "DELETE FROM context WHERE Id = $id";
        $deleteResult = mysqli_query($connection, $deleteQuery);

        if ($deleteResult) {
            header("Location: ../dashboard.php");
            exit;
        } else {
            throw new ContentExp("Error deleting record");
        }
    }
} catch (ContentExp $e) {
    echo "Exception: " . $e->getmsg();
} finally {
    if (isset($DB)) {
        $DB->closeConnection();
    }
}
?>