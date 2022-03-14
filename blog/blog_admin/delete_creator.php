<?php

    // Initialize the session
    session_start();

    include "../includes/database.php";

    if (isset($_GET['creator_id'])) {
        $creator_id = $_GET['creator_id'];
        
        // Remove all the session variables;
        session_unset();

        // Destroy the session
        session_destroy();
        $del_blog_related_to_creator = "DELETE FROM blogs WHERE blog_creator_id = $creator_id";
        $result = mysqli_query($conn, $del_blog_related_to_creator);
        $del_creator = "DELETE FROM blog_creators WHERE creator_id = $creator_id";
        $del_result = mysqli_query($conn, $del_creator);
    }

    // include 'blog_admin.php';
    header("location: blog_admin.php");
    exit;
?>