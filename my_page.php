<?php
require 'my_page_script.php'
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">My Page</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">My Page</span>
    </div>
</div>

<div class="site-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 d-flex flex-column">
                <?php
                if (count($users) > 0){
                ?>
                    <div class="row justify-content-center">
                        <h2><?php echo $my; ?></h2>
                    </div>
                    <div class="row justify-content-around mt-3">
                        <?php
                        foreach ($users as $user){
                            if (!isset($user['r_status'])){
                                $user['r_status'] = 'new';
                            }
                            if ($user['r_status'] == 'new'){
                                ?>
                                <div class="col-md-4">
                                    <div class="course-1-item">
                                        <figure class="thumnail">
                                            <?php
                                            if ($user['gender'] == 'Male'){
                                                $avatar = 'images/man.png';
                                            }else{
                                                $avatar = 'images/woman.png';
                                            }
                                            ?>
                                            <img src="<?php echo $avatar; ?>" alt="Image" class="img-fluid">

                                            <div class="category text-center">
                                                <h3 class="font-weight-bold"><?php echo $user['name']; ?></h3>
                                            </div>
                                        </figure>
                                        <div class="course-1-content pt-0 pb-1">
                                            <div class="row text-left">
                                                <span class="font-weight-bold text-dark pr-1 m-0">College </span>
                                                <span class="w-100" style="white-space: nowrap; overflow: hidden;">
                                                <?php echo $user['college']; ?>
                                            </span>
                                            </div>
                                            <div class="row justify-content-center py-1 bg-light border-bottom border-top">
                                            <span class="font-weight-bold text-dark">
                                                Level <?php echo $user['level']; ?>
                                            </span>
                                            </div>
                                            <?php
                                            if (!$isMentor){
                                                ?>
                                                <div class="row">
                                                <span class="font-weight-bold text-dark pr-1 m-0">Rating</span>
                                                <div class="rating text-center mb-3 w-75">
                                                    <?php
                                                    for ($i=0; $i<5; $i++){
                                                        if ($i < $user['rate'] && $user['rate'] > 0){
                                                            echo '<span class="icon-star2 text-warning"></span>';
                                                        }else{
                                                            echo '<span class="icon-star2 text-secondary"></span>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                                <?php
                                            }
                                            ?>
                                            <!-- Button send -->
                                            <?php
                                            if ($isMentor){
                                            ?>
                                                <div class="row justify-content-between my-2">
                                                    <form method="post">
                                                        <input type="hidden" name="status" value="accept">
                                                        <input type="hidden" name="r_id" value="<?php echo $user['r_id']; ?>">
                                                        <input type="hidden" name="mentee_id" value="<?php echo $user['mentee_id']; ?>">
                                                        <input type="hidden" name="mentee_email" value="<?php echo $user['email']; ?>">
                                                        <button type="submit" class="btn btn-primary rounded-0 px-4">Accept</button>
                                                    </form>

                                                    <form method="post">
                                                        <input type="hidden" name="status" value="decline">
                                                        <input type="hidden" name="r_id" value="<?php echo $user['r_id']; ?>">
                                                        <input type="hidden" name="mentee_id" value="<?php echo $user['mentee_id']; ?>">
                                                        <input type="hidden" name="mentee_email" value="<?php echo $user['email']; ?>">
                                                        <button type="submit" class="btn btn-dark rounded-0 px-4">Decline</button>
                                                    </form>
                                                </div>
                                            <?php
                                            }else{
                                            ?>
                                            <div class="row justify-content-center my-2">
                                                <a href="communicate.php" class="btn btn-primary rounded-0 px-4">connect</a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- end Button send -->
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if (count($mentees) > 0){
                ?>
                <div class="row justify-content-center pt-2 mt-3 border-top">
                    <h2>My mentees</h2>
                </div>
                <div class="row justify-content-around mt-3">
                    <?php
                    foreach ($mentees as $mentee){
                            ?>
                            <div class="col-md-4">
                                <div class="course-1-item">
                                    <figure class="thumnail">
                                        <?php
                                        if ($mentee['gender'] == 'Male'){
                                            $avatar = 'images/man.png';
                                        }else{
                                            $avatar = 'images/woman.png';
                                        }
                                        ?>
                                        <img src="<?php echo $avatar; ?>" alt="Image" class="img-fluid">

                                        <div class="category text-center">
                                            <h3 class="font-weight-bold"><?php echo $mentee['name']; ?></h3>
                                        </div>
                                    </figure>
                                    <div class="course-1-content pt-0 pb-1">
                                        <div class="row text-left">
                                            <span class="font-weight-bold text-dark pr-1 m-0">College </span>
                                            <span class="w-100" style="white-space: nowrap; overflow: hidden;">
                                            <?php echo $mentee['college']; ?>
                                        </span>
                                        </div>
                                        <div class="row justify-content-center py-1 bg-light border-bottom border-top">
                                        <span class="font-weight-bold text-dark">
                                            Level <?php echo $mentee['level']; ?>
                                        </span>
                                        </div>
                                        <div class="row justify-content-center my-2">
                                            <a href="communicate.php"  class="btn btn-primary rounded-0 px-4">
                                                Communication
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="border col-md-3 d-flex flex-column rounded p-2" style="height: fit-content;">
                <a href="my_profile.php" type="button" class="btn btn-secondary btn-lg btn-block">My Account</a>
                <?php
                if ($isMentor){
                    ?>
                    <button type="button" class="btn btn-secondary btn-lg btn-block">My Mentees</button>
                    <a href="communicate.php" type="button" class="btn btn-secondary btn-lg btn-block">Communication</a>
                    <button type="button" class="btn btn-secondary btn-lg btn-block">Volunteering Hours</button>
                    <a href="certificate.php" TARGET="_blank" type="button" class="btn btn-secondary btn-lg btn-block">My Certificate</a>
                    <?php
                }else{
                    ?>
                    <button type="button" class="btn btn-secondary btn-lg btn-block">My Mentor</button>
                    <a href="communicate.php" type="button" class="btn btn-secondary btn-lg btn-block">Communication</a>
                    <button type="button" class="btn btn-secondary btn-lg btn-block">Tutoring</button>
                    <?php
                    if ($qry_r->num_rows > 0){
                        echo '<button type="button" class="disabled btn btn-secondary btn-lg btn-block">
                        Rating
                    </button>';
                    }else{
                        echo '<button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#rateModal">
                        Rating
                    </button>';
                    }
                    ?>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="rateModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" class="col-12">
                    <div class="modal-body">
                        <table class="col-12">
                            <tr>
                                <td class="pr-3">Commitment</td>
                                <td class="rating">
                                    <input type="radio" name="commitment" value="5" id="a5"><label for="a5">☆</label>
                                    <input type="radio" name="commitment" value="4" id="a4"><label for="a4">☆</label>
                                    <input type="radio" name="commitment" value="3" id="a3"><label for="a3">☆</label>
                                    <input type="radio" name="commitment" value="2" id="a2"><label for="a2">☆</label>
                                    <input type="radio" name="commitment" value="1" id="a1"><label for="a1">☆</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Communication</td>
                                <td class="rating">
                                    <input type="radio" name="communication" value="5" id="b5"><label for="b5">☆</label>
                                    <input type="radio" name="communication" value="4" id="b4"><label for="b4">☆</label>
                                    <input type="radio" name="communication" value="3" id="b3"><label for="b3">☆</label>
                                    <input type="radio" name="communication" value="2" id="b2"><label for="b2">☆</label>
                                    <input type="radio" name="communication" value="1" id="b1"><label for="b1">☆</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Involvement</td>
                                <td class="rating">
                                    <input type="radio" name="involvement" value="5" id="c5"><label for="c5">☆</label>
                                    <input type="radio" name="involvement" value="4" id="c4"><label for="c4">☆</label>
                                    <input type="radio" name="involvement" value="3" id="c3"><label for="c3">☆</label>
                                    <input type="radio" name="involvement" value="2" id="c2"><label for="c2">☆</label>
                                    <input type="radio" name="involvement" value="1" id="c1"><label for="c1">☆</label>
                                </td>
                            </tr>
                            <tr>
                                <td>Performance</td>
                                <td class="rating">
                                    <input type="radio" name="performance" value="5" id="d5"><label for="d5">☆</label>
                                    <input type="radio" name="performance" value="4" id="d4"><label for="d4">☆</label>
                                    <input type="radio" name="performance" value="3" id="d3"><label for="d3">☆</label>
                                    <input type="radio" name="performance" value="2" id="d2"><label for="d2">☆</label>
                                    <input type="radio" name="performance" value="1" id="d1"><label for="d1">☆</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">More feedback:</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <textarea rows="3" name="feedback" class="form-control"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input name="rate" value="rate" type="hidden">
                    <input name="email" value="<?php if($users > 0) echo $users[0]['email']; ?>" type="hidden">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Rating</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
