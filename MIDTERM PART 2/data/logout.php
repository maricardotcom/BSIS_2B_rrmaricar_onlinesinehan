<?php
    session_start();

    if(!isset($_SESSION['uid'])){
        header('location: ../src/login.php');
    } else{
        unset($_SESSION['uid']);
        unset($_SESSION['rid']);
        session_destroy();
        header('location: ../index.php');
    }
?>