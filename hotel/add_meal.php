<?php
include'../db.php';
require_once('../auth.php');
?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo ucwords($_SESSION['manager']).'`s ';?>Home Page</title>
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
		
		<script src="js/validate.min.js" type="text/javascript"></script>
   
		
		<script type="text/javascript">
function validateForm()
{

var n=document.forms["meal"]["mname"].value;
var t=document.forms["meal"]["type"].value;
var d=document.forms["meal"]["description"].value;
var p=document.forms["meal"]["price"].value;
var s=document.forms["meal"]["total"].value;

if ((n==null || n==""))
  {
  alert("please enter meal`s name");
  return false;
  }
  if ((t==null || t==0))
  {
  alert("please enter meal type");
  return false;
  }
  
  if ((d==null || d==""))
  {
  alert("please enter meal`s description");
  return false;
  }
  
  if ((p==null || p==""))
  {
  alert("please enter meal`s price");
  return false;
  }
  
  if ((s==null || s==""))
  {
  alert("please enter stock available");
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
                    <a class="brand" href="#"><?php echo ucwords($_SESSION['manager']).' hotel`s';?> Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo ucwords($_SESSION['manager']).' Panel';?> <i class="caret"></i>                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="hotel_profile.php">Profile</a></li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="logout.php">Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="index.php">Dashboard</a> </li>
                            <li class="active">
                                <a href="add_meal.php">Add Meal</a> </li>
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
                                        <a tabindex="-1" href="meals.php">Meals</a>
                                    </li>
									<li>
                                        <a tabindex="-1" href="menu.php">Menu</a>
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
                            <a href="add_meal.php"><i class="icon-chevron-right"></i>Add Meal </a> </li>
                        <li>
                            <a href="orders.php"><i class="icon-chevron-right"></i> View Orders </a></li>
                        <li>
                            <a href="customers.php"><i class="icon-chevron-right"></i>View Customers </a> </li>
                        <li>
                            <a href="meals.php"><i class="icon-chevron-right"></i> View Meals </a> </li>
						<li>
                            <a href="menu.php"><i class="icon-chevron-right"></i> View Menu </a> </li>
                        <li>
                            <a href="hotel_profile.php"><i class="icon-chevron-right"></i>Profile</a></li>
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
	                                        <a href="#">Add Meal</a> <span class="divider">.</span>	
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
               	  </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Meals</div>
                                
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
								<table width="945">
								<tr><td colspan="2">
								  <h5 style="color:#FF0000">Please fill the fields in *</h5>
								  </td></tr>
								<tr><td colspan="2">
								<?php
			 if(isset($_REQUEST['meal'])){
			 $sel=mysqli_query($con,"select * from hotels where u_id='".$_SESSION['ID']."'");
			 $arr = mysqli_fetch_array($sel, MYSQLI_ASSOC);
			 if(empty(is_uploaded_file($_FILES['image']['tmp_name']))){
			 $sql = mysqli_query($con,"insert into meal(hotel_id,meal_name,food_type,description,price,stock)values('".$arr['h_id']."','".$_REQUEST['mname']."', '".$_REQUEST['type']."', '".$_REQUEST['description']."', '".$_REQUEST['price']."', '".$_REQUEST['total']."')") or die(mysqli_error($con));
			
			 if($sql){
			  echo "<img src='images/1433075297_ok-green.png'/><span style='color:green'>Successfully inserted hotel! Add another...</span>";
			 }else{
			 echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in insertion!</span>";
			 }
			 }else{
	        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "meal/" . $_FILES["image"]["name"]);
                                $location = "meal/" . $_FILES["image"]["name"];
			
			 
			 $sql = mysqli_query($con,"insert into meal(hotel_id,meal_name,food_type,description,price,stock,photo)values('".$arr['h_id']."','".$_REQUEST['mname']."', '".$_REQUEST['type']."', '".$_REQUEST['description']."', '".$_REQUEST['price']."', '".$_REQUEST['total']."', '".$location."')") or die(mysqli_error($con));
             if($sql){
			 echo "<img src='images/1433075297_ok-green.png'/><span style='color:green'>Successfully inserted hotel! Add another...</span>";
			 }else{
			 echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in insertion!</span>";
			 }
			 }
			 }
			 ?>
								</td></tr>
                                  <form class="form-signin" name="meal" method="post" onSubmit="return validateForm()" enctype="multipart/form-data">
								  
                                   <tr><td width="304"> <label>Meal<span style="color:#FF0000">*</span>:</label></td><td width="629"><input type="text" class="input-block-level" placeholder="Please enter meal`s name" name="mname" style="width:500px"></td></tr>
								   <tr><td>
                                    <label>Type<span style="color:#FF0000">*</span>:</label></td><td><select name="type" style="width:500px">
									<option value="">-------------------------select meal type---------------------------------</option>
									<option value="breakfast">Breakfast</option>
									<option value="african">African</option>
									<option value="international">International</option>
									<option value="dessert">Dessert</option>
									<option value="snack">Snack</option>
									<option value="beverage">Beverage/Drinks</option>
									<option value="others">Others</option>
									</select></td></tr>
									<tr><td>
									<label>Description<span style="color:#FF0000">*</span>:</label></td><td><textarea cols="30" placeholder="Food description" rows="10" name="description" style="width:500px"></textarea></td></tr>
									<tr><td width="304"> <label>Price(sh.)<span style="color:#FF0000">*</span>:</label></td><td width="629"><input type="text" class="input-block-level" placeholder="Please enter meal`s price(sh.)" name="price" style="width:500px"></td></tr>
									<tr><td width="304"> <label>Stock<span style="color:#FF0000">*</span>:</label></td><td width="629"><input type="text" class="input-block-level" placeholder="Please enter total meal available" name="total" style="width:500px"></td></tr>
									<tr><td>
									<label>Meal image:</label></td><td><input type="file" class="input-block-level" name="image" style="width:500px">
                                    </td></tr>
									<tr><td>
                                    <button class="btn btn-large btn-success" type="submit" name="meal">Submit</button>
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
    </body>

</html>