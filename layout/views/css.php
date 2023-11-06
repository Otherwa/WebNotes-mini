<?php

require_once("../../config/dbCon.php");


$connection = getDatabaseMainConnection();

function getCSSInfo(){
    global $connection;

    // SQL query to fetch navigation items from a table (replace 'your_table' with your actual table name)
    $sql = "SELECT * FROM content where context_id = 2";
    $result = $connection->query($sql);
    
    // Check if there are results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate navigation items using fetched data
            echo '<li class="nav-item"><span class="nav-link" id="' . $row["Name"] . '">' ."<span class='display-6 text-decoration-underline'>" .$row["Name"] ."</span><br><div class='p-4 font-monospace'>" .$row["Description"] . '</div></li>';
        }
    } else {
        echo "No items found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebNotes-HTML</title>
    <link rel="stylesheet" href="../../public/css/style.css">

    <!-- ! custom -->
    <style>
    ol {
        padding: 2rem;
    }

    ol li {
        padding: 10px;
    }
    </style>
</head>

<body></body>
<div class="body" style="height:200vh">
    <!-- Header Section -->
    <div class="d-flex flex-column">
        <div class="col-12">
            <?php include_once('../components/header.php'); ?>
        </div>

        <!-- Body Content Section -->
        <div class="container p-4 mt-5">
            <ol type="1">
                <?php getCSSInfo() ?>
            </ol>
        </div>
        <!-- Your page content goes here -->
        <?php include_once('../components/sidebar/css/sidebar.php'); ?>
        <!-- Footer Section -->

        <!-- <?php include_once('./layout/components/footer.php'); ?> -->
    </div>
</div>
</body>
<!-- Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<!-- Scroll Reveal -->
<script type="text/javascript" src="https://unpkg.com/scrollreveal"></script>
<script type="text/javascript" src="./public/js/index.js"></script>

</html>