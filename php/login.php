<?php
    session_start();
    include("connection.php");

    // define variables for validation
    $username = ""; $username_err="";
    $email =""; $email_err="";
    $password =""; $password_err="";

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["username"])) {
            $username_err = "Please enter a username";
        } else {
            $username = validate_data($_POST["username"]);
        }
    }

    function validate_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>

