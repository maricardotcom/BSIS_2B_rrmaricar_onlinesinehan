<?php 
    include('../data/config.php');
    include('../partials/_imports.php');
    $title = 'Wishlist';
    include('../partials/_navigation.php');

    if(!isset($_SESSION['uid'])){
        header('location: ./login.php');
    }
?>
    <div class="container vh-100">
        <h3 class="heading-text">Wish List</h3>
        <div class="row mb-5">
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 wishlist-card">
                <div class="row">
                    <div class="col-sm-12 col-md-12 d-flex align-ietms-center gap-2">
                        <img src="../assets/Day after Day.jpg" class="img-130" alt="book cover">
                        <div class="d-flex flex-column">
                            <div>
                                <p class="fs-12 fw-600">Day After Day</p>
                                <p class="fs-8 fw-500 txt-gray">By MASONFITZZY</p>
                            </div>
                            <p class="book-price">₱650.00</p>
                            <div class="d-flex flex-column  align-items-center gap-1 mt-auto">
                                <a href="#" class="btn btn-primary add-to-cart">Add to Cart</a>
                                <a href="#" class="btn btn-danger d-flex align-items-center remove-wishlist gap-sm"><span class="fs-10 material-symbols-outlined">close</span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../partials/_footer.php') ?>