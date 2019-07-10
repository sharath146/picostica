<?php
    session_start();
    require 'dbconnection.php';
    $user_username = mysqli_real_escape_string($con,$_REQUEST['username']);
    if(!$_SESSION['user_username']){
        header("location:$user_username");
    }
?>