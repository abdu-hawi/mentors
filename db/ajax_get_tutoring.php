<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'
    || !isset($_POST['branch'])
    || !isset($_POST['level'])
    || !isset($_POST['college'])
){
    echo json_encode(['status' => false]);
}else{
    include 'db.php';
    $qry = "SELECT `tutoring`.*, COUNT(`tutoring_id`) AS `replay_count`, `updated_at` 
    FROM `tutoring` 
    LEFT JOIN `tutoring_replays` ON `tutoring_replays`.`tutoring_id` = `tutoring`.`id`
    GROUP BY 1
    HAVING
    `branch` = '".$_POST['branch']."' AND
    `level` = '".$_POST['level']."' AND
    `college` = '".$_POST['college']."' 
    ORDER BY `tutoring`.`id` DESC 
                            ";
    $qry = mysqli_query($conn, $qry);

    $tutorings = [];
    while ($row = $qry->fetch_assoc()){
        unset($row['password']);
        $tutorings[] = $row;
    }

    echo json_encode(['status' => true, 'tutorings' => $tutorings]);
}