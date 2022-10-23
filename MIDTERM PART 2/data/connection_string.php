<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'bibliophile';

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if($conn->connect_error){
        echo 'Connection failed' . $conn->connect_error();
    }
?>