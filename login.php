<?php
require_once('db/session.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include ("db/db.php");
    $user = [];

    $qry = "SELECT * FROM `users` WHERE `email` = '".$_POST['email']."' AND `password` = '".md5($_POST['password'])."'";
    $qry = mysqli_query($conn, $qry);
    if ($qry->num_rows == 0){
        die("Email OR Password incorrect....!!!");
    }
    $user = $qry->fetch_assoc();
    $user['password'] = null;
    $_SESSION['userinfo'] = $user;

    if ($user['type'] == 'admin') {
        header('Location: admin/index.php');
        return;
    }elseif ($user['type'] == 'academic') {
        header('Location: academic/index.php');
        return;
    }
    header('Location: index.php');
}

include 'header.php';
?>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Login</h2>
                    <p></p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="index.php">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Login</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <form method="post" class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" name="password" id="pword" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <a href="forget_password.php" class="small">Forget your Password</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

<?php include 'footer.php' ?>