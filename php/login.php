<?php
    session_start();
    include("connection.php");

    // define variables for validation
    $username = ""; $username_err = null;
    $email =""; $email_err = null;
    $password =""; $password_err = null;
    $server_err= NULL;

    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username validation
        if(empty($_POST["username"])) {
            $username_err = "Please enter a username";
            //echo "<script> alert('Please enter a username');</script>";
        } else {
            $username = validate_data($_POST["username"]);
            if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                $username_err = "Only alphanumeric characters allowed";
            }
        }
        // email validation 
        if(empty($_POST["email"])) {
            $email_err = "Please enter an email";
        } else { 
            $email = validate_data($_POST["email"]);             
            //check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $email_err = "Invalid email. Enter a valid email format.";
            }            
        }

        // password validation 
        if(empty($_POST["password"])) {
            $password_err = "Please enter a password";
        } else {
            $password = validate_data($_POST["password"]);
        }

        // checking if email, password, and username is in database
        if(!empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["username"])) {
            $username = validate_data($_POST["username"]);
            $email = validate_data($_POST["email"]);
            $password = validate_data($_POST["password"]);
            $query = "SELECT * FROM toshi_infomatics WHERE email='$email' AND user_password='$password' limit 1";
            $result = mysqli_query($connect, $query);
            $server_err = NULL;

            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['user_password'] === $password && $user_data['email'] === $email && $user_data['username'] === $username) {
                    echo("<script>console.log('Login access granted')</script>");
                    $_SESSION["userid"] = $user_data["id"];
                    header("Location: dashboard.html");
                    
                } else {
                    $server_err="Wrong password or email";
                }
            } else {
                $server_err="Invalid Login attempt.";
            }
        } 
    }

    function validate_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    

?>

