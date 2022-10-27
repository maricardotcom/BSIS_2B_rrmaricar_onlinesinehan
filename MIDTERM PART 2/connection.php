<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bibliophile_db';

$connect = mysqli_connect($host, $username, $password, $dbname);

if($connect->connect_error){
    echo 'Connection failed' . $connect->connect_error();
}
?>