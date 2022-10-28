<?php
require 'header.php';
require 'db/db.php';
if ($_SESSION['userinfo']['level'] > 4){
    $col = "mentor_id";
}else{
    $col = "mentee_id";
}
$qry = "SELECT * FROM `tickets` WHERE `".$col."` = ".$_SESSION['userinfo']['id'];
$qry = mysqli_query($conn, $qry);
$tickets = [];
while ($row = $qry->fetch_assoc()){
    unset($row['password']);
    $tickets[] = $row;
}
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Communication</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Communication</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php
        if ($_SESSION['userinfo']['level'] < 5){
            echo '<a href="new_ticket.php" class="btn btn-primary">New Ticket</a>';
        }
        ?>
        <div class="row">
            <table class="table mt-2">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="w-50">Title</th>
                    <th class="w-25 text-center">Status</th>
                    <th class="w-25 text-center">Date</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                foreach ($tickets as $ticket){
                    ?>
                    <tr>
                        <td><?php echo $ticket['id'] ?></td>
                        <td><?php echo $ticket['title'] ?></td>
                        <?php
                            $text_color = '';
                            switch ($ticket['status']){
                                case 'new': {
                                    $text_color = 'success'; break;
                                }
                                case 'closed': {
                                    $text_color = 'dark'; break;
                                }
                                case 'mentee': {
                                    $text_color = 'primary'; break;
                                }
                                case 'mentor': {
                                    $text_color = 'warning'; break;
                                }
                            }
                            echo '<td class="text-center font-weight-bold text-'.$text_color.'">'.$ticket['status'].'</td>';
                        ?>
                        <td class="text-center"><?php echo $ticket['updated_at'] ?></td>
                        <td class="text-center">
                            <a href="show_ticket.php?ticket=<?php echo $ticket['id'] ?>"
                               class="btn btn-info" style="cursor: pointer">Show</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php
include 'footer.php';