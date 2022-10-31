<?php
include 'header.php';
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Mentor</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="">Mentor</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">student</span>
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
                <div class="">
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
                    <a class="btn btn-primary px-4 text-white">
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

<?php include 'footer.php';