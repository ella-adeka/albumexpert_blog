<?php

    include "../includes/database.php";

    if (isset($_GET['blog_id'])) {
        $blog_id = $_GET['blog_id'];
        $sql = "DELETE FROM blogs WHERE blog_id = $blog_id";
        $result = mysqli_query($conn, $sql);
    }

    header ("location: blog_creator.php");
    exit;
?>