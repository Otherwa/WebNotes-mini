<?php
// require_once("../../../../config/dbCon.php");
// ! Gets from Dashboard.php
// Use the $DB object to perform database operations

function getContextInfo()
{
    $DB = new DatabaseConnection();
    $connection = $DB->getConnection();


    $sql = "SELECT * FROM context";
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

<div class="offcanvas offcanvas-start font-monospace" style="z-index: 4999 !important;" tabindex="-1" id="offcanvasNav"
    aria-labelledby="offcanvasNavLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavLabel">Angular Content</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4" >
        <ul class="navbar-nav">
            <?php getContextInfo() ?>
        </ul>
    </div>
</div>