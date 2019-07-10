<?php
    session_start();
    require 'dbconnection.php';
    if(!$_SESSION['user_username']){
        header("location:login.php?session=notset");
    }
?>