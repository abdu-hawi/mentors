<?php
require '../db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rate'])
){
    $conn->begin_transaction();
    try {
        $qry = "UPDATE `rates` SET `status` = '".$_POST['status']."' WHERE `id` = ".$_POST['id'];
        mysqli_query($conn, $qry);
        $commitment = $_POST['commitment'];
        $communication = $_POST['communication'];
        $involvement = $_POST['involvement'];
        $performance = $_POST['performance'];
        $mentor_id = $_POST['mentor_id'];

        if ($_POST['status'] == 'approve'){
            $rate = round(( intval($commitment) +intval($communication) +intval($involvement) +intval($performance) ) / 4) ;
            $qry_sel = mysqli_query($conn, "SELECT `rate` FROM `users` WHERE `id` =".$mentor_id);
            $qry_sel = $qry_sel->fetch_assoc()['rate'];
            $new_rate = round( ( intval($qry_sel) + $rate ) / 2 );
            mysqli_query($conn , "UPDATE `users` SET `rate` = '".$new_rate."' WHERE `id` = ".$mentor_id);
        }

        $conn->commit();

        header('Location: '.$_SERVER['PHP_SELF']);
    }catch (Exception $exception){
        $conn->rollback();
        die($exception);
    }

}
include 'header.php';
$qry = "SELECT `rates`.*,`rates`.`id` as `r_id`, `users`.* FROM `rates` 
        JOIN `users` ON `rates`.`mentor_id` = `users`.`id`                   
        WHERE `rates`.`status` = 'new'";

$qry = mysqli_query($conn, $qry);
$mentors = [];
while ($rows = $qry->fetch_assoc()) {
    unset($rows['password']);
    $mentee_name = mysqli_query($conn, "SELECT `name` FROM `users` WHERE `id` =".$rows['mentee_id']);
    $rows['mentee_name'] = $mentee_name->fetch_assoc()['name'] ?? '';
    $mentors[] = $rows;
}
?>
<div class="container-fluid px-4">
    <div class="row g-3 my-2 justify-content-center">
        <div class="row justify-content-around mt-3">
            <?php
            foreach ($mentors as $mentor){
                ?>
                <div class="card col-md-4">
                    <?php
                    if ($mentor['gender'] == 'Male'){
                        $avatar = '../images/man.png';
                    }else{
                        $avatar = '../images/woman.png';
                    }
                    ?>
                    <img src="<?php echo $avatar; ?>" alt="Image" class="card-img-top pt-1">

                    <div class="card-body">
                        <h3 class="fw-bold text-center"><?php echo $mentor['name']; ?></h3>
                        <div class="row text-left">
                            <span class="fw-bold text-dark pr-1 m-0">College </span>
                            <span class="w-100" style="white-space: nowrap; overflow: hidden;">
                                <?php echo $mentor['college']; ?>
                            </span>
                        </div>
                        <div class="row justify-content-center py-1 bg-light border-bottom border-top">
                                <span class="fw-bold text-dark text-center">
                                    Level <?php echo $mentor['level']; ?>
                                </span>
                        </div>
                        <div class="d-flex">
                            <span class="fw-bold text-dark pr-1 m-0">Rating</span>
                            <span class="rating text-center mb-3 w-75">
                                    <?php
                                    for ($i=0; $i<5; $i++){
                                        if ($i < $mentor['rate'] && $mentor['rate'] > 0){
                                            echo '<i class="fa-solid fa-star text-warning px-1"></i>';
                                        }else{
                                            echo '<i class="fa-solid fa-star text-secondary px-1"></i>';
                                        }
                                    }
                                    ?>
                                </span>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#rateModal<?php echo $mentor['mentor_id']; ?>">
                            Show rating
                        </button>

                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="rateModal<?php echo $mentor['mentor_id']; ?>" tabindex="-1"
                     aria-labelledby="rateModalLabel<?php echo $mentor['mentor_id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rateModal<?php echo $mentor['mentor_id']; ?>">
                                    Mentee: <?php echo $mentor['mentee_name']; ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" class="col-12">
                                <div class="modal-body">
                                    <table class="col-12">
                                        <tr>
                                            <td class="pr-3 fw-bold">Commitment</td>
                                            <td class="rating">
                                                <?php
                                                for ($i=0; $i<5; $i++){
                                                    if ($i < $mentor['commitment'] && $mentor['commitment'] > 0){
                                                        echo '<i class="fa-solid fa-star text-warning px-1"></i>';
                                                    }else{
                                                        echo '<i class="fa-solid fa-star text-secondary px-1"></i>';
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Communication</td>
                                            <td class="rating">
                                                <?php
                                                for ($i=0; $i<5; $i++){
                                                    if ($i < $mentor['communication'] && $mentor['communication'] > 0){
                                                        echo '<i class="fa-solid fa-star text-warning px-1"></i>';
                                                    }else{
                                                        echo '<i class="fa-solid fa-star text-secondary px-1"></i>';
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Involvement</td>
                                            <td class="rating">
                                                <?php
                                                for ($i=0; $i<5; $i++){
                                                    if ($i < $mentor['involvement'] && $mentor['involvement'] > 0){
                                                        echo '<i class="fa-solid fa-star text-warning px-1"></i>';
                                                    }else{
                                                        echo '<i class="fa-solid fa-star text-secondary px-1"></i>';
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Performance</td>
                                            <td class="rating">
                                                <?php
                                                for ($i=0; $i<5; $i++){
                                                    if ($i < $mentor['performance'] && $mentor['performance'] > 0){
                                                        echo '<i class="fa-solid fa-star text-warning px-1"></i>';
                                                    }else{
                                                        echo '<i class="fa-solid fa-star text-secondary px-1"></i>';
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        if (!empty($mentor['feedback'])){
                                            ?>
                                            <tr>
                                                <td colspan="2" class="fw-bold">More feedback:</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-control"><?php echo $mentor['feedback']; ?></div>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                                <input name="rate" value="rate" type="hidden">

                                <input name="commitment" value="<?php echo $mentor['commitment']; ?>" type="hidden">
                                <input name="communication" value="<?php echo $mentor['communication']; ?>" type="hidden">
                                <input name="involvement" value="<?php echo $mentor['involvement']; ?>" type="hidden">
                                <input name="performance" value="<?php echo $mentor['performance']; ?>" type="hidden">

                                <input name="id" value="<?php echo $mentor['r_id']; ?>" type="hidden">
                                <input name="mentor_id" value="<?php echo $mentor['mentor_id']; ?>" type="hidden">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <input type="submit" hidden name="status" value="decline" id="a5">
                                    <label for="a5" class="btn btn-danger">Reject rating</label>

                                    <input type="submit" hidden name="status" value="approve" id="a2">
                                    <label for="a2" class="btn btn-primary">Accept rating</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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