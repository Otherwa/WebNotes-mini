<?php
include_once("../../../../config/dbCon.php");
session_start();
// Check if the user is already logged in and has an active session
// Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, so redirect to the login page
    header("Location: ../login.php");
    exit; // Make sure to exit to prevent further script execution
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $For = $_GET['For'];

    $connection = getDatabaseMainConnection();


    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }



    $query = "SELECT * FROM context WHERE Name='$For'";
    $Result = mysqli_query($connection, $query);

    $context_id = Null;
    if (mysqli_num_rows($Result) > 0) {
        $row = $Result->fetch_assoc();
        $context_id = $row["id"];

        $description = mysqli_real_escape_string($connection, $description);
        $insertQuery = "INSERT INTO content (Name,Context_id, Description, Created_at) VALUES ('$name','$context_id', '$description', NOW())";
        echo $insertQuery;
        ;
        $insertResult = mysqli_query($connection, $insertQuery);

        if ($insertResult) {
            header("Location: ../dashboard.php");
        } else {
            echo "Error adding new content: " . mysqli_error($connection);
        }
    } else {
        echo "" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="10" placeholder="Description"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</body>

</html>