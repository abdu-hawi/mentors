<?php
include '../db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'])){
    mysqli_query($conn, 'UPDATE `users` SET `status` = "'.$_POST['status'].'" WHERE id = '.$_POST['id']);
    header('Location: '.$_SERVER['PHP_SELF']);
}elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){
    if ($_POST['pwd'] !== $_POST['password']){
        die("Password and confirm not match");
    }
    mysqli_query($conn, 'UPDATE `users` SET `password` = "'.md5(trim($_POST['password'])).'" WHERE id = '.$_POST['id']);
    header('Location: '.$_SERVER['PHP_SELF']);
}elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
    mysqli_query($conn, 'DELETE FROM `users` WHERE id = '.$_POST['id']);
    header('Location: '.$_SERVER['PHP_SELF']);
}elseif ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
isset($_POST['id']) && !empty($_POST['id']) &&
isset($_POST['name']) && !empty($_POST['name']) &&
isset($_POST['email']) && !empty($_POST['email']) &&
isset($_POST['password']) && !empty($_POST['password']) &&
isset($_POST['mobile']) && !empty($_POST['mobile']) &&
isset($_POST['pwd']) && !empty($_POST['pwd'])
){
    if ($_POST['pwd'] !== $_POST['password']){
        die("Password and confirm not match");
    }
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    $mobile = trim($_POST['mobile']);
    $qry = "INSERT INTO `users` (`id`, `name`, `email`,  `password`, `mobile`, `type`) VALUES
        ('".$id."', '".$name."', '".$email."',  '".$password."','".$mobile."', 'academic')";

    if (mysqli_query($conn, $qry)) {
        header('Location: '.$_SERVER['PHP_SELF']);
    } else {
        die("Something is error");
    }
}
include 'header.php';
//SELECT * FROM `users`
$qry = "SELECT * FROM `users` WHERE `type` = 'academic'";
$qry = mysqli_query($conn, $qry);

$mentors = [];
while ($row = $qry->fetch_assoc()){
    unset($row['password']);
    $mentors[] = $row;
}
?>

        <div class="container-fluid px-4">
            <div class="row mb-2">
                <h3 class="fs-4">Academics</h3>
                <button class="btn btn-success col-2" data-bs-toggle="collapse" href="#collapse">Add new academic</button>
            </div>
            <div class="collapse" id="collapse">
                <form class="col-12" method="post">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="id">ID</label>
                            <input type="number" name="id" id="id" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="fullname">Full name</label>
                            <input type="text" name="name" id="fullname" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="telephone">Telephone</label>
                            <input type="tel" name="mobile" id="telephone" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="pword">Password</label>
                            <input type="password" name="password" id="pword" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="pword2">Re-type Password</label>
                            <input type="password" name="pwd" id="pword2" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 mb-4 px-5">
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mb-5">
                <table class="table bg-white rounded shadow-sm">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" class="w-50">Name</th>
                        <th scope="col" class="w-25">Email</th>
                        <th scope="col" class="w-25">Phone</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($mentors as $mentor){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $mentor['id']; ?></th>
                            <td><?php echo $mentor['name']; ?></td>
                            <td><?php echo $mentor['email']; ?></td>
                            <td><?php echo $mentor['mobile']; ?></td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-info mx-2 btn-sm"  data-bs-toggle="collapse" href="#row<?php echo $mentor['id']; ?>">
                                    Edit
                                </button>
                            </td>
                            <td class="text-center">
                                <form method="post">
                                    <?php
                                    if ($mentor['status'] == 'active')
                                        echo '<input type="hidden" name="status" value="deactive">
                                        <input type="hidden" name="id" value="'.$mentor['id'].'">
                                        <button type="submit" class="btn btn-warning btn-sm">Deactivate</button>';
                                    else
                                        echo '<input type="hidden" name="status" value="active">
                                        <input type="hidden" name="id" value="'.$mentor['id'].'">
                                        <button type="submit" class="btn btn-success btn-sm">Activate</button>';
                                    ?>
                                </form>
                            </td>
                            <td class="text-center">
                                <form method="post">
                                    <?php
                                    echo '<input type="hidden" name="delete" value="delete">
                                        <input type="hidden" name="id" value="'.$mentor['id'].'">
                                        <button type="submit" class="btn btn-danger mx-2 btn-sm">Delete</button>';
                                    ?>
                                </form>
                            </td>
                        </tr>
                        <tr class="p-0 collapse" id="row<?php echo $mentor['id']; ?>">
                            <td colspan="7">
                                <form class="col-12" method="post">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $mentor['id']; ?>">
                                        <input type="hidden" name="edit" value="edit">
                                        <div class="col-md-4 form-group">
                                            <label for="pword">Password</label>
                                            <input type="password" name="password" id="pword" class="form-control form-control-lg">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="pword2">Re-type Password</label>
                                            <input type="password" name="pwd" id="pword2" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Save edite" class="btn btn-primary btn-sm mt-2 px-5">
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
</div>

<script src="../js/bootstrap-5.0.0.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>