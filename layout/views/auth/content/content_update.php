<?php
include_once("../../../../config/dbCon.php");
session_start();

// Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, so redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Check if the 'Id' parameter is set in the URL
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];

    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

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
    $DB->closeConnection();
} else {
    header("Location: ../dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $updateQuery = "UPDATE content SET Name = ?, Description = ?, Updated_at = NOW() WHERE Id = ?";
    $stmt = mysqli_prepare($connection, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $name, $description, $id);
        $updateResult = mysqli_stmt_execute($stmt);

        if ($updateResult) {
            header("Location: ../dashboard.php");
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }

    // Close the database connection
    $DB->closeConnection();
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
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                    <br>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Description</label>
                    <br>
                    <br>
                    <textarea class="form-control" name="description" rows="10"
                        placeholder="Description"><?php echo $description; ?>"</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</body>

</html>