<?php
    session_start();
    define('URL', 'http://localhost/Bibliophile/');
    define('UPLOADS', 'http://localhost/Bibliophile/uploads/');
    include('connection_string.php');
    if(isset($_SESSION['uid'])) $user_id = $_SESSION['uid'];
?>