<?php

include 'db/db.php';
if (session_status() != PHP_SESSION_ACTIVE) {
    require 'db/session.php';
}
require 'header.php';
$qry = "SELECT `tutoring`.*, COUNT(`tutoring_id`) AS `replay_count`, `updated_at` 
    FROM `tutoring` 
    LEFT JOIN `tutoring_replays` ON `tutoring_replays`.`tutoring_id` = `tutoring`.`id`
    GROUP BY 1
    ORDER BY `tutoring`.`id` DESC";
$qry = mysqli_query($conn, $qry);

$tutorings = [];
while ($row = $qry->fetch_assoc()){
    $tutorings[] = $row;
}
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Tutoring</h2>
                <p></p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.php">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Tutoring</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <select class="form-control form-control-lg p-1" id="branch" name="branch">
                        <option value="Riyadh">Riyadh</option>
                        <option value="Jeddah">Jeddah</option>
                        <option value="Dammam">Dammam</option>
                        <option value="Medina">Medina</option>
                        <option value="Qassim">Qassim</option>
                        <option value="Abha">Abha</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control form-control-lg p-1" id="level" name="level">
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
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="college">College</label>
                    <select class="form-control form-control-lg p-1" id="college" name="college">
                        <option value="Computing and Informatics">Computing and Informatics</option>
                        <option value="Administrative and Financial Science">Administrative and Financial Science</option>
                        <option value="Health Science">Health Science</option>
                        <option value="Science and Theoretical Studies">Science and Theoretical Studies</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <button class="btn btn-success px-4 ml-4" data-toggle="collapse"
                    href="#newTutoring">
                Add new tutoring
            </button>
        </div>
        <div class="row collapse" id="newTutoring">
            <form method="post" action="db/tutoring_post.php">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="fullname">Name</label>
                        <input type="text" name="name" id="fullname" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="branch">Branch</label>
                        <select name="branch" id="branch" class="form-control form-control-lg p-1">
                            <option value="Riyadh">Riyadh</option>
                            <option value="Jeddah">Jeddah</option>
                            <option value="Dammam">Dammam</option>
                            <option value="Medina">Medina</option>
                            <option value="Qassim">Qassim</option>
                            <option value="Abha">Abha</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="college">College</label>
                        <select name="college" id="college" class="form-control form-control-lg p-1">
                            <option selected disabled>Select your college</option>
                            <option value="Computing and Informatics">Computing and Informatics</option>
                            <option value="Administrative and Financial Science">Administrative and Financial Science</option>
                            <option value="Health Science">Health Science</option>
                            <option value="Science and Theoretical Studies">Science and Theoretical Studies</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="major">Major</label>
                        <input type="text" name="major" id="major" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group">
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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="subject">Subject</label>
                        <textarea name="subject" id="subject" rows="7" class="form-control form-control-lg"></textarea>
                    </div>


                </div>
                <input type="submit" class="btn btn-primary" value="Add Tutoring">
            </form>
        </div>

        <div class="row mt-4" id="tutoring_container">
            <?php
            foreach ($tutorings as $tutoring){
            ?>
                <a href="show_tutoring.php?tutoring=<?php echo $tutoring['id'];?>" class="col-12 mb-2">
                    <div class="card card-body border-primary">
                        <table class="table mb-0">
                            <tr class="">
                                <th class="border-0 p-0 w-50 text-primary">Title</th>
                                <th class="border-0 p-0 w-25 text-primary text-center">Replay number</th>
                                <th class="border-0 p-0 w-25 text-primary text-center">Date</th>
                                <th class="border-0 p-0 text-primary text-center">status</th>
                            </tr>
                            <tr>
                                <td class="border-0 p-0"><?php echo $tutoring['title'];?></td>
                                <td class="border-0 p-0 text-center"><?php echo $tutoring['replay_count'];?></td>
                                <td class="border-0 p-0 text-center">
                                    <?php
                                    if (empty( $tutoring['updated_at'])){
                                        echo $tutoring['created_at'];
                                    }else{
                                        echo $tutoring['updated_at'];
                                    }
                                    ?>
                                </td>
                                <?php
                                    if ($tutoring['status'])
                                        echo '<td class="border-0 p-0 text-danger text-center">Closed</td>';
                                    else
                                        echo '<td class="border-0 p-0 text-success text-center">Open</td>';

                                ?>
                            </tr>
                        </table>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>



<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="mb-4"><img src="images/student mentorship system logo.png" alt="Image" class="img-fluid"></p>
                <p>My Mentor development by Muneerah Alsaud, Shurooq AlMalki, May Alharbi..</p>
                <p><a href="about.php">Learn More</a></p>
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

<script>
    const branchEle = $('#branch')
    var branch = branchEle.val()
    branchEle.on('change', function (){
        branch = $(this).val()
        getData()
    })
    const levelEle = $('#level')
    var level = levelEle.val()
    levelEle.on('change', function (){
        level = $(this).val()
        getData()
    })
    const collegeEle = $('#college')
    var college = collegeEle.val()
    collegeEle.on('change', function (){
        college = $(this).val()
        getData()
    })
    function getData(){
        $.ajax({
            url: "db/ajax_get_tutoring.php",
            type: "POST",
            data: {branch: branch, college:college, level:level},
            success: function(data)
            {
                console.log(data)
                var mydata = JSON.parse(data)
                if (mydata.status){
                    let tutoring_container = $('#tutoring_container')
                    tutoring_container.empty()
                    if (mydata.tutorings.length > 0){
                        renderMentors(tutoring_container, mydata.tutorings)
                    }else {
                        tutoring_container.append("<h3 class='text-center w-100'>Not has tutoring by your selected</h3>")
                    }
                }
            }
        });
    }
    function renderMentors(ele, data){
        var txt = ''
        $.each(data, function (k,v){
            txt += '<a href="show_tutoring.php?tutoring='+v.id+'" class="col-12 mb-2">'+
                '<div class="card card-body border-primary">'+
                '<table class="table mb-0">'+
                '<tr class="">'+
                '<th class="border-0 p-0 w-50 text-primary">Title</th>'+
            '<th class="border-0 p-0 w-25 text-primary text-center">Replay number</th>'+
            '<th class="border-0 p-0 w-25 text-primary text-center">Date</th>'+
            '<th class="border-0 p-0 text-primary text-center">status</th>'+
        '</tr>'+
            '<tr>'+
                '<td class="border-0 p-0">'+v.title+'</td>'+
                '<td class="border-0 p-0 text-center">'+v.replay_count+'</td>'+
                '<td class="border-0 p-0 text-center">'
                if(v.updated_at != 'null'){
                    txt += v.created_at
                }else{
                    txt += v.updated_at
                }
                txt += '</td>'
            if (v.status == 1)
                txt += '<td class="border-0 p-0 text-danger text-center">Closed</td>'
            else
                txt += '<td class="border-0 p-0 text-success text-center">Open</td>'
            txt += '</tr></table></div></a>'
        })
        ele.append(txt)
    }
</script>


<script src="js/main.js"></script>

</body>

</html>