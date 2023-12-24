<?php
include_once("../../../config/dbCon.php");
session_start();

// * Database configuration
// ? Check if the user is already logged in and has an active session
if (!isset($_SESSION['user_id'])) {
    // ? User is not logged in, so redirect to the login page
    header("Location: ./login.php");
    exit;
}

function generateTableRows($tableId)
{
    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $empQuery = "SELECT * FROM content where Context_id=$tableId";
    $empRecords = mysqli_query($connection, $empQuery);
    $tableRows = ''; // Initialize an empty variable to store the HTML table rows

    while ($row = mysqli_fetch_assoc($empRecords)) {
        // Create HTML table rows
        $tableRows .= "<tr>";
        $tableRows .= "<td>" . $row["Id"] . "</td>";
        $tableRows .= "<td>" . $row['Name'] . "</td>";
        $tableRows .= "<td class='w-50'>" . (htmlspecialchars($row["Description"])) . "</td>";
        $tableRows .= "<td>" . $row['Context_id'] . "</td>";
        $timestamp = strtotime($row['Created_at']);
        $new_date_format = date('l, F j, Y', $timestamp);
        $tableRows .= "<td>" . $new_date_format . "</td>";
        $timestamp = strtotime($row['Updated_at']);
        $new_date_format = date('l, F j, Y', $timestamp);
        $tableRows .= "<td>" . $new_date_format . "</td>";
        $id = $row["Id"];
        $tableRows .= "<td class='w-25'>" . "<a class='btn btn-outline-warning' href='./content/content_update.php?Id=$id'>Update</a>&nbsp;&nbsp;" . "<a class='btn btn-outline-danger' href='./content/content_delete.php?Id=$id'>Delete</a>" . "</td>";
        $tableRows .= "</tr>";
    }

    echo $tableRows;

    $DB->closeConnection();
}


function generateHTMLTable($tableName, $tableId, $tableClass)
{
    echo '<div class="container-fluid">';
    echo "<span id='$tableName'></span>";
    echo '<br>';
    echo '<div class="container p-4 mt-5">';
    echo "<a class='btn btn-outline-primary' href='./content/content_add.php?For=$tableName'>$tableName Content-Add</a>";
    echo '<div class="card mt-5">';
    echo "<div class='card-header'>$tableName</div>";
    echo '<div class="card-body">';
    echo '<div class="table-responsive">';
    echo "<table id='$tableName-Table' class='table $tableClass'>";
    echo '<thead class="p-4">';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Name</th>';
    echo '<th>Description</th>';
    echo '<th>Context_id</th>';
    echo '<th>Created_at</th>';
    echo '<th>Updated_at</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    // Call the function to generate table rows here
    generateTableRows($tableId);
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

function get_contexts()
{
    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $empQuery = "SELECT * FROM context";
    $Rec = mysqli_query($connection, $empQuery);
    while ($row = mysqli_fetch_assoc($Rec)) {
        $tablename = $row['Name'];
        $tableId = $row['id'];

        generateHTMLTable($tablename, $tableId, 'table table-container table-striped hover mt-5');
    }

    $DB->closeConnection();
}

function getContext()
{
    global $id;

    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $sql = "SELECT * FROM context";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate navigation items using fetched data
            $id = $row["id"];
            $name = $row["Name"];
            echo '<li class="nav-item">';
            echo '<p>' . ucwords($name) . '&nbsp;<a class="text-danger" href="./content/context_delete.php?Id=' . $id . '">Delete</a></p>';
            echo '</li>';
        }
    } else {
        echo "No navigation items found.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://0therwa.web.app/imgs/favicon.ico">
    <title>WebNotes-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>

<body>

    <div class="body">
        <!-- Header Section -->
        <div class="d-flex flex-column">
            <div class="col-12">
                <?php include_once('../../components/header/admin/header.php'); ?>
            </div>

            <!-- Body Content Section -->
            <!-- Your page content goes here -->
            <?php include_once('../../components/sidebar/admin/sidebar.php'); ?>

            <!-- new Context -->
            <div class="container mt-5 p-3">
                <!-- Button trigger modal -->
                <div class="container mt-5 d-flex flex-row-reverse">
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#myModal">
                        New Context 📝
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">Context 🔨</h5>
                            </div>
                            <div class="modal-body">
                                <!--form -->
                                <div class="container d-flex flex-column gap-2 h-100">
                                    <form method="post" action="./content/context_add.php">
                                        <div class="form-group">
                                            <label for="name" class="mb-3">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name">
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                    <!--form -->
                                    <div class="container p-4">
                                        <ul type="square" class="overflow-y-scroll h-100">
                                            <?php getContext() ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tables -->
            <?php // Call the function to generate the HTML table
            get_contexts()
                ?>


            <!-- Footer Section -->
        </div>
    </div>
</body>

<!-- Datatable-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Datatable JS -->

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
</script>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
<!-- Scroll Reveal -->
<script type="text/javascript" src="https://unpkg.com/scrollreveal"></script>
<script type="text/javascript" src="../../../public/js/dashboard.js"></script>

</html>