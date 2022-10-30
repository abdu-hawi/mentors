<?php

include 'db/db.php';
if (session_status() != PHP_SESSION_ACTIVE) {
    require 'db/session.php';
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mentor_id'])){

}

require 'header.php';
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
            <button class="btn btn-success px-4 ml-4">Add new tutoring</button>
        </div>

        <div class="row mt-4" id="mentors_container">
            <div class="card col-12">
                <div class="card-body">
                    <table class="table border-0">
                        <tr>
                            <td>Title</td>
                            <td>Replay number</td>
                            <td>status</td>
                        </tr>
                    </table>
                </div>
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
    /*
        $.ajax({
            url: "db/ajax_get_mentor.php",
            type: "POST",
            data: {branch: branch, college:college, level:level, gender:gender},
            success: function(data)
            {
                console.log(data)
                var mydata = JSON.parse(data)
                if (mydata.status){
                    let mentors_container = $('#mentors_container')
                    mentors_container.empty()
                    if (mydata.mentors.length > 0){
                        renderMentors(mentors_container, mydata.mentors)
                    }else {
                        mentors_container.append("<h3 class='text-center w-100'>Not has mentor by your selected</h3>")
                    }
                }
            }
        });
    */
    }
    function renderMentors(ele, data){
        var txt = ''
        $.each(data, function (k,v){
            txt += '' +
                '<div class="col-md-3 mb-5">'+
                '<div class="course-1-item">'+
                '<figure class="thumnail">'+
                '<a href="single.html">'
            if(v.gender == 'Male'){
                var avatar = 'images/man.png'
            }else{
                var avatar = 'images/woman.png'
            }
            txt += '<img src="'+avatar+'" alt="Image" class="img-fluid"></a>'+
                '<div class="category"><h3>'+v.name+'</h3></div></figure>'+
                '<div class="course-1-content pt-0 pb-1">'+
                '<div class="row text-left">'+
                '<span class="font-weight-bold text-dark pr-1 m-0">College </span>'+
                '<span class="w-100" style="white-space: nowrap; overflow: hidden;">'+v.college+'</span></div>'+


                '<div class="row justify-content-center py-1 bg-light border-bottom border-top">'+
                '<span class="font-weight-bold text-dark">Level '+v.level+

                '</span>'+
                '</div>'+
                '<div class="row">'+
                '<span class="font-weight-bold text-dark pr-1 m-0">Rating</span>'+
                '<div class="rating text-center mb-3 w-100">'
            for (var i = 0; i < 5; i++) {
                if (i<v.rate && v.rate > 0){
                    txt += '<span class="icon-star2 text-warning"></span>'
                }else {
                    txt += '<span class="icon-star2 text-secondary"></span>'
                }
            }
            txt += '</div> </div>'
            <?php
            if ($_SESSION['userinfo'] && empty($_SESSION['userinfo']['supervisor_id']) && !$isHaveRequest){
            ?>
            txt += '<form method="post" class="row justify-content-center">'+
                '<input type="hidden" name="mentor_id" value="'+v.id+'">'+
                '<input type="hidden" name="email" value="'+v.email+'">'+
                '<button type="submit" class="btn btn-primary rounded-0 px-4">Request</button> </form>'
            <?php
            }
            ?>
            txt += '</div></div></div>'
        })
        ele.append(txt)
    }
</script>


<script src="js/main.js"></script>

</body>

</html>