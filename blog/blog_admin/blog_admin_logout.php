<?php
    // // Initialize the session
    // session_start();

    // // Remove all the session variables;
    // session_unset();

    // // Destroy the session
    // session_destroy();

    // // Redirect to index page
    // header('location: ../index.php');
    // exit;

    // if (isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] == true) {
        // Initialize the session
        session_start();

        // Remove all the session variables;
        // session_unset();
        // unset($_SESSION['creator_id']);
        unset($_SESSION["admin_loggedin"]);

        // Destroy the session
        // session_destroy();

        // Redirect to index page
        
    // }
    header('location: ../index.php');
    exit;
?>