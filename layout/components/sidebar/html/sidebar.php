<?php

// DB
function getDatabaseSubConnection(){
    $SERVER_URL = 'localhost:3306';
    $USER_AGENT = 'root';
    $PASSWORD = '';
    $DB_NAME = 'WebNote';

    $servername = $SERVER_URL;
    $username = $USER_AGENT;
    $password = $PASSWORD;
    $database = $DB_NAME;

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}


// Use the $DB object to perform database operations
$connection = getDatabaseSubConnection();

function getHTMLTagInfos(){
    global $connection;

    
    $sql = "SELECT * FROM content where context_id = 1";
    $result = $connection->query($sql);
    

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate navigation items using fetched data
            echo '<li class="nav-item"><a class="nav-link text-decoration-underline" href="#' . $row["Name"] . '">' . $row["Name"] . '</a></li>';
        }
    } else {
        echo "No navigation items found.";
    }
}
?>

<div class="offcanvas offcanvas-start font-monospace" tabindex="-1" id="offcanvasNav"
    aria-labelledby="offcanvasNavLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavLabel">HTML Content</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <ul class="navbar-nav">
            <?php getHTMLTagInfos()?>
        </ul>
    </div>
</div>