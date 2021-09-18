<?php
    session_start();
    include("connection.php");

    // define variables for validation
    $username = ""; $username_err="";
    $email =""; $email_err="";
    $password =""; $password_err="";

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username validation
        if(empty($_POST["username"])) {
            $username_err = "Please enter a username";
        } else {
            $username = validate_data($_POST["username"]);
        }
        // email validation 
        if(empty($_POST["email"])) {
            $email_err = "Please enter an email";
        } else {
            $email = validate_data($_POST["email"]);
        }

        // password validation 
        if(empty($_POST["password"])) {
            $password_err = "Please enter a password";
        } else {
            $password = validate_data($_POST["password"]);
        }

        echo $username;
        echo $password;
        echo $email;


    }

    function validate_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    

?>

