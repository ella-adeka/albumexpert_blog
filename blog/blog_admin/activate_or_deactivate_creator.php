<?php
    include '../includes/database.php';

    $creator_query = "SELECT * from blog_creators";
    $result = mysqli_query($conn, $creator_query);
    $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($blog_creators as $blog_creator) {
        if (isset($_GET['creator_id'])) {
            $creator_id = $_GET['creator_id'];

            if ($blog_creator['creator_id'] == $creator_id) {
                if ( $blog_creator['active_or_inactive'] == 0) {
                    $sql = "UPDATE blog_creators SET active_or_inactive = 1 WHERE creator_id = $creator_id";
                } elseif ( $blog_creator['active_or_inactive'] == 1){
                    $sql = "UPDATE blog_creators SET active_or_inactive = 0 WHERE creator_id = $creator_id";
                } else{
                    echo "No";
                }
                $results = mysqli_query($conn, $sql); 
            } 
        }
    }

    // Redirect back to blog admin when done.
    header ("location: blog_admin.php");
    exit;

?>