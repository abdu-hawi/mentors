<?php
require '../db/session.php';
if (!$_SESSION['userinfo'] || $_SESSION['userinfo']['type'] !== 'academic') die('Forbidden access');
$l = explode('/', $_SERVER['REQUEST_URI']);
$path = '';
$page_name = 'Dashboard';
foreach ($l as $k=>$ll){
    if (str_ends_with($ll, '.php' ) && !empty($ll)){
        $path = $ll;
        $page_name = ucfirst(explode('.', $ll)[0]);
        if ($page_name == 'Index') $page_name = 'Dashboard';
        elseif ($page_name == 'Approve_rating') $page_name = 'Approve rating';
        elseif ($page_name == 'Add_volunteer_hour') $page_name = 'Add volunteer hour';
        break;
    }
    $path = 'index.php';
}
function get_menu(string $name, string $icon): string{
    global $path;
    global $page_name;
    if ($name == 'Dashboard') $name = 'index';
    elseif ($name == 'Approve rating') $name = 'approve_rating';
    elseif ($name == 'Add volunteer hour') $name = 'add_volunteer_hour';
    if (strtolower($name).'.php' == $path){
        $txt = '<a href="'.strtolower($name).'.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="'.$icon.' me-2 third-text"></i>';
    }else{
        $txt = '<a href="'.strtolower($name).'.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="'.$icon.' me-2"></i>';
    }
    if ($name == 'index') $name = 'Dashboard';
    elseif ($name == 'approve_rating') $name = 'Approve rating';
    elseif ($name == 'add_volunteer_hour') $name = 'Add volunteer hour';
    $txt .= $name;
    $txt .='</a>';
    return $txt;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../css/bootstrap-5.0.0.min.css" rel="stylesheet" />
    <link href="../css/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <title>Academic member - <?php echo $page_name; ?></title>
</head>

<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="../images/logo.png" height="35" alt="">
            Mentors
        </div>
        <div class="list-group list-group-flush my-3">
            <?php echo get_menu('Dashboard', 'fas fa-tachometer-alt'); ?>
            <?php echo get_menu('Approve rating', 'fas fa-star-half-stroke'); ?>
            <?php echo get_menu('Add volunteer hour', 'fa-solid fa-hand-holding-medical'); ?>
            <?php /*echo get_menu('Mentors', 'fa-solid fa-chalkboard-user'); */?><!--
            --><?php /*echo get_menu('Mentees', 'fa-solid fa-users-rectangle'); */?>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 shadow">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                <h2 class="fs-4 m-0"><?php echo $page_name; ?></h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>
                            <?php echo $_SESSION['userinfo']['name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../db/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="mt-4 w-100"></div>