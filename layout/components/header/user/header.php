<?php


function getDatabaseMainConnection()
{
    $SERVER_URL = 'localhost';
    $USER_AGENT = 'root';
    $PASSWORD = '';
    $DB_NAME = 'webnote';

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


$connection = getDatabaseMainConnection();

function getContext()
{
    global $connection;
    global $id;

    $sql = "SELECT * FROM context";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Generate navigation items using fetched data
            $id = $row["id"];
            $name = $row["Name"];
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="/layout/views/content.php?id=' . $id . '&title=' . $name . '">' . ucwords($name) . '</a>';
            echo '</li>';
        }
    } else {
        echo "No navigation items found.";
    }
}

?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-4 gap-2 font-monospace fixed-top">
        <!-- Offcanvas button -->
        <button class="btn btn-default offcanvas-toggle-button" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNav" aria-controls="offcanvasNav">
            <span>📝</span>
        </button>
        <a class="navbar-brand" href="/index.php">WebNote</a>
        <!-- Nav button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php getContext() ?>
            </ul>
        </div>
    </nav>
</header>