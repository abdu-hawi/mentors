<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die("Forbidden Access This Page");
}
include ("db.php");
include ("session.php");
$password = '';
if (isset($_POST['current_password']) && !empty($_POST['current_password'])){
    $qry = "SELECT * FROM `users` WHERE `email` = '".$_SESSION['userinfo']['email']."' AND `password` = '".md5($_POST['current_password'])."'";
    $qry = mysqli_query($conn, $qry);
    if ($qry->num_rows == 0){
        die("Current password is not correct");
    }
    $password = $qry->fetch_assoc()['password'];
}else {
    die('Current password required to update your profile');
}

if (
    isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['gender']) && !empty($_POST['gender']) &&
    isset($_POST['date_of_birthday']) && !empty($_POST['date_of_birthday']) &&
    isset($_POST['college']) && !empty($_POST['college']) &&
    isset($_POST['level']) && !empty($_POST['level']) &&
    isset($_POST['major']) && !empty($_POST['major']) &&
    isset($_POST['branch']) && !empty($_POST['branch']) &&
    isset($_POST['mobile']) && !empty($_POST['mobile'])
){
    if ($_POST['pwd'] !== $_POST['password']){
        die("Password and confirm not match");
    }

    if (isset($_POST['password']) && !empty($_POST['password'])){
        $password = md5(trim($_POST['password']));
    }
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $branch = trim($_POST['branch']);
    $date_of_birthday = trim($_POST['date_of_birthday']);
    $college = trim($_POST['college']);
    $level = trim($_POST['level']);
    $major = trim($_POST['major']);
    $mobile = trim($_POST['mobile']);

    $qry_update = "UPDATE `users` SET `id`= ".$id." , `name`='".$name."',
                   `email`='".$email."',`gender`='".$gender."', `password`='".$password."',
                   `date_of_birthday`='".$date_of_birthday."',`college`='".$college."',
                   `level`='".$level."',`major`='".$major."',
                   `mobile`='".$mobile."' ,
                   `branch`='".$branch."' 
                   WHERE `id` = ".$_SESSION['userinfo']['id']." 
                   AND `email` = '".$_SESSION['userinfo']['email']."'";

    if (mysqli_query($conn, $qry_update)) {
        $qry_se = "SELECT * FROM `users` WHERE `email` = '".$_POST['email']."' AND `password` = '".$password."'";
        $qry_se = mysqli_query($conn, $qry_se);
        $user = $qry_se->fetch_assoc();
        $user['password'] = null;
        $_SESSION['userinfo'] = $user;
        header('Location: ../my_profile.php');
    } else {
        die("Something is error");
    }
}else{
    die("All fields required");
}
