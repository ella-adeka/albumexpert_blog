<?php 

    // $dbHost = "localhost";
    // $dbUser = "AE_blog_alltablesSelInsUpdDel";
    // $dbPass = "Emmanuella@123";
    // $dbName = "albumexpert_blog";

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "albumexpert_blog";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("database connection failed");
    }
    else{
        echo 'database connection successful';
    }
?>