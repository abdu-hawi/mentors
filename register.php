<?php include 'header.php'; ?>


    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Register</h2>
                    <p></p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="index.html">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Register</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">


            <div class="row justify-content-center">
                <form class="col-md-5" method="post" action="db/register.php">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="id">University ID</label>
                            <input type="number" name="id" id="id" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="fullname">Full name</label>
                            <input type="text" name="name" id="fullname" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control form-control-lg p-1">
                                <option selected disabled>Select your gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="date_of_birthday"
                                   data-date-format="dd/mm/yyyy"
                                   class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="college">College</label>
                            <select name="college" id="college" class="form-control form-control-lg p-1">
                                <option selected disabled>Select your college</option>
                                <option value="Computing and Informatics">Computing and Informatics</option>
                                <option value="Administrative and Financial Science">Administrative and Financial Science</option>
                                <option value="Health Science">Health Science</option>
                                <option value="Science and Theoretical Studies">Science and Theoretical Studies</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="major">Major</label>
                            <input type="text" name="major" id="major" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control form-control-lg p-1">
                                <option selected disabled>Select your level</option>
                                <option value="1">Level 1</option>
                                <option value="2">Level 2</option>
                                <option value="3">Level 3</option>
                                <option value="4">Level 4</option>
                                <option value="5">Level 5</option>
                                <option value="6">Level 6</option>
                                <option value="7">Level 7</option>
                                <option value="8">Level 8</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" name="password" id="pword" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Re-type Password</label>
                            <input type="password" name="pwd" id="pword2" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="telephone">Telephone</label>
                            <input type="tel" name="mobile" id="telephone" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
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
