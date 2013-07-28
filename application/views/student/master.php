<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Dashboard | BlueWhale Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('css/reset.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/text.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/grid.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/layout.css')?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/nav.css')?>" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/ie6.css')?>" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?php echo site_url('/css/ie.css')?>" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->

    <script src="<?php echo site_url('/js/jquery-1.8.2.min.js')?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo site_url('/js/jquery-ui/jquery.ui.core.min.js')?>"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.ui.widget.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.ui.accordion.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.effects.core.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo site_url('/js/jquery-ui/jquery.effects.slide.min.js')?>" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script src="<?php echo site_url('/js/setup.js')?>" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            //setupDashboardChart('chart1');
            //setupLeftMenu();
            setSidebarHeight();


        });
    </script>
</head>
<body>
<div class="container_12">
    <div class="grid_12 header-repeat">
        <div id="branding">
            <div class="floatleft">
                <img src="<?php echo site_url('/img/kmdc_logo.png')?>" alt="Logo" /></div>
            <div class="floatright">
                <div class="floatleft">
                    <img src="<?php echo site_url('/img/img-profile.jpg')?>" alt="Profile Pic" /></div>
                <div class="floatleft marginleft10">
                    <ul class="inline-ul floatleft">
                        <li>Hello Admin</li>
                        <li><a href="#">Config</a></li>
                        <li><a href="<?php echo site_url('authenticate/logout') ?>">Logout</a></li>
                    </ul>
                    <br />
                    <span class="small grey">Last Login: 3 hours ago</span>
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">
        <ul class="nav main">
            <li class="ic-dashboard"><a href="<?php echo site_url('student/dashboard') ?>"><span>Dashboard</span></a> </li>
<!--            <li class="ic-form-style"><a href="--><?php //echo site_url('admin/students/view') ?><!--"><span>Students</span></a>-->
                <!-- <ul>
                     <li><a href="form-controls.html">Forms</a> </li>
                     <li><a href="buttons.html">Buttons</a> </li>
                     <li><a href="form-controls.html">Full Page Example</a> </li>
                     <li><a href="table.html">Page with Sidebar Example</a> </li>
                 </ul>-->
<!--            </li>-->
            <li class="ic-charts"><a href="<?php echo site_url('student/courses/view') ?>"><span>Courses</span></a></li>
            <li class="ic-form-style"><a href="<?php echo site_url('student/dashboard/profile') ?>"><span>Profile</span></a></li>
            <li class="ic-grid-tables"><a href="<?php echo site_url('student/dashboard/noticeboard') ?>"><span>Notice Board</span></a></li>
            <li class="ic-charts"><a href="<?php echo site_url('student/dashboard/assesment') ?>"><span>Assesments</span></a></li>
            <li class="ic-gallery dd"><a href="<?php echo site_url('student/dashboard/schedule') ?>"><span>Schedule</span></a>
            </li>
        </ul>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12" style="padding: 15px;">
        <div class="floatleft" style="width: 25%;height:100%;">
            <?php echo $studentInfo; ?>
        </div>
        <div class="floatleft content" style="width: 50%;height:100%; background-color: #ffffff">
            <?php echo $content; ?>
        </div>
        <div class="floatleft" style="width: 25%;height:100%; background-color: #e6e6fa;">
            <?php //echo $rightBar; ?>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
<div class="clear">
</div>
<div id="site_info">
    <p>
        Copyright <a href="/">KMDC</a>. All Rights Reserved.
    </p>
</div>
</body>
</html>


