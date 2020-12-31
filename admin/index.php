<?php
include "../core/config.php";

session_start();

if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    $suser = mysqli_query($connect, "SELECT * FROM `users` WHERE username='$uname'");
    $count = mysqli_num_rows($suser);
    if ($count > 0) {
        echo '<meta http-equiv="refresh" content="0; url=dashboard.php" />';
        exit;
    }
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html>
    <!-- head -->
    <?php include_once "partials/head.php"; ?>

    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="" class="h1"><b>my</b>Blog</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="" method="post">
                        <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-8">
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['signin'])) {
                            $username = mysqli_real_escape_string($connect, $_POST['username']);
                            $password = hash('sha256', $_POST['password']);
                            $check    = mysqli_query($connect, "SELECT username, password FROM `users` WHERE `username`='$username' AND password='$password'");
                            if (mysqli_num_rows($check) > 0) {
                                $_SESSION['sec-username'] = $username;
                                echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
                            } else {
                                echo '<br />
                                <div class="alert alert-danger">
                                    <i class="fa fa-exclamation-circle"></i> The entered <strong>Username</strong> or <strong>Password</strong> is incorrect.
                                </div>';
                            }
                        }
                    ?> 
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->      
        <!-- Scripts -->
        <?php include_once "partials/scripts.php"; ?> 
    </body>    
</html>
