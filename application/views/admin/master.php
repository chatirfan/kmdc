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

            $('#courses').change(function(){ //any select change on the dropdown with id country trigger this code         
                var course_id= $('#courses').val();
                
               $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('admin/teachers/get_teachers_by_course_id'); ?>/"+course_id, //here we are calling our user controller and get_cities method with the country_id
                     
                    success: function(json) //we're calling the response json array 
                    {   
                    	if(json.length>0){ 
                        obj = JSON.parse(json); //converting string to json obj
                    	$("#teachers_dd > option").remove();
                      	 $.each(obj, function() {
                        	var opt = $('<option />'); // here we're creating a new select option with for each teacher
                           	opt.val(this.id);
                            opt.text(this.name);
							$('#teachers_dd').append(opt);
                        	// console.log(this.id+'='+this.name);
                        	 
                        	});
                    	}
                    	else {
                    		$("#teachers_dd > option").remove();
                    		var opt = $('<option />'); 
                           	opt.val('');
                            opt.text('None');
							$('#teachers_dd').append(opt);
                        	}


                    }
                     
                }); 
                 
            });
    			
     //check currents url is what we wanted 
            <?php if(current_url()==site_url('admin/course_lectures/view/add')){ ?>

        
        $('#batch_years').change(function(){ //any select change on the dropdown with id country trigger this code         
            var batch_year= $(this).val();
            var section_id= $('#sections').val();

           // alert(batch_year +'    ' +section_id);
            
           $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/course_lectures/get_course_by_batch_section'); ?>",
                data: {batch_year: batch_year,section_id: section_id}, //here we are calling our user controller and get_cities method with the country_id
				success: function(json) //we're calling the response json array 
                {   
	              //  alert('<pre>'+json+'</pre>');
                	if(json.length>0){ 
                    obj = JSON.parse(json); //converting string to json obj
                	$("#assign_course > option").remove();
                  	 $.each(obj, function() {
                    	var opt = $('<option />'); // here we're creating a new select option with for each teacher
                       	opt.val(this.id);
                        opt.text(this.name);
						$('#assign_course').append(opt);
                    	// console.log(this.id+'='+this.name);
                    	 
                    	});
                	}
                	else {
                		$("#assign_course > option").remove();
                		var opt = $('<option />'); 
                       	opt.val('');
                        opt.text('None');
						$('#assign_course').append(opt);
                    	}


                }
                 
            }); 
             
        });

        <?php } ?>
			
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
            <li class="ic-dashboard"><a href="<?php echo site_url('admin/dashboard') ?>"><span>Dashboard</span></a> </li>
            <li class="ic-form-style"><a href="<?php echo site_url('admin/students/view') ?>"><span>Students</span></a>
               <!-- <ul>
                    <li><a href="form-controls.html">Forms</a> </li>
                    <li><a href="buttons.html">Buttons</a> </li>
                    <li><a href="form-controls.html">Full Page Example</a> </li>
                    <li><a href="table.html">Page with Sidebar Example</a> </li>
                </ul>-->
            </li>
            <li class="ic-notifications ic-typography"><a href="<?php echo site_url('admin/teachers/view') ?>"><span>Teacher</span></a></li>
            <li class="ic-charts"><a href="<?php echo site_url('admin/courses/view') ?>"><span>Courses</span></a></li>
            <li class="ic-grid-tables"><a href="<?php echo site_url('admin/notifications/view') ?>"><span>Notification Board</span></a></li>
            <li class="ic-gallery dd"><a href="<?php echo site_url('admin/user_management') ?>"><span>User Management</span></a></li>
            <li class="ic-gallery dd"><a href="<?php echo site_url('admin/departments/view') ?>"><span>Departments</span></a></li>
             <li class="ic-gallery dd"><a href="<?php echo site_url('admin/assign_course/view') ?>"><span>Assign Course</span></a></li>
		  <li class="ic-gallery dd"><a href="<?php echo site_url('admin/course_lectures/view') ?>"><span>Lectures</span></a></li>
		  <li class="ic-gallery dd"><a href="<?php echo site_url('forum') ?>"><span>Forum</span></a></li>
			
             </ul>
    </div>


    <div class="clear">
    </div>
 
    <div class="grid_12 content">
        <div class="box" style="margin-left: 0px">
            <div class="block">
                <?php echo $content; ?>
            </div>
        </div>
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



