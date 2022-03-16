<?php

    // Initialize the session
    session_start();

    // Include database file
    include "../includes/database.php";


    if (isset($_GET['creator_id'])) {
        // set creator_id from url to $creator_id
        $creator_id = $_GET['creator_id'];

        $sql = "SELECT * FROM blog_creators WHERE creator_id = $creator_id";
        $res = mysqli_query($conn, $sql);
        $blog_creator = mysqli_fetch_assoc($res);

        unlink("../assets/images/uploaded_authors/".$blog_creator['profile_photo_thumbnail']."");
        
        unset($_SESSION["creator_loggedin"]);
        // $_SESSION["creator_deleted"] = true;
        $del_blog_related_to_creator = "DELETE FROM blogs WHERE blog_creator_id = $creator_id";
        $result = mysqli_query($conn, $del_blog_related_to_creator);


        $del_creator = "DELETE FROM blog_creators WHERE creator_id = $creator_id";
        $del_result = mysqli_query($conn, $del_creator);

    }

    // include 'blog_admin.php';
    header("location: blog_admin.php");
    exit;
?>