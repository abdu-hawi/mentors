<?php
include 'header.php';
require '../db/db.php';

$qry = "SELECT * FROM `users` WHERE `type` = 'user'";
$qry = mysqli_query($conn, $qry);
$student_total = $qry->num_rows;
$mentors = 0;
$mentees = 0;
while ($row = $qry->fetch_assoc()){
    if ($row['level'] > 4){
        $mentees ++;
    }else{
        $mentors ++;
    }
}

?>
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-4">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?php echo $mentors ?></h3>
                    <p class="fs-5">Mentors</p>
                </div>
                <i class="fa-solid fa-chalkboard-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?php echo $mentees ?></h3>
                    <p class="fs-5">Mentees</p>
                </div>
                <i class="fa-solid fa-users-rectangle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?php echo $student_total ?></h3>
                    <p class="fs-5">All students</p>
                </div>
                <i class="fa fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
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