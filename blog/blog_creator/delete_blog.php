<?php
    // Include database file
    include "../includes/database.php";

    if (isset($_GET['blog_id'])) {
        // set blog_id from url to $blog_id
        $blog_id = $_GET['blog_id'];
        $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);

        // Because blog_content is serialized, the sql statement is needed to 
        // select the specific blog that matches the id
        // the blog_content is unserialized to single out the image.
        $newData = json_decode($row['blog_content'], true);
        // since the image is being saved to the computer as well, it needs to be 
        // deleted spqcially
        unlink("../assets/images/blog_images/".$newData['blogImage']."");

        // The sql statement to delete the blog that matches the blog_id
        $del_sql = "DELETE FROM blogs WHERE blog_id = $blog_id";
        $result = mysqli_query($conn, $del_sql);
    }

    // return to blog_creator page after the condtion is met.
    header ("location: blog_creator.php");
    exit;
?>