<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die("Forbidden Access This Page");
}
if (
    isset($_POST['id']) && !empty($_POST['id']) &&
    isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['gender']) && !empty($_POST['gender']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['date_of_birthday']) && !empty($_POST['date_of_birthday']) &&
    isset($_POST['college']) && !empty($_POST['college']) &&
    isset($_POST['level']) && !empty($_POST['level']) &&
    isset($_POST['major']) && !empty($_POST['major']) &&
    isset($_POST['mobile']) && !empty($_POST['mobile']) &&
    isset($_POST['branch']) && !empty($_POST['branch']) &&
    isset($_POST['pwd']) && !empty($_POST['pwd'])
){
    if ($_POST['pwd'] !== $_POST['password']){
        die("Password and confirm not match");
    }
    include ("db.php");

    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $password = md5(trim($_POST['password']));
    $date_of_birthday = trim($_POST['date_of_birthday']);
    $college = trim($_POST['college']);
    $level = trim($_POST['level']);
    $major = trim($_POST['major']);
    $mobile = trim($_POST['mobile']);
    $branch = trim($_POST['branch']);

    $qry = "INSERT INTO `users` (`id`, `name`, `email`, `gender`, `password`, `date_of_birthday`,
                     `college`, `level`, `major`, `mobile`, `branch`) VALUES
        ('".$id."', '".$name."', '".$email."', '".$gender."', '".$password."',
        '".$date_of_birthday."', '".$college."', '".$level."', '".$major."',
         '".$mobile."', '".$branch."')";

    if (mysqli_query($conn, $qry)) {
        header('Location: ../login.php');
    } else {
        die("Something is error");
    }
}else{
    foreach($_POST as $key=>$value)
    {
        echo "$key=$value <br>";
    }
    die("All fields required");
}
