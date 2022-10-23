<?php 
    include('../data/config.php');
    include('../partials/_imports.php');
    include('../partials/_popup.php');

    if(isset($_SESSION['uid'])){
        header('location: ./books.php');
    }

    if(isset($_POST['sign_up'])){
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        $role_id = '240c4236-4f4f-11ed-96e0-088fc30176f9';

        $is_email_exist = "SELECT * FROM `accounts` WHERE email='{$email}'";
        $is_email_exist_query = mysqli_query($conn, $is_email_exist);

        if(empty($fullname) && empty($email) && empty($password) && empty($confirm_password)){
            echo '<script>alert("Fill up all the required fields.")</script>';
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo '<script>alert("Invalid email address.")</script>';
        } else if($password !== $confirm_password){
            echo '<script>alert("Password not matched.")</script>';
        } else if(mysqli_num_rows($is_email_exist_query) > 0){
            echo '<script>alert("Email already exist.")</script>';
        }else{
            $encrypt_pass = md5($password);
            $create_account = "INSERT INTO `accounts` (user_id, fullname, email, password, role_id, date_joined) VALUES (UUID(), '{$fullname}', '{$email}', '{$encrypt_pass}', '{$role_id}', current_timestamp())";
            $create_account_query = mysqli_query($conn, $create_account);
            if($create_account_query){
                $fullname = '';
                $email = '';
                $password = '';
                $confirm_password = '';
                echo '<script>alert("Your account created successfully.")</script>';
            } else{
                echo '<script>alert("Looks like an error occured while creating your account.")</script>';
            }
        }
    }
?>
    <div class="container-fluid vh-100">
        <div class="row h-100 account-container">
            <div class="col-md-5 h-100 d-flex flex-column justify-content-center form-details">
                <h2 class="heading mb-5 txt-darker">Create Your <span>Bibliophile</span> <br> Account Right Now!</h2>
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">account_box</span></span>
                            <input type="text" name="fullname" value="<?php if(isset($fullname)) echo $fullname ?>" class="form-control" placeholder="e.g. Juan Dela Cruz" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">alternate_email</span></span>
                            <input type="email" name="email" value="<?php if(isset($email)) echo $email ?>" class="form-control" placeholder="e.g. taylor@gmail.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">key</span></span>
                            <input type="password" name="password" value="<?php if(isset($password)) echo $password ?>" class="form-control" placeholder="Set password." required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">key</span></span>
                            <input type="password" name="confirm_password" value="<?php if(isset($confirm_password)) echo $confirm_password ?>" class="form-control" placeholder="Confirm password." required>
                        </div>
                    </div>
                    <button type="submit" name="sign_up" class="btn btn-primary form-btn ">Sign Up</button>
                </form>
                <p class="mt-4 redir-link">Already have an account? <a href="./login.php" class="fw-600">Login</a></p>
                <a href="../index.php" class="navigate-link">Go to Homepage.</a>
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