<?php
include ("db/db.php");
$ticket_id = $_GET['ticket'];
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (session_status() != PHP_SESSION_ACTIVE) {
        require 'db/session.php';
    }
    $conn->begin_transaction();
    try {
        $email = trim($_POST['email']);
        $user_id = $_SESSION['userinfo']['id'];
        $subject = trim($_POST['subject']);
        $qry_replay = "INSERT INTO `ticket_replays` (`subject`, `ticket_id`, `user_id`) 
                VALUES ('".$subject."', '".$ticket_id."', '".$user_id."')";
        mysqli_query($conn, $qry_replay);
        if ($_SESSION['userinfo']['level'] > 4){
            $user_type = 'mentor';
        }else{
            $user_type = 'mentee';
        }
        $qry_ticket = "UPDATE `tickets` SET `status` = '".$user_type."' WHERE `id` = ".$ticket_id;
        mysqli_query($conn, $qry_ticket);

        include 'url.php';
        $url = url()['url'] . $_SERVER['HTTP_HOST'] . url()['path'];//.'?ticket='.$ticket_id;
        include 'sendEmail.php';
        $body = '<b>'.$_SESSION['userinfo']['name']."</b> sent new replay <br>
To show ticket, please click button below <br> 
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
   Show ticket 
</button>

</a>
<hr>
If you are can't click button you copy and past link bellow in your browser
<br>".$url ;
        send($email, 'New replay', $body);

        $conn->commit();
        header('Location: '.$_SERVER['PHP_SELF'].'?ticket='.$ticket_id);
    }catch (Exception $exception){
        $conn->rollback();
    }
}
require 'header.php';
$qry = "SELECT `ticket_replays`.*,`tickets`.* , `users`.`id` as `u_id`, `users`.`name`, `users`.`email` 
    FROM `ticket_replays` 
    JOIN `tickets` ON `ticket_replays`.`ticket_id` = `tickets`.`id`";
    if ($_SESSION['userinfo']['level'] > 4){
        $qry .= "JOIN `users` ON `tickets`.`mentee_id` = `users`.`id`";
    }else{
        $qry .= "JOIN `users` ON `tickets`.`mentor_id` = `users`.`id`";
    }
$qry .= "HAVING `ticket_id` = '".$ticket_id."'
    ORDER BY `ticket_replays`.`created_at` desc ";

$qry = mysqli_query($conn, $qry);
$tickets = [];
while ($rows = $qry->fetch_assoc()){
    $tickets[] = $rows;
}
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Ticket - <?php echo $tickets[0]['title']; ?></h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="communicate.php">Communication</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Ticket - <?php echo $tickets[0]['title']; ?></span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    New replay
                </a>
            </p>
            <div class="collapse col-12" id="collapseExample">
                <form method="post" class="col-12">
                    <div class="form-group col-12">
                        <label class="text-dark" for="subject" style="font-weight: 600">Subject</label>
                        <textarea class="form-control" id="subject" name="subject" rows="7"></textarea>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $tickets[0]['email'] ?>">
                    <button class="form-group btn btn-primary col-2" type="submit">Add replay</button>
                </form>
            </div>

        </div>
        <div class="row">
            <?php
            foreach ($tickets as $ticket){
                if ($ticket['user_id'] == $_SESSION['userinfo']['id']){
                    $name = $_SESSION['userinfo']['name'];
                }else{
                    $name = $ticket['name'];
                }
                ?>
                <div class="card w-100 my-2">
                    <div class="card-header">
                        <span class="float-lg-left font-weight-bold"><?php echo $name; ?></span>
                        <span class="float-lg-right"><?php echo $ticket['created_at']; ?></span>
                    </div>
                    <div class="card-body">
                        <?php echo $ticket['subject']; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';