<?php
include 'header.php';
include 'db/db.php';
$qry = "SELECT * FROM `faqs`";
$qry = mysqli_query($conn, $qry);

$faqs = [];
while ($row = $qry->fetch_assoc()){
    $faqs[] = $row;
}
?>


<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-0">FAQs</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">FAQs</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <?php
        foreach ($faqs as $faq){
        ?>
            <div class="card mb-2">
                <div class="card-header" data-toggle="collapse" data-target="#collapse<?php echo $faq['id'] ; ?>" >
                    <?php echo $faq['question'] ; ?>
                </div>
                <div class="card-body collapse" id="collapse<?php echo $faq['id'] ; ?>">
                    <?php echo $faq['answer'] ; ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>


<?php include 'footer.php';