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
        sendEmail($email, 'Mentor <b>'.$_SESSION['userinfo']['name']."</b> accepted your request <br>
To communate with him/her click button below", 'Accepted your request');
        $conn->commit();
    }catch (Exception $exception){
        $conn->rollback();
        die($exception);
    }
}

function sendEmail($email, $bodyText, $subject):void{
    include 'url.php';
    $url = url()['url'] . $_SERVER['HTTP_HOST'] . url()['path'].'/communicate.php';
    include 'sendEmail.php';
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
   Click here to communaction 
</button>

</a>
<hr>
If you are can't click button you copy and past link bellow in your browser
<br>".$url ;
    send($email, $subject, $body);
}

if(!$_SESSION['userinfo']) {
    header('Location: index.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rate'])
){
    if (!isset($_POST['commitment']) && !isset($_POST['communication'])
        && !isset($_POST['involvement']) && !isset($_POST['performance'])){
        die("All rate is required, please again open page and rate");
    }
    $feedback = $_POST['feedback'];
    if (empty($_POST['feedback'])){
        $feedback = NULL;
    }
    $qry_rate = "INSERT INTO `rates` (`commitment`, `communication`, `involvement`, `performance`, `feedback`, `mentor_id`, `mentee_id`) 
                VALUES ('".$_POST['commitment']."', '".$_POST['communication']."', 
                '".$_POST['involvement']."', '".$_POST['performance']."', '".$feedback."',
                 '".$_SESSION['userinfo']['supervisor_id']."', '".$_SESSION['userinfo']['id']."')";
    mysqli_query($conn, $qry_rate);
    sendEmail($_POST['email'], 'Mentee <b>'.$_SESSION['userinfo']['name']."</b> rate you <br>
To show mentee click button below", 'Mentee rate');
    header('Location: '.$_SERVER['PHP_SELF']);
}
$qry = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['userinfo']['email']."'";
$qry = mysqli_query($conn, $qry);
if ($qry->num_rows == 0){
    die("Forbidden access ....!!!");
}
$user = $qry->fetch_assoc();
$user['password'] = null;
$_SESSION['userinfo'] = $user;

$qry_r = "SELECT * FROM `rates` WHERE `mentee_id` = '".$_SESSION['userinfo']['id']."'";
$qry_r = mysqli_query($conn, $qry_r);

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