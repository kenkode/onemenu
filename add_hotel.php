<?php
include'db.php';
require_once('auth.php');
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>

<script src="js/jquery-1.2.1.pack.js" type="text/javascript"></script>
	<script src="js/jquery-easing.1.2.pack.js" type="text/javascript"></script>
	<script src="js/jquery-easing-compatibility.1.2.pack.js" type="text/javascript"></script>
	<script src="js/coda-slider.1.1.1.pack.js" type="text/javascript"></script>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
		jQuery(window).bind("load", function() {
			jQuery("div#slider1").codaSlider()
			// jQuery("div#slider2").codaSlider()
			// etc, etc. Beware of cross-linking difficulties if using multiple sliders on one page.
		});
	</script>
	
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

	
	<style type="text/css">
<!--
a img {border: none; }
-->
</style>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<style type="text/css">
<!--
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #006600;
}
a:active {
	text-decoration: none;
	color: #006600;
}
-->
</style>


</head>
<body>
<div id="art-main">
<header class="art-header" style="background:url(images/austria-764988_1280.jpg)">


    <div class="art-shapes">

            </div>
<h1 class="art-headline" data-left="4.01%">
    <a href="#">ONE</a>
</h1>
<h2 class="art-slogan" data-left="4.45%">MENU</h2>




<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="admin.php" class="">Dashboard</a></li><li><a href="" class="">Add Hotels</a></li><li><a href="#" class="">Orders</a><ul class=""><li><a href="" class="">Meals</a></li><li><a href="category/breakfast.html" class="">Customers</a></li><li><a href="" class="">Hotels</a></li><li><a href="" class="">Comments</a></li></ul></li><li><a href="" class="">Profile</a></li><li><a href="logout.php" class="">Logout</a></li></ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><div class="art-block clearfix">
        <div class="art-blockcontent">
		
		
		</div>
</div><div class="art-block clearfix">
        <div class="art-blockcontent"><p> </p><nav class="nav clearfix"> <dnn:menu menustyle="Menu" runat="server"> <templatearguments> <dnn:templateargument name="class" value="hmenu"></dnn:templateargument> </templatearguments> </dnn:menu> </nav> <div class="sheet clearfix"> <!-- Breadcrumb Code --> <dnn:text runat="server" id="dnnTEXT" text="You are here &gt;" resourcekey="Breadcrumb"></dnn:text> <dnn:breadcrumb id="dnnBREADCRUMB" rootlevel="0" separator="&nbsp;&gt;&nbsp;" runat="server"></dnn:breadcrumb> <!-- Breadcrumb Code -->
<p>
                        
        </p></div></div>
</div><article class="art-post art-article">
                                <h2 class="art-postheader">Admin Module</h2>
                                
                                
                                <div class="mainwrapper">
  <div class="leftother" >
    <div class="l">
	<div style="margin-top: 0px; margin-right: 10px;background-color:#CCCCCC; width:17%; height:400px" >
	 <?php
if ($_SESSION['level']==1){
	
  echo '<a href="#2" class="cross-link" style="border:thin #FFFFFF solid">Admin Dashboard</a><br />';
  echo '<a href="#1" class="cross-link">Add Hotel</a><br />';
  echo '<a href="#1" class="cross-link">Monitor Orders</a><br />';
  echo '<a href="#4" class="cross-link">Food Inventory</a><br />';
  echo '<a href="#1" class="cross-link">Profile</a><br />';
  echo '<a href="admin_index.php">logout</a><br />';
 
 }
 ?> 
 <?php
if ($_SESSION['level']==2){
	
  echo '<a href="#2" class="cross-link">View Booker Comments</a><br />';
  echo '<a href="#1" class="cross-link">Monitor Reservation</a><br />';
  echo '<a href="#3" class="cross-link">Generate Reports</a><br />';
  echo '<a href="admin_index.php">logout</a><br />';
 }
 ?> 
	</div>
	
	
	</div>
	
	<div class="r" >

	
<div class="right3" style="margin-left:300px; margin-top:-450px;">
  
    <div class="slider-wrap">
      <div id="slider1" class="csw">
        <div class="panelContainer">
          <div class="panel" title="Panel 1">
            <div class="wrapper">
			 <h2 class="art-postheader" style="">Add Hotel</h2>
			 <div style="color:#FF0000; margin-right:100px;"><p>Fields in * are required</p></div>
			 <?php
			 include'db.php';
			 if(isset($_REQUEST['submit'])){
			 $sel=mysqli_query($con,"select * from hotels where hotel_email='".$_REQUEST['email']."'");
			 if(mysqli_num_rows($sel)>0){
			 echo "<img src='1433077051_cancel.png' width='24' height='24'/><span style='color:red'>That hotel is already registered!</span>";
			 }else{
			 if(empty(is_uploaded_file($_FILES['image']['tmp_name']))){
			 $sql = mysqli_query($con,"insert into hotels(hotel_name,hotel_contact,hotel_email,hotel_loc)values('".$_REQUEST['hname']."', '".$_REQUEST['contact']."', '".$_REQUEST['email']."', '".$_REQUEST['loc']."')") or die(mysqli_error($con));
			 if( $sql){
			 echo "<img src='1433075297_ok-green.png'/><span style='color:green'>Successfully inserted hotel! Add another...</span>";
			 }else{
			 echo "<img src='1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in insertion!</span>";
			 }
			 }else{
	        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "logos/" . $_FILES["image"]["name"]);
                                $location = "logos/" . $_FILES["image"]["name"];
			$sql = mysqli_query($con,"insert into hotels(hotel_name,hotel_contact,hotel_email,hotel_logo,hotel_loc)values('".$_REQUEST['hname']."', '".$_REQUEST['contact']."', '".$_REQUEST['email']."', '".$location."', '".$_REQUEST['loc']."')") or die(mysqli_error($con));
			 if( $sql){
			 echo "<img src='1433075297_ok-green.png'/><span style='color:green'>Successfully inserted hotel! Add another...</span>";
			 }else{
			 echo "<img src='1433077051_cancel.png' width='24' height='24'/><span style='color:red'>An error occurred in insertion!</span>";
			 }
			 }
			 }
			 }
			 ?>
			 
	<form action="" method="post" name="register" id="form-login" onsubmit="return validateForm()" enctype="multipart/form-data">
	
  <fieldset class="input" style="border: 0 none;">
    <p id="form-login-username">
      <label for="modlgn_username">Hotel Name<span style="color:#FF0000">*</span>:</label>
      <br />
      <input id="modlgn_username" type="text" placeholder="please enter hotel name" name="hname" class="inputbox" alt="hname" style="width:70%" />
    </p>
    <p id="form-login-password">
      <label for="modlgn_passwd">Contact<span style="color:#FF0000">*</span>:</label>
      <br /> 
      <input id="modlgn_passwd" type="number" placeholder="please enter hotel contact" name="contact" class="inputbox" size="18" alt="contact" style="width:70%" />
    </p>
	 <p id="form-login-username">
      <label for="modlgn_username">Email<span style="color:#FF0000">*</span>:</label>
      <br />
      <input id="modlgn_username" type="email" name="email" class="inputbox" placeholder="please enter hotel email" alt="email" style="width:70%" />
    </p>
	 <p id="form-login-username">
      <label for="modlgn_username">Address<span style="color:#FF0000">*</span>:</label>
      <br />
      <textarea cols="30" rows="10" id="modlgn_username" name="loc" class="inputbox" placeholder="please enter hotel address" alt="address" style="width:70%"></textarea>
    </p>
	 <p>&nbsp;</p>
	 <p id="form-login-username">
      <label for="modlgn_username">Logo:</label>
      <br />
      <input id="modlgn_username" type="file" name="image" class="inputbox" alt="logo" style="width:70%" />
    </p>
	
	 <p>&nbsp;</p>
	 <p>
    <input type="submit" value="Register" name="submit" class="art-button" />  
	</p>  
  </fieldset>
			  
			  </div>
            </div>
          </div>
		  
        </div>
        <!-- .panelContainer -->
      </div>
      <!-- #slider1 -->
    </div>
  </div>
	
	</div>
  </div>
           <div class="art-postcontent art-postcontent-0 clearfix"><p><br></p></div>

</article></div>
                    </div>
                </div>
            </div><footer class="art-footer">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p> Copyright © 2015. All Rights Reserved. &nbsp;&nbsp;</p>
    </div>
    </div>
</div>

</footer>

    </div>
    <p class="art-page-footer">
        <span id="art-footnote-links">Designed by Kanim.</span>
    </p>
</div>


</body></html>