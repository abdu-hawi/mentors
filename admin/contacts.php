<?php
include '../db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
    mysqli_query($conn, 'DELETE FROM `contacts` WHERE id = '.$_POST['id']);
    header('Location: '.$_SERVER['PHP_SELF']);
}
include 'header.php';
//SELECT * FROM `users`
$qry = "SELECT * FROM `contacts`";
$qry = mysqli_query($conn, $qry);

$contacts = [];
while ($row = $qry->fetch_assoc()){
    $contacts[] = $row;
}
?>

        <div class="container-fluid px-4">
            <div class="row mb-2">
                <h3 class="fs-4">Contacts</h3>
            </div>
            <div class="row mb-5">
                <table class="table bg-white rounded shadow-sm">
                    <thead>
                    <tr>
                        <th scope="col" class="w-50">Name</th>
                        <th scope="col" class="w-25">Email</th>
                        <th scope="col" class="w-25">Title</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($contacts)>0){
                        foreach ($contacts as $contact){
                            ?>
                            <tr>
                                <td><?php echo $contact['name']; ?></td>
                                <td><?php echo $contact['email']; ?></td>
                                <td><?php echo $contact['title']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info mx-2 btn-sm" data-bs-toggle="collapse" href="#show<?php echo $contact['id']; ?>">
                                        Show
                                    </button>
                                </td>
                                <td class="text-center">
                                    <a href="mailto:<?php echo $contact['email']; ?>" type="button" class="btn btn-success mx-2 btn-sm" >
                                        Replay
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form method="post">
                                        <?php
                                        echo '<input type="hidden" name="delete" value="delete">
                                        <input type="hidden" name="id" value="'.$contact['id'].'">
                                        <button type="submit" class="btn btn-danger mx-2 btn-sm">Delete</button>';
                                        ?>
                                    </form>
                                </td>
                            </tr>
                            <tr class="p-0 collapse" id="show<?php echo $contact['id']; ?>">
                                <td colspan="6">
                                    <?php echo $contact['subject']; ?>
                                </td>
                            </tr>

                            <?php
                        }
                    }else{
                        echo '<tr>
                                <td colspan="6" class="text-center bg-dark bg-gradient text-danger py-5 fw-bold">
                                    You don\'t have any Contact yet
                                </td>
                            </tr>';
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