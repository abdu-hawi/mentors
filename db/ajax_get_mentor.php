<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'
    || !isset($_POST['branch'])
    || !isset($_POST['level'])
    || !isset($_POST['gender'])
    || !isset($_POST['college'])
){
    echo json_encode(['status' => false]);
}else{
    include 'db.php';
    $qry = "SELECT * FROM `users` WHERE `status` = 'active' AND 
                            `branch` = '".$_POST['branch']."' AND
                            `level` = '".$_POST['level']."' AND
                            `gender` = '".$_POST['gender']."' AND
                            `college` = '".$_POST['college']."' 
                            ";
    $qry = mysqli_query($conn, $qry);

    $mentors = [];
    while ($row = $qry->fetch_assoc()){
        unset($row['password']);
        $mentors[] = $row;
    }

    echo json_encode(['status' => true, 'mentors' => $mentors]);
}