<?php
    include_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliophile - Login</title>
    <link rel="icon" href="./assets/Logo.svg">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- LOGIN PHP/QUERY -->

    <?php
        if(isset($_POST['login'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $login = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
            $login_query = mysqli_query($connect, $login);
            
            if(mysqli_num_rows($login_query) > 0){
                header('location:order.php');
            } else{
                echo '
                <div class="alert alert-danger alert-dismissible fade show  w-25 mx-auto mt-2 " role="alert"> 
                    Account does not exist!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
        }
    ?>

    <!-- FORM -->
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-md-5 h-100 d-flex flex-column justify-content-center form-details">
                <h2 class="heading mb-5 txt-darker">Login Now. <br> Buy and Start <span>Reading</span>!</h2>
                <form action="loginpage.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">account_circle</span></span>
                            <input type="text" name="username" class="form-control" placeholder="Enter username">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3 mt-2">
                            <span class="input-group-text" id="basic-addon1"><span class="form-icon material-symbols-outlined">key</span></span>
                            <input type="password" name="password" class="form-control" placeholder="Account password." required>
                            </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary form-btn ">Login</button>
                </form>
                <p class="mt-4 redir-link">Does not have an account yet? <a href="signuppage.php" class="fw-600">Sign up</a></p>
            </div>
            <div class="col-md-7">
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