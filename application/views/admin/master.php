<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <style type='text/css'>
        body{	font-family: Arial;	font-size: 14px;}
        a{display:block;}
        li{display:inline;}
        a:hover{text-decoration: underline;}
        ul{list-style-type:none;margin:0;padding:0;}

        #header { width:100%;height: 100px;background-color: #ffe4c4; float:left; }
        #sidebar { width:10%;height: 70%;background-color: #F0F0EE; float:left;}
        #content { width: 90%;height: 70%;background-color: #ffffff; float:left;}
        #footer { width:100%;height: 50px;background-color: #ffe4c4;float:left; }

    </style>
</head>
<body>

<div id="header">
    HEADER OF THE APP
</div>
<div id="sidebar" style="" >
    <div>
        <ul>
            <li><a href="<?php echo site_url('admin/students/view') ?>">Students</a></li>
            <li><a href="<?php echo site_url('admin/teachers/view') ?>">Teachers</a></li>
            <li><a href="<?php echo site_url('admin/courses/view') ?>">Courses</a></li>
            <li><a href="<?php echo site_url('/') ?>">Class</a></li>
            <li><?php echo anchor('admin/notifications/view', 'Notification', 'title="News"'); ?></li>

            <li><a href="<?php echo site_url('admin/user_management') ?>">User Management</a></li>
        </ul><br/>
        <a href="<?php echo site_url('auth/logout') ?>">Logout</a>
    </div>
</div>

<div id="content" style="">
    <?php echo $content; ?>
</div>
<div id="footer" style="" >
    Footer OF THE APP
</div>
</body>
</html>



