<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    require 'db/session.php';
}
if($_SERVER['REQUEST_METHOD'] == 'POST'
&& isset($_POST['name']) && !empty($_POST['name'])
&& isset($_POST['email']) && !empty($_POST['email'])
&& isset($_POST['title']) && !empty($_POST['title'])
&& isset($_POST['subject']) && !empty($_POST['subject'])
){
    include 'db/db.php';
    mysqli_query($conn, "INSERT INTO `contacts` (`name`, `title`, `email`, `subject`) 
VALUES ( '".$_POST['name']."', '".$_POST['title']."', '".$_POST['email']."', '".$_POST['subject']."')");
    header('Location: '.$_SERVER['PHP_SELF']);
}
include 'header.php';

?>


    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Contact</h2>
                    <p></p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="index.php">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Contact</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <form class="col-md-5" method="post">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="fullname">Full name</label>
                            <input type="text" name="name" id="fullname"
                                  value="<?php echo $_SESSION['userinfo']['name'] ?? ''; ?>" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                   value="<?php echo $_SESSION['userinfo']['email'] ?? ''; ?>"  class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="subject">Subject</label>
                            <textarea name="subject" rows="7" id="subject" class="form-control form-control-lg"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Submit" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
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
                            <script>document.write(new Date().getFullYear());</script> All rights reserved to SKY IS THE LIMIT <i class="icon-heart" aria-hidden="true"></i>

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
