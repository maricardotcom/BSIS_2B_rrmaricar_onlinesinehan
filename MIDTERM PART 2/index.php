<?php 
    include('./data/config.php');
    include('./partials/_imports.php');
    $title = 'Home';
    include('./partials/_navigation.php');
?>
    <section class="hero-section">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo URL ?>assets/pexels-nubia-navarro-(nubikini)-1517355.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?php echo URL ?>assets/pexels-ready-made-3847646.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="<?php echo URL ?>assets/pexels-leah-kelley-373465.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        <div class="overlay">
            <h1 class="text-uppercase">There are things that only<br> books can fulfill.</h1>
            <p>This is a online community for readers and writers. Discover latest and most popular releases of books. Read, Write and stay relax.</p>
            <a href="./src/books.php">Shop Now</a>
        </div>
    </section>
    <div class="container my-5">
        <div class="row align-items-center book-service-row">
            <div class="col-sm-12 col-md-6 col-lg-3 book-service">
                <div class="d-flex">
                    <div>
                        <p>The best book to give this year.</p>
                        <p>Get Collection for All</p>
                    </div>
                    <span class="icon material-symbols-outlined">star</span>
                </div>
                <a href="#">Get this books <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 book-service">
                <div class="d-flex">
                    <div>
                        <p>Get the premium books released.</p>
                        <p>Add it to your Collections</p>
                    </div>
                    <span class="icon material-symbols-outlined">workspace_premium</span>
                </div>
                <?php if(isset($_SESSION['uid'])){ ?>
                    <a href="./data/add-to-cart.php">Get this books <span class="material-symbols-outlined">arrow_forward</span></a>
                <?php } ?>
                <a href="./src/login.php">Get this books <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 book-service">
                <div class="d-flex">
                    <div>
                        <p>The best book to give this year.</p>
                        <p>Get Collection for All</p>
                    </div>
                    <span class="icon material-symbols-outlined">favorite</span>
                </div>
                <a href="#">Get this books <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 book-service">
                <div class="d-flex">
                    <div>
                        <p>Get the premium books released.</p>
                        <p>Add it to your Collections</p>
                    </div>
                    <span class="icon material-symbols-outlined">bookmark_added</span>
                </div>
                <a href="#">Get this books <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
        </div>
    </div>
    <div class="container best-new">
        <h2 class="book-heading">Best Seller Books</h2>
        <p class="book-subheading">Get The Best Books Right Now</p>
        <div class="row my-5">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/ft1.jpg" alt="book image">
                    <div class="book-overlay">
                    <?php if(isset($_SESSION['uid'])){ ?>
                        <a href="./data/add-to-cart.php">Get this book</a>
                    <?php } else{ ?>
                        <a href="./src/login.php">Get this book</a>
                    <?php } ?>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">The White Raven</a>
                <p class="book-price">₱500.00</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/62723739bb391754b16b4f3a_wattpad-3.png" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.php" class="view-book-link">Hopeless</a>
                <p class="book-price">₱500.00</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/ft2.jpg" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">Fantasy Flight</a>
                <p class="book-price">₱500.00</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/h.jpg" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">The Warrior Game</a>
                <p class="book-price">₱500.00</p>
            </div>
        </div>
        <a href="#" class="view-all-books">View Best Seller Books</a>
    </div>
    <div class="container best-new">
        <h2 class="book-heading">New Arrival Books</h2>
        <p class="book-subheading">Get The Newly Arrival Books Right Now</p>
        <div class="row my-5">
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/hp1.png" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">Harry Potter</a>
                <p class="book-price">₱500.00</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/image10.png" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">Oh Baby!</a>
                <p class="book-price">₱500.00</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/image6.png" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">Offaction</a>
                <p class="book-price">₱500.00</p>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="book">
                    <a href="#" class="add-to-collections material-symbols-outlined">favorite</a>
                    <img src="<?php echo URL ?>assets/kissing.jpg" alt="book image">
                    <div class="book-overlay">
                        <a href="./add-to-cart.html">Get this book</a>
                    </div>
                </div>
                <a href="./view-book.html" class="view-book-link">Kissing in the Crows Nest</a>
                <p class="book-price">₱500.00</p>
            </div>
        </div>
        <a href="#" class="view-all-books">View Newly Arrival Books</a>
    </div>

<?php include('./partials/_footer.php') ?>