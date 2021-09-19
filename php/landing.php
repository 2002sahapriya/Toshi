<?php
// This for landing page
session_start();
include("../php/connection.php");
include('../php/functions.php');

$user_data = check_login($connect);
?>
