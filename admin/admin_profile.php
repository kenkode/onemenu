<?php
ob_start();
include'../db.php';
require_once('../auth.php');
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<script src="js/validate.min.js"></script>
		<script src="js/init.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
				<script type="text/javascript">
function validateForm1()
{

var cp=document.forms["pwd"]["cpwd"].value;
var np=document.forms["pwd"]["npwd"].value;
var confp=document.forms["pwd"]["confp"].value;

if ((cp==null || cp==""))
  {
  alert("you must enter current password");
  return false;
  }
  if ((np==null || np==""))
  {
  alert("you must enter new password");
  return false;
  }
  
  if ((confp==null || confp==""))
  {
  alert("Please confirm your password");
  return false;
  }
  if ((confp!=np))
  {
  alert("Your passwords don`t match!");
  return false;
  }
 
}
</script>
		
		<script type="text/javascript">
function validateForm()
{

var n=document.forms["uname"]["cname"].value;
var c=document.forms["uname"]["newu"].value;

if ((n==null || n==""))
  {
  alert("you must enter current username");
  return false;
  }
  if ((c==null || c==0))
  {
  alert("you must enter new username");
  return false;
  }
 
}
</script>

    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Admin <i class="caret"></i>                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="admin_profile.php">Profile</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="index.php">Dashboard</a> </li>
                            <li>
                                <a href="add_hotel.php">Add Hotel</a> </li>
						     <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Views <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="orders.php">Orders</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="customers.php">Customers</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="hotels.php">Hotels</a>
                                    </li>
									<li>
                                        <a tabindex="-1" href="meals.php">Meals</a>
                                    </li>
									<li>
                                        <a tabindex="-1" href="comments.php">Comments</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li>
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a> </li>
                        <li>
                            <a href="add_hotel.php"><i class="icon-chevron-right"></i>Add Hotel </a> </li>
                        <li>
                            <a href="orders.php"><i class="icon-chevron-right"></i> View Orders </a></li>
                        <li>
                            <a href="customers.php"><i class="icon-chevron-right"></i>View Customers </a> </li>
                        <li>
                            <a href="hotels.php"><i class="icon-chevron-right"></i> View Hotels </a> </li>
                        <li>
                            <a href="meals.php"><i class="icon-chevron-right"></i> View Meals </a> </li>
						 <li>
                            <a href="comments.php"><i class="icon-chevron-right"></i> View Comments </a> </li>
                        <li class="active">
                            <a href="admin_profile.php"><i class="icon-chevron-right"></i>Profile</a></li>
                        <li>
                            <a href="logout.php"><i class="icon-chevron-right"></i> Logout </a> </li>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid" style="margin-top:30px;">
                        
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Profile</a> <span class="divider">.</span>	
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
               	  </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><a href="admin_profile.php">Profile</a></div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
								
								 
								  
								  <?php
			 if(isset($_REQUEST['uname'])){
			 $sel=mysqli_query($con,"select * from users where username='".$_REQUEST['cname']."'");
			 if(mysqli_num_rows($sel)==0){
			 echo "<td><img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>Invalid or wrong current username!</span></td>";
			 }else{
			 
			 $sql = mysqli_query($con,"update users set username='".$_REQUEST['newu']."' where username='".$_SESSION['manager']."'") or die(mysqli_error($con));
			 if( $sql){
			 echo "<script type='text/javascript'>alert('Username reset successfully... Please login with your new username!');
		     window.location = '../admin_login.php';
		     </script>";
			 session_destroy();
			 
			 }else{
			 echo "<tr><td colspan='2'><img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in updating!</span></td></tr>";
			 }
			 }
			 }
			 
			 function encryptIt( $q ) {
             $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
             $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
             return( $qEncoded );
             }
			 if(isset($_REQUEST['pwd'])){
			 $sel=mysqli_query($con,"select * from users where password='".encryptIt($_REQUEST['cpwd'])."'")or die(mysqli_error($con));
			 if(mysqli_num_rows($sel)==0){
			 echo "<td><img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>Invalid or wrong current password!</span></td>";
			 }else{
			 
			 $sql = mysqli_query($con,"update users set password='".encryptIt($_REQUEST['confp'])."' where username='".$_SESSION['manager']."'") or die(mysqli_error($con));
			 
			 if( $sql){
			 echo "<script type='text/javascript'>alert('Password reset successfully... Please login with your new password!');
		     window.location = '../admin_login.php';
		     </script>";
			 session_destroy();
			 
			 }else{
			 echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in updating!</span>";
			 }
			 }
			 }
			 ?><br/>
								 
								<a href="" id="uname">Change Username</a>
								<table width="791" id="table-uname">
								<tr><td colspan="2">
								  <h5 style="color:#FF0000">Please fill the fields in *</h5>
								  </td></tr>
								 
                                  <form class="form-uname" name="uname" method="post" onSubmit="return validateForm()">
								  
                                   <tr><td width="188"> <label>Current Username<span style="color:#FF0000">*</span>:</label></td><td width="591"><input type="password" class="input-block-level" placeholder="Please enter your current username" name="cname" style="width:500px"></td></tr>
								   <tr><td>
                                    <label>New Username<span style="color:#FF0000">*</span>:</label></td><td><input type="password" class="input-block-level" placeholder="Please enter new password" name="newu" style="width:500px"></td></tr>
									<tr><td>
                                    <button class="btn btn-large btn-info" type="submit" name="uname">Update</button>
									</td></tr>
                                  </form>
								  </table><br>
								   <tr><td><a href="" id="pawd">Change Password</a></td></tr>
								   <table width="791" id="table-pwd">
								<tr><td colspan="2">
								   <form class="form-pwd" name="pwd" id="contact" method="post" onSubmit="return validateForm1()">
								  
                                   <tr><td> <label>Current Password:<span style="color:#FF0000">*</span>:</label></td><td><input type="password" class="input-block-level" placeholder="Please enter current password" name="cpwd" style="width:500px"></td></tr>
								   <tr><td>
                                    <label>New Password:<span style="color:#FF0000">*</span>:</label></td><td><input type="password" class="input-block-level" placeholder="Please enter new password" id="newp" name="npwd" style="width:500px"></td></tr>
									 <tr><td><label>Confirm Password:<span style="color:#FF0000">*</span>:</label></td><td><input type="password" class="input-block-level" placeholder="Please confirm password" name="confp" style="width:500px"></td></tr>
									<tr><td>
                                    <button class="btn btn-large btn-info" type="submit" name="pwd">Update</button>
									</td></tr>
                                   </form>
							      </table>
								  
							    </div>
                              </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    
            <hr>
            <footer>
                <p align="center" style="font-size:12px">Copyright &copy; 2015. All Rights Reserved.</p>
				<p align="center" style="font-size:10px">Designed by Kanim.</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
		<script type="text/javascript">
		$(document).ready(function(){
		$('#table-uname').hide();
		$('#table-pwd').hide();
		$('#uname').click(function(){
		$('#table-uname').slideToggle("slow");
		return false;
		});
		$('#pawd').click(function(){
		$('#table-pwd').slideToggle("slow");
		return false
		});
		});
		</script>
    </body>

</html>