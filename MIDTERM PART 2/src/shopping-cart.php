<?php 
    include('../data/config.php');
    include('../partials/_imports.php');
    $title = 'Shopping-Cart';
    include('../partials/_navigation.php');

    if(!isset($_SESSION['uid'])){
        header('location: ./login.php');
    }

    if(isset($_POST['save_details'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $province = mysqli_real_escape_string($conn, $_POST['province']);
        $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);

        $is_already_exist = "SELECT * FROM `shipping_details` WHERE user_id='{$user_id}' LIMIT 1";
        $is_already_exist_query = mysqli_query($conn, $is_already_exist);
        if(mysqli_num_rows($is_already_exist_query) === 0){
            $save_shipping_details = "INSERT INTO `shipping_details` (shipping_details_id, user_id, firstname, middlename, lastname, barangay, street, postal_code, city, province, contact_number) VALUES (UUID(), '{$user_id}', '{$firstname}', '{$middlename}', '{$lastname}', '{$barangay}', '{$street}', '{$postal_code}', '{$city}', '{$province}', '{$contact_number}')";
            $save_shipping_details_query = mysqli_query($conn, $save_shipping_details);
            if($save_shipping_details_query){
                echo '<script>
                alert("Shipping details saved successfully.")
                setInterval(() => {
                    location.href = "./shopping-cart.php"
                }, 100);
                </script>';
            } else{
                echo '<script>alert("An error occured.")</script>';
            }
        }

    }

    if(isset($_POST['update_details'])){
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $province = mysqli_real_escape_string($conn, $_POST['province']);
        $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);

        $update_shipping_details = "UPDATE `shipping_details` SET firstname='{$firstname}', middlename='{$middlename}', lastname='{$lastname}', barangay='{$barangay}', street='{$street}', postal_code='{$postal_code}', city='{$city}', province='{$province}', contact_number='{$contact_number}'";
        $update_shipping_details_query = mysqli_query($conn, $update_shipping_details);
        if(mysqli_affected_rows($conn) === 1){
            echo '<script>
                alert("Shipping details updated successfully.")
                setInterval(() => {
                    location.href = "./shopping-cart.php"
                }, 100);
                </script>';
        } else{
            echo '<script>alert("An error occured.")</script>';
        }
    }

    if(isset($_POST['place_order'])){
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);

        $get_shipping_details = "SELECT shipping_details_id FROM `shipping_details` WHERE user_id='{$user_id}' LIMIT 1";
        $get_shipping_details_query = mysqli_query($conn, $get_shipping_details);

        if(count($_SESSION['cart']) === 0){
            echo '<script>alert("Your cart is empty.")</script>';
        } else if(mysqli_num_rows($get_shipping_details_query) === 0){
            echo '<script>alert("Set up your shipping details.")</script>';
        } else{
            $shipping_data = mysqli_fetch_assoc($get_shipping_details_query);

            $order_no = rand(time(), 999999);
            $shipping_id = $shipping_data['shipping_details_id'];
            $status = 'Processing';
            $payment_method = 'COD';

            $place_order = "INSERT INTO `orders` (order_id, order_no, user_id, shipping_details_id, amount, status, payment_method, date_orderred) VALUES (UUID(), '{$order_no}', '{$user_id}', '{$shipping_id}', '{$amount}', '{$status}', '{$payment_method}', current_timestamp())";
            $place_order_query = mysqli_query($conn, $place_order);
            if($place_order_query){
                $id = mysqli_insert_id($conn);

                $get_order_id = "SELECT order_id FROM `orders` WHERE id='{$id}' LIMIT 1";
                $get_order_id_query = mysqli_query($conn, $get_order_id);
                $order_id_data = mysqli_fetch_assoc($get_order_id_query);

                $order_id = $order_id_data['order_id'];

                foreach($_SESSION['cart'] as $item):
                    $save_order_item = "INSERT INTO `order_items` (order_item_id, order_id, book_id, quantity, date_orderred) VALUES (UUID(), '{$order_id}', '{$item['book_id']}', '{$item['quantity']}', current_timestamp())";
                    $save_order_item_query = mysqli_query($conn, $save_order_item);
                endforeach;
                if($save_order_item_query){
                    $_SESSION['cart'] = array();
                    echo '<script>
                        alert("We are now processing your order.")
                        setInterval(() => {
                            location.href = "./shopping-cart.php"
                        }, 100);
                        </script>';
                } else{
                    echo '<script>alert("Placing your order failed. Please try again.")</script>';
                }
            } else{
                echo '<script>alert("Placing your order failed. Please try again.")</script>';
            }
        } 
    }
?>
    <div class="container py-5 shopping-cart">
        <h3 class="cart-heading">Shopping Cart</h3>

        <p class="shipping-txt">Shipping Details</p>
        <div class="row g-5">
            <div class="col-sm-12 col-md-9">
                <?php 
                    $get_user_shipping_details = "SELECT * FROM `shipping_details` WHERE user_id='{$user_id}' LIMIT 1";
                    $get_user_shipping_details_query = mysqli_query($conn, $get_user_shipping_details);
                    $shipping_data = mysqli_fetch_assoc($get_user_shipping_details_query);
                    $firstname = $shipping_data['firstname'];
                    $middlename = $shipping_data['middlename'];
                    $lastname = $shipping_data['lastname'];
                    $barangay = $shipping_data['barangay'];
                    $street = $shipping_data['street'];
                    $postal_code = $shipping_data['postal_code'];
                    $city = $shipping_data['city'];
                    $province = $shipping_data['province'];
                    $contact_number = $shipping_data['contact_number'];
                ?>
                <form action="" method="POST" autocomplete="off">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="firstname">Firstname<span class="text-danger">*</span></label>
                                <input type="text" name="firstname" class="form-control" placeholder="Provide your firstname." value="<?php if(isset($firstname)) echo $firstname ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="middlename">Middlename<span class="text-danger">*</span></label>
                                <input type="text" name="middlename" class="form-control" placeholder="Provide your middlename." value="<?php if(isset($middlename)) echo $middlename ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="lastname">Lastname<span class="text-danger">*</span></label>
                                <input type="text" name="lastname" class="form-control" placeholder="Provide your lastname." value="<?php if(isset($lastname)) echo $lastname ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="barangay">Barangay<span class="text-danger">*</span></label>
                                <input type="text" name="barangay" class="form-control" placeholder="Provide your barangay." value="<?php if(isset($barangay)) echo $barangay ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="street">Street<span class="text-danger">*</span></label>
                                <input type="text" name="street" class="form-control" placeholder="Provide your street." value="<?php if(isset($street)) echo $street ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="postal_code">Postal Code <span class="text-danger">*</span></label>
                                <input type="text" name="postal_code" class="form-control" placeholder="Provide your postal code." value="<?php if(isset($postal_code)) echo $postal_code ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="city">City<span class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" placeholder="Provide your city." value="<?php if(isset($city)) echo $city ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="province">Province<span class="text-danger">*</span></label>
                                <input type="text" name="province" class="form-control" placeholder="Provide your province." value="<?php if(isset($province)) echo $province ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="postal_code">Contact Number <span class="text-danger">*</span></label>
                                <input type="text" name="contact_number" class="form-control" placeholder="Provide your contact number." value="<?php if(isset($contact_number)) echo $contact_number ?>" required>
                            </div>
                        </div>
                    </div>
                    <?php echo mysqli_num_rows($get_user_shipping_details_query) > 0 ? '<button type="submit" name="update_details" class="btn btn-primary form-btn">Update Details</button>' : '<button type="submit" name="save_details" class="btn btn-primary form-btn">Save Details</button>' ?>
                </form>
            </div>
            <div class="col-sm-12 col-md-3 order-summary-container">
                <div class="order-heading">
                    <p>Your Order</p>
                </div>
                <?php
                    $cart_items = $_SESSION['cart'];
                    $total = 0;
                    foreach($cart_items as $cart_item):
                        $get_book_data = "SELECT * FROM `books` WHERE book_id='{$cart_item['book_id']}' LIMIT 1";
                        $get_book_data_query = mysqli_query($conn, $get_book_data);
                        $book_data = mysqli_fetch_assoc($get_book_data_query);
                        $total += $book_data['price'] * $cart_item['quantity'];
                ?>
                <div class="cart-item">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <img src="<?php echo UPLOADS ?>books/<?php echo $cart_item['book_id'] ?>.jpg" alt="book">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <p><?php echo $book_data['title'] ?></p>
                            <p>By <?php echo $book_data['author'] ?></p>
                            <p><span class="item-price">₱<?php echo $book_data['price'] ?></span> x <?php echo $cart_item['quantity'] ?></p>
                        </div>
                        <div class="col-sm-12 col-md-2 d-flex align-items-center">
                            <a href="books.php?bid=<?php echo $cart_item['book_id'] ?>" class="text-danger material-symbols-outlined">remove</a>
                        </div>
                    </div>
                </div>
                <?php  endforeach ?>
                <div class="cart-summary">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p>Total</p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p>₱<?php echo $total ?></p>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <input type="hidden" name="amount" value="<?php echo $total ?>">
                    <button type="submit" name="place_order" class="btn btn-primary form-btn w-100">Place Order</button>
                </form>
            </div>
        </div>
    </div>

<?php include('../partials/_footer.php') ?>