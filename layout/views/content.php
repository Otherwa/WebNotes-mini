<?php

// !gets from header/user.php 
require_once("../../config/dbCon.php");



//? GET @id & @title Fix
if (!isset($_GET["id"]) && !isset($_GET["title"])) {
    header('Location: ../../index.php');
}

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

// ? Download Content
function generateTextContent($tableId)
{
    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();

    $empQuery = "SELECT * FROM content where Context_id=$tableId";
    $empRecords = mysqli_query($connection, $empQuery);

    $textContent = '';

    while ($row = mysqli_fetch_assoc($empRecords)) {
        $textContent .= "\n";
        $textContent .= "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n";
        $textContent .= "Name: " . $row['Name'] . "\n";
        $textContent .= "---------------------------------------------------------------------------\n";
        $textContent .= "Description: " . $row["Description"] . "\n";
        $textContent .= "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n";
    }

    $DB->closeConnection();

    return $textContent;
}

if (isset($_GET['download']) && $_GET['download'] == 'text') {
    $tableId = htmlspecialchars($_GET['tableId'], ENT_QUOTES, 'UTF-8');
    // ? File Save as a Backup
    $PATH = "../../files/table_data.txt";

    $myfile = fopen($PATH, "w");
    fwrite($myfile, generateTextContent($tableId));
    fclose($myfile);

    // ? Send a req raw http
    header('Content-Type: text/plain; charset=UTF-8', $response_code = 200);
    header('Content-Disposition: attachment; filename="' . urlencode('table_data.txt') . '"', $response_code = 200);
    readfile($PATH);
    exit();
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
            <div class="pt-4 mt-4" style="display:flex;flex-direction:row;justify-content:flex-end;">
                <span><a class="btn btn-outline-primary display-6 nav-item"
                        href="<?php echo $_SERVER['REQUEST_URI'] . '&download=text' . '&tableId=' . $ContentID; ?>">Download</a></span>
            </div>
            <ol type="1">
                <?php getContentData() ?>
            </ol>
        </div>
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