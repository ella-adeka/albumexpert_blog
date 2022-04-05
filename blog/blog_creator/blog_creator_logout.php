<?php

    // if (isset($_SESSION['creator_id'])) {
        // Initialize the session
        session_start();

        // Remove all the session variables;
        // session_unset();
        unset($_SESSION["creator_loggedin"]);

        // Destroy the session
        // session_destroy();

        // Redirect to index page
        
    // }
    header('location: ../index.php');
    exit;
?>