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
	p {margin: 0; padding: 0;}
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
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Menu</div>
                                
                            </div>



<body bgcolor="#A0A0A0" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:972px; height:auto">

<img width="972" height="1500"  src="images/menu3.png" alt="background image" style="height:auto"/>
<p style="position:absolute;top:200px;left:324px;white-space:nowrap" class="ft00">ONE MENU</p>
<div style="">
<p style="position:absolute;top:288px;left:428px;white-space:nowrap" class="ft01">&#160;BREAKFAST</p>
<p style="position:absolute;top:254px;left:466px;white-space:nowrap" class="ft02"><?php echo ucwords($_SESSION['manager']).'`s '?> Menu.</p>
<p style="position:absolute;top:341px;left:220px;white-space:normal;bottom:100px" class="ft05">
<?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo 'none</p>';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<div style="word-wrap:break-word;"><p style="position:absolute;top:'.(301+$i).'px;left:220px;white-space:normal;margin-bottom:100px;" class="ft05">';

echo '<tr><td>'.$arr['meal_name'].'</td><td>  ...........................................  </td></tr>';

echo '<br/>'.$arr['description'].'</p>';

echo '<p style="position:absolute;top:'.(301+$i).'px;left:449px;white-space:normal;bottom:100px;" class="ft05">Ksh. '.$arr['price'].'</p></div>';
}
}
?>


<?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='breakfast' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none</p>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<div style="word-wrap:break-word;"><p style="position:absolute;top:'.(301+$i).'px;left:515px;white-space:normal" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td>  .............................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(301+$i).'px;left:745px;white-space:normal" class="ft03">Ksh. '.$arr['price'].'</p></div>';
}
}
?>
</div>
<div style="">
<p style="position:absolute;top:420px;left:453px;white-space:nowrap" class="ft04">SNACKS</p>
<p style="position:absolute;top:461px;left:220px;white-space:nowrap" class="ft05"><?php 
$odd1=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd1)==0){
echo 'none</p>';
}else{
$i=0;
while($arr1=mysqli_fetch_array($odd1,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(421+$i).'px;left:220px;white-space:nowrap" class="ft05">';

echo '<td>'.$arr1['meal_name'].'</td><td> ...................................................</td>';

echo '<br/>'.$arr1['description'].'</p>';

echo '<p style="position:absolute;top:'.(421+$i).'px;left:449px;white-space:nowrap" class="ft05">Ksh. '.$arr1['price'].'</p>';
}
}
?>

<p style="position:absolute;top:461px;left:515px;white-space:nowrap" class="ft05"><?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='snack' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none</p>';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(421+$i).'px;left:515px;white-space:nowrap" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td> .....................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(421+$i).'px;left:745px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>
</div>
<div style="">
<p style="position:absolute;top:530px;left:450px;white-space:nowrap" class="ft01">AFRICAN</p>
<p style="position:absolute;top:581px;left:220px;white-space:nowrap" class="ft05"><?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(541+$i).'px;left:220px;white-space:nowrap" class="ft05">';

echo '<td>'.$arr['meal_name'].'</td><td>.................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo '<p style="position:absolute;top:'.(541+$i).';left:449px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>

<p style="position:absolute;top:571px;left:515px;white-space:nowrap" class="ft05"><?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='african' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(441+$i).'px;left:515px;white-space:nowrap" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td> ................................................................. </td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(441+$i).'px;left:745px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>
</div>
<div style="">
<p style="position:absolute;top:630px;left:430px;white-space:nowrap" class="ft01">INTERNATIONAL</p>
<p style="position:absolute;top:661px;left:220px;white-space:nowrap" class="ft05"><?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(621+$i).'px;left:220px;white-space:nowrap" class="ft05">';

echo '<td>'.$arr['meal_name'].'</td><td>....................................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo '<p style="position:absolute;top:'.(621+$i).';left:449px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>

<p style="position:absolute;top:661px;left:515px;white-space:nowrap" class="ft05"><?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='international' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(621+$i).'px;left:515px;white-space:nowrap" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td> ................................................................. </td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(621+$i).'px;left:745px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>
</div>
<div style="">
<p style="position:absolute;top:750px;left:450px;white-space:nowrap" class="ft01">DESSERT</p>
<p style="position:absolute;top:721px;left:220px;white-space:nowrap" class="ft05"><?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(750+$i).'px;left:220px;white-space:nowrap" class="ft05">';

echo '<td>'.$arr['meal_name'].'</td><td>....................................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo '<p style="position:absolute;top:'.(750+$i).'px;left:449px;white-space:nowrap" class="ft05">Ksh. '.$arr['price'].'</p>';
}
}
?>

<p style="position:absolute;top:721px;left:515px;white-space:nowrap" class="ft05"><?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='dessert' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(750+$i).'px;left:515px;white-space:nowrap" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td> ................................................................. </td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(750+$i).'px;left:745px;white-space:nowrap" class="ft05">Ksh. '.$arr['price'].'</p>';
}
}
?>
</div>
<div style="">
<p style="position:absolute;top:850px;left:430px;white-space:nowrap" class="ft01">MISCELLENIOUS</p>
<p style="position:absolute;top:821px;left:220px;white-space:nowrap" class="ft05"><?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(781+$i).'px;left:220px;white-space:nowrap" class="ft05">';

echo '<td>'.$arr['meal_name'].'</td><td>....................................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo '<p style="position:absolute;top:'.(781+$i).';left:449px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>

<p style="position:absolute;top:821px;left:515px;white-space:nowrap" class="ft05"><?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='others' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(781+$i).'px;left:515px;white-space:nowrap" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td> ................................................................. </td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(781+$i).'px;left:745px;white-space:nowrap" class="ft03">Ksh. '.$arr['price'].'</p>';
}
}
?>
</div>
<div style="">
<p style="position:absolute;top:959px;left:437px;white-space:nowrap" class="ft01">&#160;BEVERAGES</p>
<p style="position:absolute;top:958px;left:220px;white-space:nowrap" class="ft03"><?php 
$odd=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage' AND MOD(meal.m_id,2)=1") or die(mysqli_error($con));
if(mysqli_num_rows($odd)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($odd,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(959+$i).'px;left:220px;white-space:nowrap" class="ft05">';

echo '<td>'.$arr['meal_name'].'</td><td>....................................................</td>';

echo '<br/>'.$arr['description'].'</p>';

echo '<p style="position:absolute;top:'.(959+$i).'px;left:449px;white-space:nowrap" class="ft05">Ksh. '.$arr['price'].'</p>';
}
}
?>



<p style="position:absolute;top:979px;left:220px;white-space:nowrap" class="ft03"><?php 
$even=mysqli_query($con,"select * from meal left join hotels on meal.hotel_id=hotels.h_id where hotels.u_id='".$_SESSION['ID']."' AND meal.food_type='beverage' AND MOD(meal.m_id,2)=0") or die(mysqli_error($con));
if(mysqli_num_rows($even)==0){
echo 'none';
}else{
$i=0;
while($arr=mysqli_fetch_array($even,MYSQLI_ASSOC)){
$i+=40;
echo'<p style="position:absolute;top:'.(979+$i).'px;left:515px;white-space:nowrap" class="ft05">';
echo '<td>'.$arr['meal_name'].'</td><td> ................................................................. </td>';

echo '<br/>'.$arr['description'].'</p>';

echo'<p style="position:absolute;top:'.(979+$i).'px;left:745px;white-space:nowrap" class="ft05">Ksh. '.$arr['price'].'</p>';
}
}
?>
</div>
</div>
</body>
</html>
