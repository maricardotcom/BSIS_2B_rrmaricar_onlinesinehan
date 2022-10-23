<?php 
    include('../data/config.php');
    include('../partials/_imports.php');
    $title = 'Books';
    include('../partials/_navigation.php');

    $book_id = $_GET['bid'];
    $get_book_data = "SELECT * FROM `books` WHERE book_id='{$book_id}' LIMIT 1";
    $get_book_data_query = mysqli_query($conn, $get_book_data);
    $book_data = mysqli_fetch_assoc($get_book_data_query);
?>
    <div class="container">
        <div class="book-details mx-auto">
            <div class="row g-5">
                <div class="col-sm-12 col-md-6 text-center">
                    <img src="<?php echo UPLOADS ?>books/<?php echo $book_data['book_id'] ?>.jpg" alt="book cover" class="w-75">
                </div>
                <div class="col-sm-12 col-md-6">
                    <h1 class="fw-700"><?php echo $book_data['title'] ?></h1>
                    <p class="fs-12 fw-500 txt-gray mb-4"><?php echo $book_data['author'] ?></p>
                    <p class="fs-12 fw-600">Description</p>
                    <p class="fs-9 fw-400 book-description"><?php echo $book_data['description'] ?></p>
                    <p class="book-price-lg">₱<?php echo $book_data['price'] ?>.00</p>
                    <?php if(isset($_SESSION['uid'])){ ?>
                        <a href="#" class="btn btn-primary add-to-cart-lg">Add to Cart</a>
                    <?php } else{ ?>
                        <a href="<?php echo URL ?>src/login.php" class="btn btn-primary add-to-cart-lg">Add to Cart</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php include('../partials/_footer.php') ?>