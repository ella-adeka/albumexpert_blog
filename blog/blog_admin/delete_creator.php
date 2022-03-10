<?php
    include "../includes/database.php";

    // $creator_query = "SELECT * from blog_creators";
    // $result = mysqli_query($conn, $creator_query);
    // $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_GET['creator_id'])) {
        $creator_id = $_GET['creator_id'];
        $del_creator = "DELETE FROM blog_creators WHERE creator_id = $creator_id";
        $del_result = mysqli_query($conn, $del_creator);
    }

    // include 'blog_admin.php';
    header("location: blog_admin.php");
    exit;
?>