<?php
// this connects to th database in local machine
// Add your phpmyAdmin credentials here to connect to your database
    $servername = "localhost";
    $username ="root";
    $password ="";

    // create connection 
    $connect = mysqli_connect($servername, $username, $password);
    // check connection
    if (!$connect) {
        die("Database Connection Failed." . $connect);
        mysqli_close($connect);
    } else {
        echo("Database connected!");
    }

     // Create Database
     $dbsql="CREATE DATABASE IF NOT EXISTS toshi";
     if($connect->query($dbsql) === TRUE) {
          echo "Database created successfully.";
     } else {
         echo "Error creating database: " . $connect->error;
         mysqli_close($connect);
     }
     // selecting database
     if($connect->select_db("toshi")) {
         echo "Database Toshi selected.";
     } else {
         echo "Database cannot be selected.";
     }
     // Create SQL Table
     $loginsql="CREATE TABLE IF NOT EXISTS toshi_infomatics (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(255) NOT NULL,
      lastname VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL UNIQUE,
      username VARCHAR(255) NOT NULL, 
      user_password VARCHAR(20) NOT NULL UNIQUE)";
    
    if($connect->query($loginsql) === TRUE) {
        echo "Table created successfully.";
    } else {
        echo "Error creating table: " . $connect->error;
    }


    
?>
