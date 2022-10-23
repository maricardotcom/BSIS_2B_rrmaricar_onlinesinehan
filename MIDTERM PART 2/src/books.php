<?php 
    include('../data/config.php');
    include('../data/add_to_cart.php');
    include('../partials/_imports.php');
    $title = 'Books';
    include('../partials/_navigation.php');
?>
    <div class="container vh-100">
        <h3 class="heading-text">Bibliophile Books</h3>
        <div class="row pb-5 g-5">
            <?php
                $get_all_books = "SELECT * FROM `books` ORDER BY id DESC";
                $get_all_books_query = mysqli_query($conn, $get_all_books);
                if(mysqli_num_rows($get_all_books_query) > 0){
                    while($book_data = mysqli_fetch_assoc($get_all_books_query)){
            ?>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="./add-to-wishlist.php?bid=<?php echo $book_data['book_id'] ?>" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo UPLOADS ?>books/<?php echo $book_data['book_id'] ?>.jpg" alt="book image">
                    <div class="book-overlay">
                    <?php if(isset($_SESSION['uid'])){ ?>
                        <a href="books.php?bid=<?php echo $book_data['book_id'] ?>&loc=books">Get this book</a>
                    <?php } else{ ?>
                        <a href="<?php echo URL ?>src/login.php">Get this book</a>
                    <?php } ?>
                    </div>
                </div>
                <a href="./view-book.php?bid=<?php echo $book_data['book_id'] ?>" class="view-book-link"><?php echo $book_data['title'] ?></a>
                <p class="book-price">₱<?php echo $book_data['price'] ?>.00</p>
            </div>
            <?php   }
                } else{
            ?>
            <?php   
                } 
            ?>
            
            <!-- <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="../assets/62723739bb391754b16b4f3a_wattpad-3.png" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">Hopeless</a>
                <p class="book-price">₱500.00</p>
            </div> -->
        </div>
    </div>

<?php include('../partials/_footer.php') ?>