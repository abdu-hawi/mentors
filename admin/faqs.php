<?php
include '../db/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
    mysqli_query($conn, 'DELETE FROM `faqs` WHERE id = '.$_POST['id']);
    header('Location: '.$_SERVER['PHP_SELF']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' &&
isset($_POST['question']) && !empty($_POST['question']) &&
isset($_POST['answer']) && !empty($_POST['answer'])
){
    $question = trim($_POST['question']);
    $answer = strip_tags(trim($_POST['answer']));
    $answer = str_replace("'","\"",$answer);
    $qry = "INSERT INTO `faqs` (`question`, `answer`) VALUES
        ('".$question."', '".$answer."')";
    if (mysqli_query($conn, $qry)) {
        header('Location: '.$_SERVER['PHP_SELF']);
    } else {
        die("Something is error");
    }
}
include 'header.php';
//SELECT * FROM `users`
$qry = "SELECT * FROM `faqs`";
$qry = mysqli_query($conn, $qry);

$faqs = [];
while ($row = $qry->fetch_assoc()){
    $faqs[] = $row;
}
?>

        <div class="container-fluid px-4">
            <div class="row mb-2">
                <h3 class="fs-4">FAQs</h3>
                <button class="btn btn-success col-2" data-bs-toggle="collapse" href="#collapse">Add new FAQs</button>
            </div>
            <div class="collapse" id="collapse">
                <form class="col-12" method="post">
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" id="question" class="form-control form-control-lg">
                        </div>
                        <div class="col-12 form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" id="answer" class="form-control form-control-lg"></textarea>
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
                        <th scope="col" class="w-100">Question</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($faqs)>0){
                        foreach ($faqs as $faq){
                            ?>
                            <tr>
                                <td><?php echo $faq['question']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info mx-2 btn-sm" data-bs-toggle="collapse" href="#show<?php echo $faq['id']; ?>">
                                        Show
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success mx-2 btn-sm"  data-bs-toggle="collapse" href="#edit<?php echo $faq['id']; ?>">
                                        Edit
                                    </button>
                                </td>
                                <td class="text-center">
                                    <form method="post">
                                        <?php
                                        echo '<input type="hidden" name="delete" value="delete">
                                        <input type="hidden" name="id" value="'.$faq['id'].'">
                                        <button type="submit" class="btn btn-danger mx-2 btn-sm">Delete</button>';
                                        ?>
                                    </form>
                                </td>
                            </tr>
                            <tr class="p-0 collapse" id="edit<?php echo $faq['id']; ?>">
                                <td colspan="4">
                                    <form class="col-12" method="post">
                                        <div class="row">
                                            <input type="hidden" name="id" value="<?php echo $faq['id']; ?>">
                                            <input type="hidden" name="edit" value="edit">
                                            <div class="col-md-12 form-group">
                                                <label for="answer">Answer</label>
                                                <textarea name="answer" id="answer" class="form-control form-control-lg"><?php echo $faq['answer']; ?></textarea>
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
                            <tr class="p-0 collapse" id="show<?php echo $faq['id']; ?>">
                                <td colspan="4">
                                    <?php echo $faq['answer']; ?>
                                </td>
                            </tr>

                            <?php
                        }
                    }else{
                        echo '<tr>
                                <td colspan="4" class="text-center bg-dark bg-gradient text-danger py-5 fw-bold">
                                    You don\'t have any FAQs yet
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