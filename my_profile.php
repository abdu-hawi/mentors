<?php
include 'db/session.php';
if(!$_SESSION['userinfo'])
    header('Location: index.php');

include 'header.php';
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">My profile</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">My profile</span>
    </div>
</div>

<div class="site-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <p>
                    <?php
                    if ($_SESSION['userinfo']['gender'] == 'woman')
                        echo '<img src="images/woman.png" alt="Image" class="custom-img-size">';
                    else
                        echo '<img src="images/man.png" alt="Image" class="custom-img-size">';
                    ?>
                </p>
            </div>
            <div class="col-md-7 d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="col-md-12 form-group">
                        <label>University ID</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['id'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Full name</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['name'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Email</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['email'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Branch</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['branch'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Gender</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['gender'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Date of Birth</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['date_of_birthday'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>College</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['college'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Major</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['major'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Level</label>
                        <label class="col-12 border-bottom border-info">
                            Level <?php echo $_SESSION['userinfo']['level'] ?>
                        </label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="telephone">Telephone</label>
                        <label class="col-12 border-bottom border-info">
                            <?php echo $_SESSION['userinfo']['mobile'] ?>
                        </label>
                    </div>
                    <a href="edit_profile.php" class="btn btn-primary px-4 text-white">
                        Edit
                    </a>
                </div>
            </div>


            <div class="border col-md-3 d-flex flex-column rounded p-2" style="height: fit-content;">
                <button type="button" class="btn btn-secondary btn-lg btn-block">My Account</button>
                <button type="button" class="btn btn-secondary btn-lg btn-block">My Mentees</button>
                <button type="button" class="btn btn-secondary btn-lg btn-block">Communication</button>
                <button type="button" class="btn btn-secondary btn-lg btn-block">Volunteering Hours</button>
                <button type="button" class="btn btn-secondary btn-lg btn-block">My Certificate</button>
            </div>
        </div>
    </div>
</div>



<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="mb-4"><img src="images/student mentorship system logo.png" alt="Image" class="img-fluid"></p>
                <p>My Mentor development by Muneerah Alsaud, Shurooq AlMalki, May Alharbi..</p>
                <p><a href="about.html">Learn More</a></p>
            </div>


            <div class="col-lg-3">
                <h3 class="footer-heading"><span>Contact</span></h3>
                <ul class="list-unstyled">
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Support Community</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Share Your Story</a></li>
                    <li><a href="#">Our Supporters</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="copyright">
                    <p>

                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                        with <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Student</a>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- .site-wrap -->

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#51be78" />
    </svg></div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.mb.YTPlayer.min.js"></script>




<script src="js/main.js"></script>

</body>

</html>