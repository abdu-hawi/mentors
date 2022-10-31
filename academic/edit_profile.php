<?php
include 'header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include ("../db/db.php");
    $password = '';
    if (isset($_POST['current_password']) && !empty($_POST['current_password'])){
        $qry = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['userinfo']['email']."' AND `password` = '".md5($_POST['current_password'])."'";
        $qry = mysqli_query($conn, $qry);
        if ($qry->num_rows == 0){
            die("Current password is not correct");
        }
        $password = $qry->fetch_assoc()['password'];
    }
    if (
        isset($_POST['id']) && !empty($_POST['id']) &&
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['mobile']) && !empty($_POST['mobile'])
    ){
        if ($_POST['pwd'] !== $_POST['password']){
            die("Password and confirm not match");
        }

        if (isset($_POST['password']) && !empty($_POST['password'])){
            $password = md5(trim($_POST['password']));
        }
        $id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $mobile = trim($_POST['mobile']);

        $qry_update = "UPDATE `users` SET `name`='".$name."',
                   `email`='".$email."', `password`='".$password."',
                   `mobile`='".$mobile."' 
                   WHERE `id` = ".$_SESSION['userinfo']['id']." 
                   AND `email` = '".$_SESSION['userinfo']['email']."'";

        if (mysqli_query($conn, $qry_update)) {
            $qry_se = "SELECT * FROM `users` WHERE `email` = '".$_POST['email']."' AND `password` = '".$password."'";
            $qry_se = mysqli_query($conn, $qry_se);
            $user = $qry_se->fetch_assoc();
            $user['password'] = null;
            $_SESSION['userinfo'] = $user;
            header('Location: account.php');
        } else {
            die("Something is error");
        }
    }
}
?>
<div class="container-fluid px-4">

    <div class="row my-3">
        <h3 class="fs-4 mb-3">Edit profile</h3>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <form method="post">
            <input name="id" type="hidden" value="<?php echo $_SESSION['userinfo']['id'] ?>">
            <div class="col-8 d-flex flex-column">
                <div class="col-md-12 form-group">
                    <label for="fullname">Full name</label>
                    <input value="<?php echo $_SESSION['userinfo']['name'] ?>"
                           type="text" name="name" id="fullname" class="form-control form-control-lg">
                </div>
                <div class="col-md-12 form-group">
                    <label for="email">Email</label>
                    <input value="<?php echo $_SESSION['userinfo']['email'] ?>"
                           type="email" name="email" id="email" class="form-control form-control-lg">
                </div>
                <div class="col-md-12 form-group">
                    <label for="telephone">Telephone</label>
                    <input value="<?php echo $_SESSION['userinfo']['mobile'] ?>"
                           type="tel" name="mobile" id="telephone" class="form-control form-control-lg">
                </div>
                <div class="col-md-12 form-group">
                    <label for="pword">New Password</label>
                    <input type="password" name="password" id="pword" class="form-control form-control-lg">
                </div>
                <div class="col-md-12 form-group">
                    <label for="pword2">Re-type new Password</label>
                    <input type="password" name="pwd" id="pword2" class="form-control form-control-lg">
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="pword" class="text-danger">To update your profile, please write your current password</label>
                        <input type="password" name="current_password" placeholder="Current password" id="pword" class="form-control form-control-lg">
                    </div>
                    <div class="col-12 my-3">
                        <input type="submit" value="Update" class="btn btn-primary px-5">
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>

<script src="../js/bootstrap-5.0.0.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>