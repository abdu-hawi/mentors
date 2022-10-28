<?php
include 'db/session.php';
include 'db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_POST['mentee_id'])
    && isset($_POST['r_id'])
    && isset($_POST['mentee_email'])
    && isset($_POST['status']) ) {
    if ($_POST['status'] == 'accept'){
        accept($conn, $_POST['mentee_email']);
    }else{
        mysqli_query($conn, "UPDATE `requests` SET `status` = 'decline'");
    }
    header('Location: '.$_SERVER['PHP_SELF']);
}
function accept($conn, $email):void{
    $conn->begin_transaction();
    try {
        mysqli_query($conn, "DELETE FROM `requests` WHERE `mentee_id` = ".$_POST['mentee_id']);
        mysqli_query($conn, "UPDATE `users` SET `supervisor_id` = ".$_SESSION['userinfo']['id']." WHERE `id` = ".$_POST['mentee_id']);
        include 'url.php';
        $url = url()['url'] . $_SERVER['HTTP_HOST'] . url()['path'].'/communicate.php';
        include 'sendEmail.php';
        $body = 'Mentor <b>'.$_SESSION['userinfo']['name']."</b> accepted your request <br>
To communate with him/her click button below <br> 
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
   Click here to communaction 
</button>

</a>
<hr>
If you are can't click button you copy and past link bellow in your browser
<br>".$url ;
        send($email, 'Accepted your request', $body);
        $conn->commit();
    }catch (Exception $exception){
        $conn->rollback();
        die($exception);
    }
}

if(!$_SESSION['userinfo']) {
    header('Location: index.php');
}

$qry = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['userinfo']['email']."'";
$qry = mysqli_query($conn, $qry);
if ($qry->num_rows == 0){
    die("Forbidden access ....!!!");
}
$user = $qry->fetch_assoc();
$user['password'] = null;
$_SESSION['userinfo'] = $user;

$mentees = [];
$my = '';
$isMentor = false;
if ($_SESSION['userinfo']['level'] > 4){
    $my = 'New mentees';
    $isMentor = true;
    $qry = "SELECT `requests`.`id` as `r_id`, `mentee_id`, `mentor_id`, `requests`.`status` as `r_status`, `users`.* FROM `requests` 
    JOIN `users` ON `users`.`id` = `requests`.`mentee_id` WHERE `mentor_id` = ".$_SESSION['userinfo']['id'] ;
    $qry_mentee = "SELECT * FROM `users` WHERE `supervisor_id` = ".$_SESSION['userinfo']['id'] ;
    $qry_mentee = mysqli_query($conn, $qry_mentee);
    while ($rows = $qry_mentee->fetch_assoc()){
        $mentees[] = $rows;
    }
}else{
    $my = 'My mentor';
    $qry = "SELECT * FROM `users` WHERE `id` = ".$_SESSION['userinfo']['supervisor_id'] ;
}

$users = [];

if (!empty($_SESSION['userinfo']['supervisor_id']) || $_SESSION['userinfo']['level'] > 4){
    $qry = mysqli_query($conn, $qry);
    while ($row = $qry->fetch_assoc()){
        $users[] = $row;
    }
}

include 'header.php';