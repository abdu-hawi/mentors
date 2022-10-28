<?php
include '../db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'])){
    mysqli_query($conn, 'UPDATE `users` SET `status` = "'.$_POST['status'].'" WHERE id = '.$_POST['id']);
    header('Location: '.$_SERVER['PHP_SELF']);
}
include 'header.php';
//SELECT * FROM `users`
$qry = "SELECT * FROM `users` WHERE `level` > 4";
$qry = mysqli_query($conn, $qry);

$mentors = [];
while ($row = $qry->fetch_assoc()){
    unset($row['password']);
    $mentors[] = $row;
}
?>

<div class="container-fluid px-4">

    <div class="row my-5">
        <h3 class="fs-4 mb-3">Mentors</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                <tr>
                    <th scope="col" width="50">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">College</th>
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
                        <td>Level <?php echo $mentor['level']; ?></td>
                        <td><?php echo $mentor['college']; ?></td>
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
</div>
<!-- /#page-content-wrapper -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>

</html>