<?php 

    $dbHost = "localHost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "albumexpert_blog";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Database connection failed");
    }
?>