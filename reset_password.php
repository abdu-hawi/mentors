<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['password'] !== $_POST['confirm_password']){
        die("New password and confirmation not match");
    }
    include ("db/db.php");
    include ("db/session.php");
    $token = $_GET['token'];
    $email = $_GET['email'];
    $qry = "SELECT * FROM `password_reset` WHERE `email` = '".$email."' AND `token` = '".$token."'";
    $qry = mysqli_query($conn, $qry);
    if ($qry->num_rows == 0){
        die("This link is expire, try again reset password ....!!!");
    }
    $qry_del = "DELETE FROM `password_reset` WHERE `email` = '".$email."'";
    $qry_del = mysqli_query($conn, $qry_del);
    $qry_update = "UPDATE `users` SET `password`='".md5($_POST['password'])."' 
                   WHERE `email` = '".$email."'";
    mysqli_query($conn, $qry_update);
    $_SESSION['userinfo'] = false;
    echo "<label>Password reset successfully</label>
<br>
<a href='login.php'><button>Login</button></a>
<a href='index.php'><button>Home</button></a>
";
    die('');
}
include 'header.php';
?>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
         style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Reset password</h2>
                    <p></p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="index.php">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <a href="login.php">Login</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Reset Password</span>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center" id="container_send">
                <form method="post" class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="password">Enter New Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Send" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

<?php include 'footer.php' ?>