<?php
    if(isset($_GET['bid'])){
        $book_id = $_GET['bid'];
        $location = $_GET['loc'];
    
        if(!empty($book_id)){
            if(in_array($book_id, $_SESSION['cart']) === false){
                $_SESSION['cart'][] = array(
                    'book_id' => $book_id,
                    'quantity' => 1
                );
                echo '<script>
                alert("Book added to cart.")
                setInterval(() => {
                    location.href = "../src/'.$location.'.php"
                }, 500);
                </script>';
            } else{
                echo '<script>
                alert("Book already added in the cart.")
                setInterval(() => {
                    location.href = "../src/'.$location.'.php"
                }, 500);
                </script>';
            }
        } else{
            echo '<script>alert("An error occured.")</script>';
        }
    }
?>