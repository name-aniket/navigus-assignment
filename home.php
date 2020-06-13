<?php
	session_start();
?>

<?php if(isset($_SESSION['user_detail'])): ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Bootstrap Admin">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, management, responsive, CRM, Projects">
    <meta name="robots" content="noindex, nofollow">
    <title>Navigus Assignment</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="" class="logo">
                    <img src="assets/img/logo.png" width="40" height="40" alt="">
                </a>
            </div>
            <!-- /Logo -->

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <!-- Header Title -->
            <div class="page-title-box">
                <h3 id="user-email"></h3>
            </div>
            <!-- /Header Title -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img id="avatar" src="" alt="">
                            <span class="status online"></span>
                        </span>
                        <span id="user-name"></span>
                    </a>
                    <ul class="team-members" id="list-active-user">           
                        <!-- <li>
                            <a href="#" data-toggle="tooltip" title="A"><img alt="" src="avatars/avatar1.jpg"></a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" title="A"><img alt="" src="avatars/avatar2.jpg"></a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" title="A"><img alt="" src="avatars/avatar3.jpg"></a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" title="A"><img alt="" src="avatars/avatar4.jpg"></a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" title="A"><img alt="" src="avatars/avatar4.jpg"></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="A">+13</a>
                        </li> -->
                        
                    </ul>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)" id="logout">Logout</a>
                    </div>
                </li>
                <!-- <li class="nav-item">aniket</li> -->
            </ul>
            <!-- /Header Menu -->
        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                        <li><a href="javascript:void(0)" id="view-doc">View Doc</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title" id="name"></h3>
                        </div>
                    </div>
                </div>
                <div class ="container-fluid" id="dummy-doc"></div><br>
                <div class ="container-fluid" id="list-log"></div>
                <!-- </div> -->
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="assets/js/home.js"></script>

</body>

</html>
<?php else:
	header("location:error/404.php");
?>
<?php endif; ?>

