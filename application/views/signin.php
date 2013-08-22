<div class="content">
<div class="wrapper">
<div class="signin-page">
<?php
if($message != "")
{
?>
<div align="center" style="border:red 1px solid; color:red;"><?php echo $message;?></div>
<?php
}
?>
<div class="signin-box">
<h1>Sign In</h1>
<form action="<?php echo base_url();?>authenticate/login" method="post" onsubmit="return check_login();" accept-charset="utf-8">
<ul>
<li>Enter Username or Email</li>
<li><input name="identity" id="identity" type="text" class="input" /></li>
<li></li>
<li>Password</li>
<li><input name="password" id="password" type="password" class="input" /><strong><a href="<?php echo base_url();?>authenticate/forgot_password">Forgot?</a></strong></li>
<li><input name="remember" id="remember" type="checkbox" value="1" /> Keep me signed in</li>
<li><input name="" type="submit" class="signin-btn" value="Sign In" /></li>
</ul>
</form>
<div id="signin_error" style="clear:both; color:red;"></div>
<div class="signin-sep"></div>

</div>
<div class="signin-page-txt">
<h1>Join the <?php //echo ($header['total_users'] * 1234);?></h1>
<h2>People already on Cymango to...</h2>
</div>
<div class="signin-page-image"><img src="<?php echo asset_img("main-img.jpg");?>" alt="Cymango" /></div>
</div>
<div class="bottom-banner">
    <?php //echo bottom_advertisement_box($center['bottom_advertisement']);?>
</div>
</div>
</div>

