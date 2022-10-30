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
                <h2 class="mb-0">Edit profile</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <a href="">Profile</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Edit profile</span>
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
                <form class="col-md-8" method="post" action="db/edit_profile.php">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="id">University ID</label>
                            <input value="<?php echo $_SESSION['userinfo']['id'] ?>"
                                type="number" name="id" id="id" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="fullname">Full name</label>
                            <input value="<?php echo $_SESSION['userinfo']['name'] ?>"
                                type="text" name="name" id="fullname" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input value="<?php echo $_SESSION['userinfo']['email'] ?>"
                                type="email" name="email" id="email" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="branch">Branch</label>
                            <select name="branch" id="branch" class="form-control form-control-lg p-1">
                                <option value="Riyadh" <?php if ($_SESSION['userinfo']['branch'] == 'Riyadh') echo 'selected'; ?>>Riyadh</option>
                                <option value="Jeddah" <?php if ($_SESSION['userinfo']['branch'] == 'Jeddah') echo 'selected'; ?>>Jeddah</option>
                                <option value="Dammam" <?php if ($_SESSION['userinfo']['branch'] == 'Dammam') echo 'selected'; ?>>Dammam</option>
                                <option value="Medina" <?php if ($_SESSION['userinfo']['branch'] == 'Medina') echo 'selected'; ?>>Medina</option>
                                <option value="Qassim" <?php if ($_SESSION['userinfo']['branch'] == 'Qassim') echo 'selected'; ?>>Qassim</option>
                                <option value="Abha" <?php if ($_SESSION['userinfo']['branch'] == 'Abha') echo 'selected'; ?>>Abha</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control form-control-lg p-1">
                                <?php
                                    if ($_SESSION['userinfo']['gender'] == 'male')
                                        echo '<option value="male" selected>Male</option>
                                <option value="female">Female</option>';
                                    else
                                        echo '<option value="male">Male</option>
                                <option value="female" selected>Female</option>';
                                ?>

                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" id="dob" name="date_of_birthday"
                                   data-date-format="dd/mm/yyyy"
                                   class="form-control form-control-lg"
                                   value="<?php echo $_SESSION['userinfo']['date_of_birthday'] ?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="college">College</label>
                            <select name="college" id="college" class="form-control form-control-lg p-1">
                                <option value="Computing and Informatics" <?php
                                if ($_SESSION['userinfo']['date_of_birthday'] == 'Computing and Informatics'){
                                    echo ' selected';
                                }
                                ?>>Computing and Informatics</option>
                                <option value="Administrative and Financial Science" <?php
                                if ($_SESSION['userinfo']['date_of_birthday'] == 'Administrative and Financial Science'){
                                    echo ' selected';
                                }
                                ?>>Administrative and Financial Science</option>
                                <option value="Health Science" <?php
                                if ($_SESSION['userinfo']['date_of_birthday'] == 'Health Science'){
                                    echo ' selected';
                                }
                                ?>>Health Science</option>
                                <option value="Science and Theoretical Studies" <?php
                                if ($_SESSION['userinfo']['date_of_birthday'] == 'Science and Theoretical Studies'){
                                    echo ' selected';
                                }
                                ?>>Science and Theoretical Studies</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="major">Major</label>
                            <input value="<?php echo $_SESSION['userinfo']['major'] ?>"
                                type="text" name="major" id="major" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control form-control-lg p-1">
                                <option value="1" <?php
                                if ($_SESSION['userinfo']['level'] == '1'){
                                    echo ' selected';
                                }
                                ?>>Level 1</option>
                                <option value="2" <?php
                                if ($_SESSION['userinfo']['level'] == '2'){
                                    echo ' selected';
                                }
                                ?>>Level 2</option>
                                <option value="3" <?php
                                if ($_SESSION['userinfo']['level'] == '3'){
                                    echo ' selected';
                                }
                                ?>>Level 3</option>
                                <option value="4" <?php
                                if ($_SESSION['userinfo']['level'] == '4'){
                                    echo ' selected';
                                }
                                ?>>Level 4</option>
                                <option value="5" <?php
                                if ($_SESSION['userinfo']['level'] == '5'){
                                    echo ' selected';
                                }
                                ?>>Level 5</option>
                                <option value="6" <?php
                                if ($_SESSION['userinfo']['level'] == '6'){
                                    echo ' selected';
                                }
                                ?>>Level 6</option>
                                <option value="7" <?php
                                if ($_SESSION['userinfo']['level'] == '7'){
                                    echo ' selected';
                                }
                                ?>>Level 7</option>
                                <option value="8" <?php
                                if ($_SESSION['userinfo']['level'] == '8'){
                                    echo ' selected';
                                }
                                ?>>Level 8</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">New Password</label>
                            <input type="password" name="password" id="pword" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword2">Re-type new Password</label>
                            <input type="password" name="pwd" id="pword2" class="form-control form-control-lg">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="telephone">Telephone</label>
                            <input value="<?php echo $_SESSION['userinfo']['mobile'] ?>"
                                type="tel" name="mobile" id="telephone" class="form-control form-control-lg">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <span for="pword" class="text-danger">To update your profile, please write your current password</span>
                            <input type="password" name="current_password" placeholder="Current password" id="pword" class="form-control form-control-lg">
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Update" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
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