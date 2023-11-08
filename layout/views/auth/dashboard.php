<?php 
include_once("../../../config/dbCon.php");

## Database configuration


function generateTableRows($tableId) {
    $connection = getDatabaseMainConnection();
    
    $empQuery = "SELECT * FROM content where Context_id=$tableId";
    $empRecords = mysqli_query($connection, $empQuery);
    $tableRows = ''; // Initialize an empty variable to store the HTML table rows

    while ($row = mysqli_fetch_assoc($empRecords)) {
        // Create HTML table rows
        $tableRows .= "<tr>";
        $tableRows .= "<td>" . $row["Id"] . "</td>";
        $tableRows .= "<td>" . $row['Name'] . "</td>";
        $tableRows .= "<td class='w-75'>" . (htmlspecialchars($row["Description"])). "</td>";
        $tableRows .= "<td>" . $row['Context_id'] . "</td>";
        $timestamp = strtotime($row['Created_at']);
        $new_date_format = date('l, F j, Y', $timestamp);
        $tableRows .= "<td>" . $new_date_format . "</td>";
        $timestamp = strtotime($row['Updated_at']);
        $new_date_format = date('l, F j, Y', $timestamp);
        $tableRows .= "<td>" . $new_date_format . "</td>";
        $id = $row["Id"];
        $tableRows .= "<td class='w-25'>" . "<a class='btn btn-outline-warning' href='./content/content_update.php?Id=$id'>Update</a>&nbsp;&nbsp;"."<a class='btn btn-outline-danger' href='./content/content_delete.php?Id=$id'>Delete</a>" ."</td>";
        $tableRows .= "</tr>";
    }

    echo $tableRows;
}

function generateHTMLTable($tableName,$tableId, $tableClass) {
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


function get_contexts(){
    $connection = getDatabaseMainConnection();
    $empQuery = "SELECT * FROM context";
    $Rec = mysqli_query($connection, $empQuery);
    while ($row = mysqli_fetch_assoc($Rec)) {
        $tablename = $row['Name'];
        $tableId = $row['id'];
        
        generateHTMLTable($tablename,$tableId, 'table table-container table-striped hover mt-5');
    }
}
?>


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebNotes-Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>

<body></body>
<div class="body">
    <!-- Header Section -->
    <div class="d-flex flex-column">
        <div class="col-12">
            <?php include_once('../../components/header/admin/header.php'); ?>
        </div>

        <!-- Body Content Section -->
        <!-- Your page content goes here -->
        <?php include_once('../../components/sidebar/admin/sidebar.php'); ?>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<!-- Scroll Reveal -->
<script type="text/javascript" src="https://unpkg.com/scrollreveal"></script>
<script type="text/javascript" src="../../../public/js/dashboard.js"></script>

</html>