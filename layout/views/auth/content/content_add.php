<?php
include_once("../../../../config/dbCon.php");
include_once('../../../../config/cusexceptions.php');

use CustomException\ContentsException as ContentExp;

session_start();

// ? Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // ? User is not logged in, so redirect to the login page
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $For = $_GET['For'];



    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    try {

        // Check if $name and $description are empty
        if (empty($name) || empty($description)) {
            throw new ContentExp("Error adding new content");
        }

        $query = "SELECT * FROM context WHERE Name='$For'";
        $Result = mysqli_query($connection, $query);

        $context_id = null;
        if (mysqli_num_rows($Result) > 0) {
            $row = $Result->fetch_assoc();
            $context_id = $row["id"];

            $description = mysqli_real_escape_string($connection, $description);

            $insertQuery = "INSERT INTO content (Name, Context_id, Description, Created_at) VALUES ('$name','$context_id', '$description', NOW())";

            if (!mysqli_query($connection, $insertQuery)) {
                throw new ContentExp("Error adding new content");
            }

            header("Location: ../dashboard.php");
        } else {
            throw new ContentExp("Context not found: " . mysqli_error($connection));
        }
    } catch (ContentExp $e) {
        $msg = $e->getmsg();
        echo '<script type ="text/JavaScript">';
        echo "alert('" . "$msg" . "');";
        echo "setTimeout(()=>{window.history.back()}, 1000);";
        echo "</script>";
    } finally {
        $DB->closeConnection();
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://0therwa.web.app/imgs/favicon.ico">
    <title>WebNotes-Add-Content</title>
    <link rel="stylesheet" href="../../../../public/css/style.css">
</head>

<body>
    <div class="d-flex flex-column">
        <div class="mb-5">
            <?php include_once('../../../components/header/admin_crud/header.php'); ?>
        </div>
        <div class="container mt-5 p-4">
            <h1>Add Content for
                <?php echo $_GET['For']; ?>
            </h1>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                    <br>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Description</label>
                    <br>
                    <br>
                    <textarea class="form-control" name="description" rows="10" placeholder="Description"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</body>

</html>