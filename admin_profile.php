<?php
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
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript">
function validateForm()
{

var n=document.forms["register"]["hname"].value;
var c=document.forms["register"]["contact"].value;
var e=document.forms["register"]["email"].value;
var l=document.forms["register"]["loc"].value;
if ((n==null || n==""))
  {
  alert("you must enter hotel name");
  return false;
  }
  if ((c==null || c==0))
  {
  alert("you must enter hotel contact");
  return false;
  }
if ((e==null || e==""))
  {
  alert("you must enter hotel`s email");
  return false;
  }
if ((l==null || l==""))
  {
  alert("you must enter hotel location");
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
                                        <a tabindex="-1" href="#">Profile</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="login.html">Logout</a> </li>
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
                        <li  class="active">
                            <a href="add_hotel.php"><i class="icon-chevron-right"></i>Add Hotel </a> </li>
                        <li>
                            <a href="orders.php"><i class="icon-chevron-right"></i> View Orders </a></li>
                        <li>
                            <a href="customers.php"><i class="icon-chevron-right"></i>View Cusomers </a> </li>
                        <li>
                            <a href="hotels.php"><i class="icon-chevron-right"></i> View Hotels </a> </li>
                        <li>
                            <a href="meals.php"><i class="icon-chevron-right"></i> View Meals </a> </li>
                        <li>
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
	                                        <a href="#">Add Hotel</a> <span class="divider">.</span>	
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
               	  </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Hotels</div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
								<table>
								<tr><td colspan="2">
								  <h5 style="color:#FF0000">Please fill the fields in *</h5>
								  </td></tr>
								<tr><td colspan="2">
								<?php
			 if(isset($_REQUEST['register'])){
			 $sel=mysqli_query($con,"select * from hotels where hotel_email='".$_REQUEST['email']."'");
			 if(mysqli_num_rows($sel)>0){
			 echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>That hotel is already registered!</span>";
			 }else{
			 if(empty(is_uploaded_file($_FILES['image']['tmp_name']))){
			 $sql = mysqli_query($con,"insert into hotels(hotel_name,hotel_contact,hotel_email,hotel_loc)values('".$_REQUEST['hname']."', '".$_REQUEST['contact']."', '".$_REQUEST['email']."', '".$_REQUEST['loc']."')") or die(mysqli_error($con));
			 if( $sql){
			 echo "<img src='images/1433075297_ok-green.png'/><span style='color:green'>Successfully inserted hotel! Add another...</span>";
			 }else{
			 echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in insertion!</span>";
			 }
			 }else{
	        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "logos/" . $_FILES["image"]["name"]);
                                $location = "logos/" . $_FILES["image"]["name"];
			$sql = mysqli_query($con,"insert into hotels(hotel_name,hotel_contact,hotel_email,hotel_logo,hotel_loc)values('".$_REQUEST['hname']."', '".$_REQUEST['contact']."', '".$_REQUEST['email']."', '".$location."', '".$_REQUEST['loc']."')") or die(mysqli_error($con));
			 if( $sql){
			 echo "<img src='images/1433075297_ok-green.png'/><span style='color:green'>Successfully inserted hotel! Add another...</span>";
			 }else{
			 echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in insertion!</span>";
			 }
			 }
			 }
			 }
			 ?>
								</td></tr>
                                  <form class="form-signin" name="register" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
								  
                                   <tr><td> <label>Hotel name<span style="color:#FF0000">*</span>:</label></td><td><input type="text" class="input-block-level" placeholder="Please enter hotel`s name" name="hname" style="width:500px"></td></tr>
								   <tr><td>
                                    <label>Hotel contact<span style="color:#FF0000">*</span>:</label></td><td><input type="number" class="input-block-level" placeholder="Please enter hotel`s contact" name="contact" style="width:500px"></td></tr>
									<tr><td>
									<label>Hotel email<span style="color:#FF0000">*</span>:</label></td><td><input type="email" class="input-block-level" placeholder="Please enter hotel`s name" name="email" style="width:500px"></td></tr>
									<tr><td>
                                    <label>Hotel address<span style="color:#FF0000">*</span>:</label></td><td><textarea cols="30" rows="10" class="input-block-level" placeholder="Please enter hotel`s address" name="loc" style="width:500px"></textarea></td></tr>
									<tr><td>
									<label>Hotel Logo:</label></td><td><input type="file" class="input-block-level" name="image" style="width:500px">
                                    </td></tr>
									<tr><td>
                                    <button class="btn btn-large btn-success" type="submit" name="register">Register</button>
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
                <p align="center" style="font-size:12px">Copyright © 2015. All Rights Reserved.</p>
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
    </body>

</html>