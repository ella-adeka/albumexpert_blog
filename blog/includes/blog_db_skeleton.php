<?php
    $sql = "SELECT * from blogs";
    $result = mysqli_query($conn, $sql);
    $blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    mysqli_free_result($result);
    mysqli_close($conn);
?>

<!--
     UPDATE blogs 
    SET blog_creator_id = (SELECT blog_creators.creator_id from blog_creators WHERE creator_id = 3)
    WHERE blog_id = 1
 -->