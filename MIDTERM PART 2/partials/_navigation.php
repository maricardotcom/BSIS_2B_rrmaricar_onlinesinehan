    <header class="top-header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-between mb-2">
                <a class="navbar-brand wsm" href="<?php echo URL ?>index.php"><img src="<?php echo URL ?>assets/Logo.svg" class="nav-logo" alt="logo"> Bibliography</a>
                <div class="search-wrapper d-flex align-items-center">
                    <div class="select-filter">
                        <select name="filter" class="filter-select">
                            <option value="">All Categories</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Romance">Romance</option>
                        </select>
                    </div>
                    <input type="text" placeholder="Search..." class="search-input">
                    <span class="search-btn material-symbols-outlined">Search</span>
                </div>
                <div class="login-signup wsm d-flex align-items-center justify-content-end">
                    <?php if(isset($_SESSION['uid'])){ ?>
                        <a href="<?php echo URL ?>data/logout.php" class="signup-btn">Logout</a>
                    <?php } else{ ?>
                        <a href="<?php echo URL ?>src/login.php" class="login-btn">Login</a>
                        <a href="<?php echo URL ?>src/signup.php" class="signup-btn">Sign Up</a> 
                    <?php } ?>
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
                            <a class="nav-link <?php echo $title === 'New-Arrivals' ? 'active' : '' ?>" href="<?php echo URL ?>src/new-arrivals.php">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Collection' ? 'active' : '' ?>" href="<?php echo URL ?>src/collection.php">Collection</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Home' ? 'active' : '' ?>" href="<?php echo URL ?>index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Books' ? 'active' : '' ?>" href="<?php echo URL ?>src/books.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Category' ? 'active' : '' ?>" href="<?php echo URL ?>src/category.php">Category</a>
                        </li>
                    <?php if(isset($_SESSION['uid'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Orders' ? 'active' : '' ?>" href="<?php echo URL ?>src/orders.php">Orders</a>
                        </li>
                    <?php } ?>
                    </ul>
                    <ul class="navbar-nav wsm justify-content-end">

                    <?php if(isset($_SESSION['uid'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Wishlist' ? 'active' : '' ?> material-symbols-outlined" href="<?php echo URL ?>src/wishlist.php">favorite</a>
                        </li>
                    <?php } ?>

                    <?php if(isset($_SESSION['uid'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link cart-icon d-flex align-items-center" href="<?php echo URL ?>src/shopping-cart.php"><span class="fs-13 material-symbols-outlined">shopping_bag</span> 
                            <?php echo isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ? '<p class="fs-7 fw-600 item-count mb-0">'.count($_SESSION['cart']).'</p>' : '' ?></a>
                        </li>
                    <?php } else{ ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $title === 'Shopping-Cart' ? 'active' : '' ?> cart-icon d-flex align-items-center" href="<?php echo URL ?>src/login.php"><span class="fs-13 material-symbols-outlined">shopping_bag</span></a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
    </header>