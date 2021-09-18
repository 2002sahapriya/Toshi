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
        die("failed to connect!");
        mysqli_close($connect);
    } else {
        echo("Database connected!");
    }
?>