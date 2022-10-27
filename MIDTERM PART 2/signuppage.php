<?php
    include_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliophile - Sign Up</title>
    <link rel="icon" href="./assets/Logo.svg">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- SIGNUP PHP/QUERY -->
    <?php

        if(isset($_POST['signup'])){
            $fullname  = $_POST['fullname'];
            $gender  = $_POST['gender'];
            $contact    = $_POST['contact'];
            $email      = $_POST['email'];
            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $c_password = $_POST['c_password'];

            $is_exist = "SELECT * FROM `users` WHERE username = '$username'";
            $is_exist_query = mysqli_query($connect, $is_exist);
            if(!mysqli_num_rows($is_exist_query) > 0){
                if($c_password === $password){
                    $create_account = "INSERT INTO `users` (fullname, gender, contact, email, username, password) VALUES ('$fullname','$gender','$contact', '$email', '$username', '$password')";
                    $create_account_query = mysqli_query($connect, $create_account);
                    if($create_account_query){
                        echo 'Account successfully created';
                        header('location:loginpage.php');
                    } else{
                        echo 'Account creation failed';
                    }
                } else{
                    echo '
                <div class="alert alert-danger alert-dismissible fade show  w-25 mx-auto mt-2 " role="alert"> 
                    Password not matched!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
                }
            } else{
                echo '
                <div class="alert alert-danger alert-dismissible fade show  w-25 mx-auto mt-2 " role="alert"> 
                    Username already taken
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
        }
    ?>

    <!-- SIGNUP FORM -->
    <div class="container-fluid login-signup">
        <div class="row h-100">
            <div class="col-md-5 h-100 d-flex flex-column justify-content-center form-details">
                <h3 class="heading mb-5 txt-darker">Create Your <span>Bibliophile</span> <br> Account Right Now!</h3>
                <form action="signuppage.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">account_box</span></span>
                            <input type="text" name="fullname" class="form-control" placeholder="e.g. Juan Dela Cruz">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">female</span></span>
                            <input type="text" name="gender" class="form-control" placeholder="e.g. Male">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">call</span></span>
                            <input type="text" name="contact" class="form-control" placeholder="e.g. 091234567">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">alternate_email</span></span>
                            <input type="email" name="email" class="form-control" placeholder="e.g. taylor@gmail.com">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">account_circle</span></span>
                            <input type="text" name="username" class="form-control" placeholder="e.g. Juan Dela Cruz">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">key</span></span>
                            <input type="password" name="password" class="form-control" placeholder="Set password." required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">key</span></span>
                            <input type="password" name="c_password" class="form-control" placeholder="Confirm password." required>
                            </div>
                    </div>
                    <button type="submit" name="signup" class="btn btn-primary form-btn ">Sign Up</button>
                </form>
                <p class="mt-4 redir-link">Already have an account? <a href="loginpage.php" class="fw-600">Login</a></p>
            </div>
            <div class="col-md-7 grid-photo-container">
                <div class="grid-photo">
                    <div class="photo"></div>
                    <div class="photo"></div>
                    <div class="photo"></div>
                    <div class="photo"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="./bootstrap/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>