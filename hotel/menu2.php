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
	.ft05{font-size:11px;line-height:16px;font-family:Times;color:#45785c;}
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
                    <a class="brand" href="#"><?php echo $_SESSION['manager'].' hotel`s';?> Panel</a>
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
                            <a href="add_meal.php"><i class="icon-chevron-right"></i>Add Hotel </a> </li>
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
						
                        <div class="block" >
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Menu</div>
                                
                            </div>

                <table style="background-image:url(images/menu3.PNG); background-size:972px auto; background-repeat:no-repeat" width="972">
						<tr>
						<td>
<div class="ft00" colspan="2" align="center" style="margin-top:200px">ONE MENU</div>

<div class="ft01" align="center" style="margin-top:30px"><?php echo ucwords($_SESSION['manager']).'`s '?> Menu.</div>
<div class="ft01" colspan="2" align="center" style="margin-top:30px">&#160;BREAKFAST</div>
<div>
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:200px;margin-top:30px">'.$arr['meal_name'].'<br/>'.$arr['description'].'</div><div class="ft05" style="margin-left:300px;margin-top:-35px"> ....................................... </div>';

echo '<div class="ft05" style="margin-left:420px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';
}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';
}
}
?>
</div>
</div>
<div class="ft04" align="center" style="margin-top:70px">SNACKS</div>
<div>
<div>
<?php 
$odd1=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd1)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr1=mysqli_fetch_array($odd1,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo '<div>none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
</div>
<div class="ft01" align="center" style="margin-top:110px">AFRICAN</div>
<div>
<div>
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
</div>
<div class="ft01" align="center" style="margin-top:140px">INTERNATIONAL</div>
<div>
<div>
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
<div>
<div class="ft01" align="center" style="margin-top:170px">DESSERT</div>
<div>
<div>
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';
}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
</div>
<div class="ft01" align="center" style="margin-top:200px">MISCELLENIOUS</div>
<div>
<div>
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';
}
}
?>
</div>
</div>
<div class="ft01" align="center" style="margin-top:230px">&#160;BEVERAGES</div>
<div>
<div>
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo '<div class="ft05">none</td>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
<div>
<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo '<div class="ft05">none</div>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div class="ft05" style="margin-left:520px;margin-top:-20px;">'.$arr['meal_name'].'<div>'.$arr['description'].'</div></div><div class="ft05" style="margin-left:640px;margin-top:-35px"> ...................................... </div>';

echo '<div class="ft05" style="margin-left:780px;margin-top: -15px">Ksh. '.$arr['price'].'</div>';

}
}
?>
</div>
</div>
</div>
</div>
</td>
</tr>
</table>
</body>
</html>
