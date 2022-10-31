<?php
$tutoring_id = $_GET['tutoring'];
include 'db/db.php';
if (session_status() != PHP_SESSION_ACTIVE) {
    require 'db/session.php';
}
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['close'])){
    mysqli_query($conn,"UPDATE `tutoring` SET `status` = '1' WHERE `id` = ".$tutoring_id);
    header('Location: '.$_SERVER['PHP_SELF'].'?tutoring='.$tutoring_id);
}
if( $_SERVER['REQUEST_METHOD'] == 'POST'
    && $_POST['replay']
    && $_POST['replay_id']
    && $_POST['replay_name']
) {
    $conn->begin_transaction();
    try {
        $qry_ins = "INSERT INTO `tutoring_replays` 
    (`replay`, `replay_user_id`, `tutoring_id`, `replay_name`) 
    VALUES ('".$_POST['replay']."', '".$_POST['replay_id']."', '".$tutoring_id."', '".$_POST['replay_name']."')";
        mysqli_query($conn, $qry_ins);
        mysqli_query($conn,"UPDATE `tutoring` SET `status` = '0' WHERE `id` = ".$tutoring_id);

        $conn->commit();
        header('Location: '.$_SERVER['PHP_SELF'].'?tutoring='.$tutoring_id);
    }catch (Exception $exception){
        $conn->rollback();
    }
}
$qry = "SELECT * FROM `tutoring_replays` 
    RIGHT JOIN `tutoring` ON `tutoring`.`id` = `tutoring_replays`.`tutoring_id`
    HAVING `tutoring`.`id` = ".$tutoring_id ;
$qry = mysqli_query($conn, $qry);

$tutorings = [];
while ($row = $qry->fetch_assoc()){
    $tutorings[] = $row;
}
require 'header.php';
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Show tutoring - <?php echo $tutorings[0]['title'] ?></h2>
                <p></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="tutoring.php">Tutoring</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Show tutoring - <?php echo $tutorings[0]['title'] ?></span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php
        if ($tutorings[0]['status']){
            ?>
            <div class="alert alert-danger text-center">
                This tutoring is closed
                <br>
                <?php
                if ($_SESSION['userinfo']['level'] < 5){
                    ?>
                    If you want to reopen, just write new replay
                    <?php
                }
                ?>
            </div>
            <?php
        }else{
        ?>
            <form method="post">
                <input type="hidden" value="close" name="close">
                <button type="submit" class="btn btn-danger">Close tutoring</button>
            </form>
        <?php
        }
        ?>
        <div class="row">
            <div class="card w-100 my-2">
                <div class="card-header">
                    <span class="float-lg-left font-weight-bold"><?php echo $tutorings[0]['name']; ?></span>
                    <span class="float-lg-right"><?php echo $tutorings[0]['created_at']; ?></span>
                </div>
                <div class="card-body">
                    <?php echo $tutorings[0]['subject']; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($tutorings as $tutoring){
                if (!empty($tutoring['updated_at'])){
                    ?>
                    <div class="card w-100 my-2">
                        <div class="card-header">
                            <span class="float-lg-left font-weight-bold"><?php echo $tutoring['replay_name']; ?></span>
                            <span class="float-lg-right"><?php echo $tutoring['updated_at']; ?></span>
                        </div>
                        <div class="card-body">
                            <?php echo $tutoring['replay']; ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="row mt-4">
            <form method="post" class="col-12">
                <div class="form-group col-12">
                    <label class="text-dark" for="replay" style="font-weight: 600">Replay</label>
                    <textarea class="form-control" id="replay" name="replay" rows="7"></textarea>
                </div>
                <input type="hidden" name="replay_id" value="<?php echo $_SESSION['userinfo']['id'] ?>">
                <input type="hidden" name="replay_name" value="<?php echo $_SESSION['userinfo']['name'] ?>">
                <button class="form-group btn btn-primary col-2" type="submit">Add replay</button>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>