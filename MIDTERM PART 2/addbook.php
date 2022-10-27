<?php
    include_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliophile - Add Book</title>
    <link rel="icon" href="./assets/Logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>

<?php

    if(isset($_POST['save'])){
        $title       = $_POST['title'];
        $description = $_POST['description'];
        $author       = $_POST['author'];
        $category       = $_POST['category'];
        $price       = $_POST['price'];

        $is_book_exist = "SELECT * FROM `books` WHERE book_title = '$title' AND book_author = '$author'";
        $is_book_exist_query = mysqli_query($connect, $is_book_exist);

        if(!mysqli_num_rows($is_book_exist_query) > 0){
            
            $add_book_query = "INSERT INTO `books` (`book_title`,`book_description`,`book_author`,`book_price`) VALUES ('$title','$description','$author', '$price')";
            $execute = mysqli_query($connect, $add_book_query);

            if($execute){
                echo 'Successfully Uploaded';
            } else{
                echo 'Failed to upload';
             }
        } else{
            echo 'This book already exist';
            
        }
    }
?>

<div class="container py-5 shopping-cart">
        <h3 class="cart-heading">Add Book</h3>

        <p class="shipping-txt">Book Details</p>
        <div class="row g-5">
            <div class="col-sm-12 col-md-9">
                <form action="addbook.php" method="POST" autocomplete="off">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="title">Book Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Book Title" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="author">Author<span class="text-danger">*</span></label>
                                <input type="text" name="author" class="form-control" placeholder="Book Author" required>
                            </div>
                        </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="description">Book Description<span class="text-danger">*</span></label>
                                <input type="text" name="description" class="form-control" placeholder="Description." required>
                            </div>
                        </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input type="text" name="price" class="form-control" placeholder="Book Price" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary form-btn">Save Details</button>
                </form>
            </div>


    
</body>
</html>