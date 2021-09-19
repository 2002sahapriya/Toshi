<?php
session_start();
include("connection.php");
include("functions.php");

// variables
$firstname = NULL;
$lastname = NULL;
$username = NULL;
$password = NULL;
$email = NULL;

// error handling varibles
$firstname_err = NULL;
$lastname_err = NULL;
$username_err = NULL;
$password_err = NULL;
$email_err = NULL;
$server_err = NULL;

if($_SERVER["REQUEST_METHOD"] === "POST") {

     // first name
     if(empty($_POST["firstname"])) {
        $firstname_err = "Please enter your first name";
    } else {
        $firstname = validate_register_data($_POST["firstname"]);
        if(strlen($firstname) > 255) {
            $firstname_err = "First name is too long.";
        }
        if(!preg_match("/^[a-zA-Z]*$/", $firstname)) {
            $firstname_err ="Only letters allowed.";
        } 
    }

     // last name
     if(empty($_POST["lastname"])) {
        $lastname_err = "Please enter your last name";
    } else {
        
        $lastname = validate_register_data($_POST["lastname"]);
        if(strlen($lastname) > 255) {
            $lastname_err = "Last name is too long.";
        }
        if(!preg_match("/^[a-zA-Z]*$/", $lastname)) {
            $lastname_err ="Only letters allowed.";
        }
    }

    
    // username
    if(empty($_POST["username"])) {
        $username_err = "Please enter a username";
    } else {
        $username = validate_register_data($_POST["username"]);
        if(strlen($username) > 255) {
            $email_err = "Email is too long.";
        } 
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $username_err = "Only alphanumeric characters allowed";
        }
    }


    // email
    if(empty($_POST["email"])) {
        $email_err = "Please enter an email";
    } else { 
        $email = validate_register_data($_POST["email"]);
        if(strlen($email) > 255) {
            $email_err = "Email is too long.";
        }             
        //check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_err = "Invalid email. Enter a valid email format.";
        }            
    }

    // password
    if(empty($_POST["password"])) {
        $password_err = "Please enter a password";
    } else {
        if(strpos($_POST["password"],"\\") !== false) {
            $password_err = "Password cannot contain backslashes.";
        }
        $password = validate_register_data($_POST["password"]);
        if(strlen($password) > 20){
            $password_err = "Password is too long.";
        }
    }

    // Adding the data into the database
    if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password) && !empty($email)
        && $firstname_err === NULL && $lastname_err === NULL && $email_err === NULL && $password_err === NULL && $username_err === NULL) {
        $query = "INSERT INTO toshi_infomatics (firstname, lastname, email, username, user_password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
        $result = mysqli_query($connect, $query);
        
        if ($result) {
            echo ("<script>console.log('User added to database')</script>");
            header("Location: login.html");
            die("<script>console.log('Registration completed.')</script>");
        } else {
            $server_err = "Registration failed. Please try again with proper values.";
        }
    }
}


function validate_register_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
