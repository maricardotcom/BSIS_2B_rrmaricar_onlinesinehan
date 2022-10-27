<?php

    include_once('connection.php');
    $bookid = $_GET['bid'];
    $userid = 1;

    $order_book = "INSERT INTO `ordered_items` (book_id, user_id, date) VALUES ('$bookid', '$userid', current_timestamp)";
    $order_book_query = mysqli_query($connect, $order_book);
     
     $orderInfo = "SELECT * FROM `order` LEFT JOIN `users` ON order.user_id = users.id WHERE order.user_id = '1'"
     
?>