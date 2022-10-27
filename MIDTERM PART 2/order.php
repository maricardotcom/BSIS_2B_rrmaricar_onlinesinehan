<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliophile</title>
    <link rel="icon" href="./assets/Logo.svg">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="top-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-between mb-2">
                <a class="navbar-brand wsm" href="index.php"><img src="./assets/Logo.svg" class="nav-logo" alt="logo"> Bibliography</a>
                <div class="search-wrapper d-flex align-items-center">
                    <div class="select-filter">
                        <select name="filter" class="filter-select">
                            <option value="">All Categories</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Romance">Romance</option>
                            <option value="Romance">Adventure</option>
                            <option value="Romance">Mystery</option>
                            <option value="Romance">Poetry</option>
                            <option value="Romance">Fanfiction</option>
                            <option value="Romance">Horror</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Search..." class="search-input">
                    <span class="search-btn material-symbols-outlined">Search</span>
                </div>
                <div class="login-signup wsm d-flex align-items-center justify-content-end">
                <a href="./signup.php" class="signup-btn">Logout</a>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <div class="link-wrapper d-flex align-items-center justify-content-between w-100">
                    <ul class="navbar-nav wsm">
                        <li class="nav-item">
                            <a class="nav-link" href="./new-arrivals.php">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./collection.php">Collection</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./category.php">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./orders.php">Orders</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav wsm justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link material-symbols-outlined" href="./wishlist.php">favorite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link material-symbols-outlined" href="./shopping-cart.php">shopping_bag</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="order-section">
    <?php
    include_once('connection.php');

        $get_books = "SELECT * FROM `books` ORDER BY book_id DESC";
        $get_books_query = mysqli_query($connect, $get_books);


        if(mysqli_num_rows($get_books_query) > 0){
            echo '<div class = "box-flex">';
            while($display = mysqli_fetch_assoc($get_books_query)){
                echo '<div class="box">
                        <img src="./cover/'.$display['book_id'].'.jpg" alt="">
                        <p>'.$display['book_title'].'</p>
                        <p>'.$display['book_description'].'</p>
                        <p class ="book-price">Php '.$display['book_price'].'.00</p>
                        <a href="ordered_items.php?bid='.$display['book_id'].'">Order</a>
                    </div>';
            }
            echo '</div>';
        } else{

            echo 'No records';
            
        }
?>
</div>

    <script src="./bootstrap/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>