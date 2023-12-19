<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to a different page (e.g., login page) after logout
    header("Location: ./login.php");
} 
?>