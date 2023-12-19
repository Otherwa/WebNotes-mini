<?php

// !gets from header/user.php 
require_once("../../config/dbCon.php");



//? GET QUERY STRING GUARD


$ContentID = $_GET["id"];
$title = $_GET["title"];


function getHTMLTagInfos()
{
    global $ContentID;

    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $sql = "SELECT * FROM content where context_id = $ContentID";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate navigation items using fetched data
            echo '<li class="nav-item"><a class="nav-link text-decoration-underline" href="#' . $row["Name"] . '">' . $row["Name"] . '</a></li>';
        }
    } else {
        echo "No navigation items found.";
    }

    $DB->closeConnection();
}

function getContentData()
{
    ;
    global $ContentID;

    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $sql = "SELECT * FROM content where context_id = $ContentID";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // ? Generate navigation items using fetched data
            echo '<li class="nav-item"><span class="nav-link" id="' . $row["Name"] . '"><span class="display-6 text-decoration-underline">' . $row["Name"] . '</span><br><br><div class="p-3 m-3 rounded-2 bg-dark"><code><pre style="font-size:$id.05rem">' . (htmlspecialchars($row["Description"])) . '</pre></code></div></li>';

        }
    } else {
        echo "No items found.";
    }

    $DB->closeConnection();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://0therwa.web.app/imgs/favicon.ico">
    <title>WebNotes-
        <?php echo $title; ?>
    </title>
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
<div class="body" style="height:auto">
    <!-- Header Section -->
    <div class="d-flex flex-column">
        <div class="col-12">
            <?php include_once('../components/header/user/header.php'); ?>
        </div>
        <!-- sidebar -->
        <div class="offcanvas offcanvas-start font-monospace" tabindex="-1" id="offcanvasNav"
            aria-labelledby="offcanvasNavLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavLabel">HTML Content</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-4">
                <ul class="navbar-nav">
                    <?php getHTMLTagInfos() ?>
                </ul>
            </div>
        </div>
        <!-- sidebar -->
        <!-- Body Content Section -->
        <div class="container p-lg-4 mt-5">
            <ol type="1">
                <?php getContentData() ?>
            </ol>
        </div>
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