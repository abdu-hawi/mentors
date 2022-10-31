<?php
include 'session.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['userinfo']
    && isset($_POST['name'])
    && isset($_POST['branch'])
    && isset($_POST['college'])
    && isset($_POST['major'])
    && isset($_POST['level'])
    && isset($_POST['title'])
    && isset($_POST['subject'])
){
    include 'db.php';
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $college = $_POST['college'];
    $major = $_POST['major'];
    $level = $_POST['level'];
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $user_id = $_SESSION['userinfo']['id'];

    $qry = "INSERT INTO `tutoring` (`name`, `branch`, `college`, `major`, `level`, 
                        `title`, `subject`,  `user_id`) 
VALUES ('".$name."', '".$branch."', '".$college."', '".$major."', '".$level."', '".$title."', '".$subject."', '".$user_id."')";
    $qry = mysqli_query($conn, $qry);
    $id = $conn->insert_id;
    if($qry){
        header('Location: ../show_tutoring.php?tutoring='.$id);
    }else{
        header('Location: ../tutoring.php');
    }
}
