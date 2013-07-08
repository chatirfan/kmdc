<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<?php 
//foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php //echo $file; ?>" />
<?php //endforeach; ?>
<?php //foreach($js_files as $file): ?>
	<script src="<?php //echo $file; ?>"></script>
<?php //endforeach; ?>
<style type='text/css'>
body{	font-family: Arial;	font-size: 14px;}
a{display:block;margin-left: 20px}
li{display:inline;float:left;}
a:hover{text-decoration: underline;}
ul{list-style-type:none;margin:0;padding:0;}
</style>
</head>
<body>

	<div style='height:20px;'></div> 
	<h1>Admin Dashboard</h1> 
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
</body>
</html>
