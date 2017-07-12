<?php
ob_start();
include'../db.php';
require_once('../auth.php');

$meal=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where meal.hotel_id='".$_SESSION['ID']."'") or die(mysqli_query($con));
$row=mysqli_fetch_array($meal,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title><?php echo ucwords($_SESSION['manager']).'`s ';?>Menu</title>
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
		
		<style type="text/css">
<!--
	div {margin: 0px; padding: 0px; }
	.ft00{font-size:64px;font-family:Times;color:#b84538;}
	.ft01{font-size:22px;font-family:Times;color:#b84538;}
	.ft02{font-size:15px;font-family:Times;color:#45785c;}
	.ft03{font-size:11px;font-family:Times;color:#45785c;}
	.ft04{font-size:22px;font-family:Times;color:#bf5426;}
	.ft05{font-size:12px;font-family:Times;color:#45785c;}
	.ft06{font-size:11px;font-family:Times;color:#45785c;}
-->
</style>


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
                            <li>
                                <a href="add_meal.php">Add Meal</a> </li>
						     <li class="dropdown active">
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
                        <li>
                            <a href="add_meal.php"><i class="icon-chevron-right"></i>Add Meal </a> </li>
                        <li>
                            <a href="orders.php"><i class="icon-chevron-right"></i> View Orders </a></li>
                        <li>
                            <a href="customers.php"><i class="icon-chevron-right"></i>View Customers </a> </li>
                        <li>
                            <a href="meals.php"><i class="icon-chevron-right"></i> View Meals </a> </li>
						<li class="active">
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
	                                        <a href="#">Menu</a> <span class="divider">.</span>	
	                                    </li>
	                                    
	                                </ul>
                            	</div>
                        	</div>
               	  </div>
                    <div class="row-fluid" >
                        <!-- block -->
						
                        <div class="block" style="background-color:#FCDEAD" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Menu</div>
                                
                            </div>
                            <table width="700" style="margin-left:130px; margin-top:50px; background:#FAF5ED">
							<tr>
							<td><img src="images/graphics-food-206967.gif" width="100" height="100"></td><td align="center"><img src="images/graphics-food-632844.gif" align="middle" height="100"></td>
							<td align="right"><img src="images/graphics-food-206967.gif" width="100" height="100"></td>
							</tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="27"></td>
							</tr>
							<tr><td></td></tr>
							<tr><td class="ft00" colspan="3" align="center">ONE MENU</td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
							<tr><td class="ft05" colspan="3" align="center">(Click on meal to edit)</td></tr>
							<tr><td height="13"></td>
							</tr>
							<tr><td height="27" colspan="3" align="center" class="ft01">BREAKFAST</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px;">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>
<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
<tr><td class="ft01" colspan="3" align="center">SNACKS</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>
<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
<tr><td class="ft01" colspan="3" align="center">DESSERTS</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>
<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
							
							<tr><td class="ft01" colspan="3" align="center">AFRICAN</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>

<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
							
							<tr><td class="ft01" colspan="3" align="center">INTERNATIONAL</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>

<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
							
							<tr><td class="ft01" colspan="3" align="center">MISCELLENIOUS</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>
<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td></td></tr>
							<tr><td height="23"></td>
							
							<tr><td class="ft01" colspan="3" align="center">BEVERAGES/DRINKS</td></tr>
							 <tr><td colspan="3">
							 
							 <?php 
$brk=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage'") or die(mysqli_error($con));
if(mysqli_num_rows($brk)==0){
echo '<div style="width:700px">
<table width="700">';
echo '<tr><td colspan="3" class="ft05" align="center">None available....<a style="color:#45785c;" href="add_meal.php">Click here to add</a></td></tr>';
echo '</table></div>';
}
?>
<div style="width:700px;"><div style="width:350px; float:left">
<table width="320" style="margin-left:20px">
  <?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ....................................... </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div>
<div style="width:350px;float:left">
<table width="320" style="margin-left:20px">
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));

while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
echo'<tr><td class="ft05" ><a style="color:#45785c;" href="update_meal.php?id='.$arr['m_id'].'">'.$arr['meal_name'].'</a><br/><span class="ft06">'.$arr['description'].'</span></td><td class="ft05" > ........................................ </td>';

echo '<td class="ft05" >Ksh. '.$arr['price'].'</td></tr>';
}
?>
</table>
</div></div>
</td></tr>

							
<tr>
							<td><img src="images/graphics-food-206967.gif" width="100" height="100"></td><td align="center"><img src="images/graphics-food-632844.gif" ></td><td align="right"><img src="images/graphics-food-206967.gif" width="100" height="100"></td>
							</tr>
</table>

</div>
</div>

</body>
</html>
