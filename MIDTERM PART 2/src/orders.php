<?php 
    include('../data/config.php');
    include('../partials/_imports.php');
    $title = 'Orders';
    include('../partials/_navigation.php');

    if(!isset($_SESSION['uid'])){
        header('location: ./login.php');
    }
?>
    <div class="container py-5 shopping-cart">
        <h3 class="cart-heading">Orders</h3>

        <p class="shipping-txt">Order Details</p>
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="thead">
                    <tr>
                        <th>Order No.</th>
                        <th>Amount</th>
                        <th>Item Count</th>
                        <th>Status</th>
                        <th>Date Ordered</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    $get_orders = "SELECT * FROM `orders` WHERE user_id='{$user_id}' ORDER BY id DESC";
                    $get_orders_query = mysqli_query($conn, $get_orders);
                    if(mysqli_num_rows($get_orders_query) > 0){
                        while($order_data = mysqli_fetch_assoc($get_orders_query)){
                            $get_item_count = "SELECT * FROM `order_items` WHERE order_id='{$order_data['order_id']}'";
                            $get_item_count_query = mysqli_query($conn, $get_item_count);
                            echo '<tr>
                                    <td>'.$order_data['order_no'].'</td>
                                    <td>₱'.$order_data['amount'].'.00</td>
                                    <td>'.mysqli_num_rows($get_item_count_query).'</td>
                                    <td><span class="'.strtolower($order_data['status']).'">'.$order_data['status'].'</span></td>
                                    <td>'.date_format(date_create($order_data['date_orderred']), "m-d-Y") .'</td>
                                    <td><a href="./view-order.php?oid='.$order_data['order_id'].'" class="view-order d-flex align-items-center justify-content-center"><span class="material-symbols-outlined">open_in_new</span> View Order Items</a></td>
                                </tr>';
                        }
                    } else{
                        echo 'You do not have any orders.';
                    }
                ?>
                    </tbody>
            </table>
        </div>
    </div>

<?php include('../partials/_footer.php') ?>