<?php include 'header.php';
include 'db/db.php';
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
                <!--<div class="container">
                  <div class="row align-items-center">
                    <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                      <h1>Student</h1>
                    </div>
                  </div>
                </div>-->
            </div>

        </a>

        <a href="about.html">
            <div class="intro-section" style="background-image: url('images/slidshow.jpg');">
                <!--<div class="container">
                  <div class="row align-items-center">
                    <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                      <h1>You Can Make Anything</h1>
                    </div>
                  </div>
                </div>-->
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
                                <div class="course-1-content pb-4">
                                    <h2>Student</h2>
                                    <span class="desc font-weight-bold">Rating</span>
                                    <div class="rating text-center mb-3">
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-secondary"></span>
                                        <span class="icon-star2 text-secondary"></span>
                                    </div>
                                    <p><a href="single.html?<?php echo $mentor['id']; ?>" class="btn btn-primary rounded-0 px-4">Details</a></p>
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