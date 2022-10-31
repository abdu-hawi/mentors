<?php
include 'header.php';
require '../db/db.php';
$qry = "SELECT * FROM `users` WHERE `type` = 'academic' AND `id` = ".$_SESSION['userinfo']['id']." AND `email` = '".$_SESSION['userinfo']['email']."'";
$qry = mysqli_query($conn, $qry);

$row = $qry->fetch_assoc();
unset($row['password']);
$mentors = $row;
?>
<div class="container-fluid px-4">

    <div class="row my-3">
        <h3 class="fs-4 mb-3">My Account</h3>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <div class="col-5 d-flex flex-column">
            <div class="col-md-12 form-group mx-2 mb-3 border-bottom border-info">
                <label class="fw-bold w-25">Full name</label>
                <label>
                    <?php echo $_SESSION['userinfo']['name'] ?>
                </label>
            </div>
            <div class="col-md-12 form-group mx-2 mb-3 border-bottom border-info">
                <label class="fw-bold w-25">Email</label>
                <label>
                    <?php echo $_SESSION['userinfo']['email'] ?>
                </label>
            </div>
            <div class="col-md-12 form-group mx-2 mb-3 border-bottom border-info">
                <label class="fw-bold w-25">Telephone</label>
                <label>
                    <?php echo $_SESSION['userinfo']['mobile'] ?>
                </label>
            </div>
            <a href="edit_profile.php" class="btn btn-primary px-4 text-white col-md-4">
                Edit
            </a>
        </div>
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