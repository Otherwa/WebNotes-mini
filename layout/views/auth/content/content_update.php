<?php
include_once("../../../../config/dbCon.php");
session_start();
// Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, so redirect to the login page
    header("Location: ../login.php");
    exit; // Make sure to exit to prevent further script execution
}
// Check if the 'Id' parameter is set in the URL
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $connection = getDatabaseMainConnection();

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    
    $query = "SELECT * FROM content WHERE Id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['Name'];
        $description = $row['Description'];
    } else {
        echo "Record not found!";
        exit;
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    header("Location: ../dashboard.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $name = $_POST['name'];
    $description = $_POST['description'];


    $connection = getDatabaseMainConnection();

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Update the record with the new data
    $updateQuery = "UPDATE content SET Name = '$name', Description = '$description', Updated_at = NOW() WHERE Id = $id";

    echo $updateQuery;
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        header("Location: ../dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebNotes-Update-Content</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../../../public/css/style.css">
</head>

<body></body>
<div class="d-flex flex-column">
    <div class="mb-5">
        <?php include_once('../../../components/header/admin_crud/header.php'); ?>
    </div>
    <div class="container mt-5 p-4">
        <h1>Update Content</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Name">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="10"
                    placeholder="Description"><?php echo $description; ?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</body>

</html>