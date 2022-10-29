<?php
include 'header.php';
require '../db/db.php';

$qry = "SELECT SUM(`volunteer_hour`) as `volunteer_hour`, SUM(`certificate`) as `certificate` FROM `academic`";
$qry = mysqli_query($conn, $qry);
$academic = $qry->fetch_assoc();
if (empty($academic['certificate'])){
    $academic['certificate'] = 0;
}
if (empty($academic['volunteer_hour'])){
    $academic['volunteer_hour'] = 0;
}
?>
<div class="container-fluid px-4">
    <div class="row g-3 my-2 justify-content-center">
        <div class="col-md-4">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div class="d-flex flex-column align-items-center">
                    <h3 class="fs-2"><?php echo $academic['certificate'] ?></h3>
                    <p class="fs-5">Certificate</p>
                </div>
                <i class="fa-solid fa-certificate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div class="d-flex flex-column align-items-center">
                    <h3 class="fs-2"><?php echo $academic['volunteer_hour'] ?></h3>
                    <p class="fs-5">Volunteer hours</p>
                </div>
                <i class="fa-solid fa-hand-holding-heart fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
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