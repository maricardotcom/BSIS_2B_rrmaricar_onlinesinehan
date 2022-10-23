<?php
    include('../data/config.php');
    include('../partials/_imports.php');
    include('../partials/_popup.php');

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($email) && empty($password)){
            echo '<script>alert("Fill up all the required fields.")</script>';
        } else{
            $encrypt_pass = md5($password);
            $is_account_exist = "SELECT * FROM `accounts` WHERE email='{$email}' AND password='{$encrypt_pass}' LIMIT 1";
            $is_account_exist_query = mysqli_query($conn, $is_account_exist);
            if(mysqli_num_rows($is_account_exist_query) > 0){
                $account_data = mysqli_fetch_assoc($is_account_exist_query);
                if($account_data['role_id'] === '0ef146b3-4f4f-11ed-96e0-088fc30176f9'){
                    $_SESSION['uid'] = $account_data['user_id'];
                    $_SESSION['rid'] = $account_data['role_id'];
                    header('location: ../admin/dashboard.php');
                } else{
                    $_SESSION['uid'] = $account_data['user_id'];
                    $_SESSION['rid'] = $account_data['role_id'];
                    $_SESSION['cart'] = array();
                    header('location: ./books.php');
                }
            } else{
                echo '<script>alert("Incorrect account credentials.")</script>';
            }
        }
    }
?>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-5 h-100 d-flex flex-column justify-content-center form-details">
                <h2 class="heading mb-5 txt-darker">Login Now. <br> Buy and Start <span>Reading</span>!</h2>
                <form action="#" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">alternate_email</span></span>
                            <input type="email" name="email" value="<?php if(isset($email)) echo $email ?>" class="form-control" placeholder="Provide you email." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">key</span></span>
                            <input type="password" name="password" value="<?php if(isset($password)) echo $password ?>" class="form-control" placeholder="Account password." required>
                        </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary form-btn ">Login</button>
                </form>
                <p class="mt-4 redir-link">Does not have an account yet? <a href="./signup.html" class="fw-600">Sign up</a></p>
                <a href="./index.html" class="navigate-link">Go to Homepage.</a>
            </div>
            <div class="col-md-7 p-0">
                <div class="grid-photo">
                    <div class="photo"></div>
                    <div class="photo"></div>
                    <div class="photo"></div>
                    <div class="photo"></div>
                </div>
            </div>
        </div>
    </div>

<?php include('../partials/_footer.php') ?>