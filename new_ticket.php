<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    require 'db/session.php';
}
//die($_SESSION['userinfo']['level'] . '|' .$_SESSION['userinfo']['supervisor_id']);
if ($_SESSION['userinfo']['level'] > 4 || empty($_SESSION['userinfo']['supervisor_id'])) {
    die('Forbidden Access');
}
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include 'db/db.php';
    $conn->begin_transaction();
    try {
        $mentee_id = $_SESSION['userinfo']['id'];
        $mentor_id = $_SESSION['userinfo']['supervisor_id'];
        $title = trim($_POST['title']);
        $subject = trim($_POST['subject']);
        $qry_ticket = "INSERT INTO `tickets` (`title`, `mentee_id`, `mentor_id`) 
                        VALUES ('".$title."',  '".$mentee_id."', '".$mentor_id."')";
        $qry_ticket = mysqli_query($conn, $qry_ticket);
        $ticket_id = $conn->insert_id;
        $qry_replay = "INSERT INTO `ticket_replays` (`subject`, `ticket_id`, `user_id`) 
                VALUES ('".$subject."', '".$ticket_id."', '".$mentee_id."')";
        mysqli_query($conn, $qry_replay);

        $qry = "SELECT `email` FROM `users` WHERE `id` = '".$mentor_id."'";
        $qry = mysqli_query($conn, $qry);
        $email = $qry->fetch_assoc()['email'];

        include 'url.php';
        $url = url()['url'] . $_SERVER['HTTP_HOST'] . url()['path'].'/show_ticket.php?ticket='.$ticket_id;
        include 'sendEmail.php';
        $body = 'Mentee <b>'.$_SESSION['userinfo']['name']."</b> sent new ticket <br>
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
        send($email, 'New ticket', $body);

        $conn->commit();
        header('Location: show_ticket.php?ticket='.$ticket_id);
        return;
    }catch (Exception $exception){
        $conn->rollback();
        die($exception);
    }
}
require 'header.php';
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">New ticket</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">New ticket</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <form method="post" class="col-12">
                <div class="form-group col-12">
                    <label class="text-dark" for="title" style="font-weight: 600">Title</label>
                    <input class="form-control col-md-4" name="title" type="text" id="title">
                </div>
                <div class="form-group col-12">
                    <label class="text-dark" for="subject" style="font-weight: 600">Subject</label>
                    <textarea class="form-control" id="subject" name="subject" rows="7"></textarea>
                </div>
                <button class="form-group btn btn-primary col-2" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'footer.php';