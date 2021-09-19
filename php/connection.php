<?php
// connection credent ials
    $dbhost = "localhost";
    $dbuser ="root";
    $dbpassword ="";
    $dbname ="toshi";
    
    // create connection
    $connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    // check connection
    if (!$connect) {
        die('<script>console.log("failed to connect!")</script>;');
    } else {
        echo ('<script>console.log("Database connected.");</script>');
    }
?>