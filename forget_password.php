<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'sendEmail.php';
    include ("db/db.php");
    $rand = md5(rand(1111,9999));
    $email = trim($_POST['email']);
    $qry = "INSERT INTO `password_reset` (`email`, `token`) VALUES ('".$email."', '".$rand."')";
    if (mysqli_query($conn, $qry)) {
        include 'url.php';
        $url = url()['url'] . $_SERVER['HTTP_HOST'] . url()['path'].'/reset_password.php?email='.$email.'&token='.$rand;
        $body = "<label>Please click button to reset password</label> <br> 
<a href='".$url."' style='cursor: pointer;'>
<button style='padding: 0.25rem 1rem;cursor: pointer;color: #fff;
    background-color: #5f7a92;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;    user-select: none;
    border: 1px solid transparent;font-size: 1rem;
    line-height: 1.5;'>
   Click here to reset password 
</button>

</a>
<hr>
If you are can't click button you copy and past link bellow in your browser
<br>".$url ;
        if (send($email, 'Reset password', $body))
            die("Please check your email to reset your password");
    }
    ///
}
include 'header.php';

?>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
         style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Forget password</h2>
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
            <span class="current">Forget Password</span>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center" id="container_send">
                <form method="post" class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Enter Registered Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" required>
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