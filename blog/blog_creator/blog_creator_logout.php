<?php
    // Initialize the session
    session_start();

    // Remove all the session variables;
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to index page
    header('location: ../index.php');
    exit;
?>