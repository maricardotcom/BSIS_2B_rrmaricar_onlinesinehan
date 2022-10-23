<?php 
    include('../data/config.php');
    include('../partials/_imports.php');
    include('../partials/_navigation.php');

    $order_id = $_GET['oid'];

    $get_order_details = "SELECT * FROM `orders` WHERE order_id='{$order_id}' LIMIT 1";
    $get_order_details_query = mysqli_query($conn, $get_order_details);
    $order_data = mysqli_fetch_assoc($get_order_details_query);
?>
    <div class="container py-5 shopping-cart">
        <div class="ordered-items-container mx-auto">
            <h3 class="cart-heading">Orderred Items</h3>
    
            <p class="shipping-txt">Order No. <?php echo $order_data['order_no'] ?></p>

            <?php
                $get_order_items = "SELECT * FROM `order_items` LEFT JOIN books ON order_items.book_id=books.book_id WHERE order_items.order_id='{$order_id}'";
                $get_order_items_query = mysqli_query($conn, $get_order_items);
                while($item_data = mysqli_fetch_assoc($get_order_items_query)){
            ?>
            <div class="cart-item">
                <div class="col-md-12">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-12 col-md-9 d-flex align-items-center gap-1">
                            <img src="<?php echo UPLOADS ?>books/<?php echo $item_data['book_id'] ?>.jpg" alt="book" class="img-70">
                            <div class="orderred-item-details">
                                <p><?php echo $item_data['title'] ?></p>
                                <p>By <?php echo $item_data['author'] ?></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <p><span class="item-price">₱<?php echo $item_data['price'] ?></span> x <?php echo $item_data['quantity'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <a href="./orders.php" class="btn btn-primary mx-auto my-3 go-back">Go Back to Orders</a>
        </div>
    </div>

<?php include('../partials/_footer.php') ?>