<?php
include 'db/db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mentor_id'])){
    if (session_status() != PHP_SESSION_ACTIVE) {
        require 'db/session.php';
    }
    $mentee_id = $_SESSION['userinfo']['id'];
    $mentor_id = $_POST['mentor_id'];
    $qry = "INSERT INTO `requests` (`mentee_id`, `mentor_id`) 
            VALUES ('".$mentee_id."', '".$mentor_id."')";
    mysqli_query($conn, $qry);
    header('Location: '.$_SERVER['PHP_SELF']);
}
include 'header.php';
//SELECT * FROM `users`
$qry = "SELECT * FROM `users` WHERE `status` = 'active' AND `level` > 4";
$qry = mysqli_query($conn, $qry);

$mentors = [];
while ($row = $qry->fetch_assoc()){
    unset($row['password']);
    $mentors[] = $row;
}
?>

    <div class="hero-slide owl-carousel site-blocks-cover">
        <a href="about.html">
            <div class="intro-section" style="background-image: url('images/slidshow.jpg');">
            </div>

        </a>

        <a href="about.html">
            <div class="intro-section" style="background-image: url('images/slidshow.jpg');">
            </div>
        </a>

    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Mentors</span>
                    </h2>
                    <p></p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="owl-slide-3 owl-carousel">
                        <?php
                        foreach ($mentors as $mentor){
                            ?>
                            <div class="course-1-item">
                                <figure class="thumnail">
                                    <a href="single.html">
                                        <?php
                                        if ($mentor['gender'] == 'Male'){
                                            $avatar = 'images/man.png';
                                        }else{
                                            $avatar = 'images/woman.png';
                                        }
                                        ?>
                                        <img src="<?php echo $avatar; ?>" alt="Image" class="img-fluid">
                                    </a>

                                    <div class="category">
                                        <h3><?php echo $mentor['name']; ?></h3>
                                    </div>
                                </figure>
                                <div class="course-1-content pt-0 pb-1">
                                    <div class="row text-left">
                                        <span class="font-weight-bold text-dark pr-1 m-0">College </span>
                                        <span class="w-100" style="white-space: nowrap; overflow: hidden;">
                                            <?php echo $mentor['college']; ?>
                                        </span>
                                    </div>
                                    <div class="row justify-content-center py-1 bg-light border-bottom border-top">
                                        <span class="font-weight-bold text-dark">
                                            Level <?php echo $mentor['level']; ?>
                                        </span>
                                    </div>
                                    <div class="row">
                                        <span class="font-weight-bold text-dark pr-1 m-0">Rating</span>
                                        <div class="rating text-center mb-3 w-75">
                                            <?php
                                            for ($i=0; $i<5; $i++){
                                                if ($i < $mentor['rate'] && $mentor['rate'] > 0){
                                                    echo '<span class="icon-star2 text-warning"></span>';
                                                }else{
                                                    echo '<span class="icon-star2 text-secondary"></span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($_SESSION['userinfo'] && empty($_SESSION['userinfo']['supervisor_id'])){
                                        ?>
                                        <form method="post" class="row justify-content-center">
                                            <input type="hidden" name="mentor_id" value="<?php echo $mentor['id']; ?>">
                                            <button type="submit" class="btn btn-primary rounded-0 px-4">Request</button>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>



        </div>
    </div>




    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                        <span>About MyMentor</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <p class="lead">MyMentor development by Muneerah Alsaud, Shurooq AlMalki, May AlharbiTest
                        about us </p>

                </div>
            </div>
        </div>
    </div>

    <!-- // 05 - Block -->


<?php include 'footer.php' ?>