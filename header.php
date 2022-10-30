<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Mentor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rate.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 d-none d-lg-block">
                    <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a questions?</a>
                    <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 050 555 5555</a>
                    <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> mymentor_uni@gmail.com</a>
                </div>
                <div class="col-lg-3 text-right">
                    <?php
                    if (session_status() != PHP_SESSION_ACTIVE) {
                        require 'db/session.php';
                    }
                    if ($_SESSION['userinfo']){
                        ?>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" id="navbardrop" data-toggle="dropdown" class="nav-link dropdown-toggle">
                                    <?php echo $_SESSION['userinfo']['name'] ?>
                                </a>
                                <div class="dropdown-menu" style="left: unset !important; right: 0">
                                    <a class="dropdown-item" href="my_page.php">My page</a>
                                    <a class="dropdown-item" href="db/logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                        <?php
                    }else{
                        ?>
                        <a href="login.php" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
                        <a href="register.php" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span>
                            Register</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">
                <div class="site-logo">
                    <a href="index.php" class="d-block">
                        <img src="images/student mentorship system logo.png" alt="Image" height="80px">
                    </a>
                </div>
                <div class="mr-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li class="active">
                                <a href="index.php" class="nav-link text-left">Home</a>
                            </li>
                            <li>
                                <a href="mentor.php" class="nav-link text-left">Mentors</a>
                            </li>
                            <li>
                                <a href="about.html" class="nav-link text-left">About Us</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link text-left">Contact</a>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="ml-auto">
                    <div class="social-wrap">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>

                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                    class="icon-menu h3"></span></a>
                    </div>
                </div>

            </div>
        </div>

    </header>