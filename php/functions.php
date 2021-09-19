<?php
    function check_login($connection){
        if(isset($_SESSION["userid"])) {
            $id = $_SESSION["userid"];
            $query = "SELECT * FROM toshi_infomatics where id = '$id' limit 1";
            $result = mysqli_query($connection, $query);
            
            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        } else {
        // redirect to login 
        header("Location: ../View/login.html");
        die;

        }

        

    }
?>