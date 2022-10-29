<?php
require '../db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['rate'])
    && isset($_POST['mentor_id'])
){
    $conn->begin_transaction();
    try {
        $qry = "UPDATE `rates` SET `is_add_volunteer_hours` = '1' WHERE `id` = ".$_POST['id'];
        mysqli_query($conn, $qry);
        $email = $_POST['email'];
        $mentor_id = $_POST['mentor_id'];

        $qry_sel = mysqli_query($conn, "SELECT `volunteer_hour` FROM `users` WHERE `id` =".$mentor_id);
        $qry_sel = $qry_sel->fetch_assoc()['volunteer_hour'];
        $volunteer_hour = floatval($qry_sel) + floatval($_POST['rate']);
        mysqli_query($conn , "UPDATE `users` SET `volunteer_hour` = '".$volunteer_hour."' WHERE `id` = ".$mentor_id);

        $qry_academic = mysqli_query($conn, "SELECT * FROM `academic` LIMIT 1");
        if ($qry_academic->num_rows > 0){
            $qry_academic =  $qry_academic->fetch_assoc()['volunteer_hour'];
            $volunteer_hour = floatval($qry_academic) + floatval($_POST['rate']);
            mysqli_query($conn, "UPDATE `academic` SET `volunteer_hour` = ".$volunteer_hour);
        }else{
            mysqli_query($conn, "INSERT INTO `academic` (`volunteer_hour`) VALUES ('".$_POST['rate']."')");
        }
        sendEmail($email, 'You can now print your certificate', 'Your certificate publish');
        $conn->commit();

        header('Location: '.$_SERVER['PHP_SELF']);
    }catch (Exception $exception){
        $conn->rollback();
        die($exception);
    }

}
function sendEmail($email, $bodyText, $subject):void{
    include '../url.php';
    $url = url()['url'] . $_SERVER['HTTP_HOST'] . url()['path'].'/my_page.php';
    include '../sendEmail.php';
    $body = $bodyText." <br> 
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
   Click here 
</button>

</a>
<hr>
If you are can't click button you copy and past link bellow in your browser
<br>".$url ;
    send($email, $subject, $body);
}
include 'header.php';
$qry = "SELECT `rates`.*,`rates`.`id` as `r_id`, `users`.* FROM `rates` 
        JOIN `users` ON `rates`.`mentor_id` = `users`.`id`                   
        WHERE `rates`.`status` = 'approve' AND `is_add_volunteer_hours` = false";

$qry = mysqli_query($conn, $qry);
$mentors = [];
while ($rows = $qry->fetch_assoc()) {
    unset($rows['password']);
    $rows['rate'] =  intval($rows['commitment']) +
            intval($rows['communication']) +
            intval($rows['involvement']) +intval($rows['performance'])  ;
    $mentors[] = $rows;
}

?>
<div class="container-fluid px-4">
    <div class="row g-3 my-2 justify-content-center align-items-center">
        <table class="table table-light w-75">
            <thead>
            <tr>
                <th>Name</th>
                <th class="text-center">Star rating</th>
                <th class="text-center">Add volunteer hours</th>
            </tr>
            </thead>
            <?php
            foreach ($mentors as $mentor){
            ?>
                <tr>
                    <td><?php echo $mentor['name']; ?></td>
                    <td class="text-center"><?php echo $mentor['rate']; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#volModal<?php echo $mentor['mentor_id']; ?>">
                            <i class="fa fa-plus"></i>
                        </button>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="volModal<?php echo $mentor['mentor_id']; ?>" tabindex="-1"
                     aria-labelledby="volModal<?php echo $mentor['mentor_id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rateModal<?php echo $mentor['mentor_id']; ?>">
                                    Mentor: <?php echo $mentor['name']; ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" class="col-12">
                                <div class="modal-body">
                                    <div class="mb-4">
                                        <span class="fw-bold">Rate: <?php echo $mentor['rate']; ?> stars</span>
                                    </div>
                                    <select class="form-select" name="rate" aria-label=".form-select-sm example">
                                        <option selected>Open this select menu</option>
                                        <option value="2">20 stars => 2 hours</option>
                                        <option value="1.5">15 stars => 1.5 hours</option>
                                        <option value="1">10 stars => 1 hours</option>
                                        <option value=".5">5 stars => .5 hours</option>
                                    </select>
                                </div>

                                <input name="id" value="<?php echo $mentor['r_id']; ?>" type="hidden">
                                <input name="mentor_id" value="<?php echo $mentor['mentor_id']; ?>" type="hidden">
                                <input name="email" value="<?php echo $mentor['email']; ?>" type="hidden">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="status" value="Add"  class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </table>
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