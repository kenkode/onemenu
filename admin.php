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
    <ul class="art-hmenu"><li><a href="admin.php" class="">Dashboard</a></li><li><a href="add_hotel.php" class="">Add Hotels</a></li><li><a href="#" class="">Orders</a><ul class=""><li><a href="" class="">Meals</a></li><li><a href="category/breakfast.html" class="">Customers</a></li><li><a href="" class="">Hotels</a></li><li><a href="" class="">Comments</a></li></ul></li><li><a href="" class="">Profile</a></li><li><a href="logout.php" class="">Logout</a></li></ul> 
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
	<div style="margin-top: 0px; margin-right: 10px; background-color:#CCCCCC; width:17%; height:400px" >
	 <?php
if ($_SESSION['level']==1){
	
  echo '<a href="#2" class="cross-link" style="border:thin #FFFFFF solid">Admin Dashboard</a><br />';
  echo '<a href="add_hotel.php" class="cross-link">Add Hotel</a><br />';
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
	<div class="r">
	
	
	
	
<div class="right3" style="float:right; margin-top:-450px; margin-left:250px;">
  
    <div class="slider-wrap">
      <div id="slider1" class="csw">
        <div class="panelContainer">
          <div class="panel" title="Panel 1">
            <div class="wrapper">
			  <div class="view">
			  <h2 class="art-postheader">Views</h2>
			  <table id="mytable" border="1" cellspacing="0">
  <tr>
  <td colspan="6" align="center">Orders</td></tr>
  <tr>
    <td width="191" id="label">Name</td>
    <td width="73" id="label">Email</td>
    <td width="96" id="label">Contact </td>
	<td width="85" id="label">Address</td>
	<td width="85" id="label">Total</td>
    <td width="90" id="label">Action</td>
  </tr>
              <?php
			  include'db.php';
								
								$result2 = mysqli_query($con,"SELECT * FROM customer where order_value != 0");
								
								
								while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row['customer_fname'].' ' .$row['customer_lname'].'</td>';
    								echo '<td class="contacts">'.$row['customer_email'].'</td>';
									echo '<td class="contacts">'.$row['customer_contact'].'</td>';
									echo '<td class="contacts">'.$row['customer_address'].'</td>';
									echo '<td class="contacts">'.$row['total'].'</td>';
									echo '<td class="contacts"><a href=view.php?id=' . $row["cust_id"] . '>View Details</a></td>';
  								    echo '</tr>';
							
								  }
			              ?>
			  </table><br />
			  </div>
            </div>
          </div>
		 
		  
          <div class="panel" title="Panel 2">
            <div class="wrapper">
			<table id="mytable" cellspacing="0" border="1"> 
  <tr>
  <td colspan="3">Comments</td></tr>
  <tr>
    <td width="207" id="label">Name</td>
    <td width="322" id="label">Email Address</td>
    <td width="126" id="label">Action</td>
  </tr>
              <?php

								$result3 = mysqli_query($con,"SELECT * FROM comments");
								
								
								while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row3['name'].'</td>';
    								echo '<td class="contacts">'.$row3['email'].'</td>';
									echo '<td class="contacts">'.'<a rel="facebox" href=viewcomment.php?id=' . $row3["comment_id"] . '>' . 'Read Message' . '</a>'.'</td>';
  								echo '</tr>';
							
								  }
			  
			  ?>
			  </table><br />
            </div>
          </div>
		  
          <div class="panel" title="Panel 3">
            <div class="wrapper">
              <div class="view">
			  <table id="mytable" cellspacing="0" border="1">
				  <tr>
				  <td colspan="8">Meals</td></tr>
                   <tr>
				    <td width="51" id="label">Image</td>
					<td width="93" id="label">Food Name</td>
					<td width="93" id="label">Hotel</td>
					<td width="93" id="label">Food Type</td>
					<td width="44" id="label">Description</td>
					<td width="72" id="label">Price</td>
					<td width="93" id="label">Stock</td>
					<td width="80" id="label">Action</td>
				  </tr>
				  <?php				
								$result3 = mysqli_query($con,"SELECT * FROM meal left join hotels on meal.hotel_id=hotels.h_id");
								
								
								while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC))
								  {
								 echo '<tr>';
								    echo '<td>'.$row3['photo'].'</td>';
									echo '<td>'.$row3['food'].'</td>';
									echo '<td>'.$row3['hotel_name'].'</td>';
									echo '<td>'.$row3['food_type'].'</td>';
									echo '<td>'.$row3['description'].'</td>';
									echo '<td>'.$row3['price'].'</td>';
									echo '<td>'.$row3['stock'].'</td>';
									echo '<td>';
									
									
									echo '<td>';
									echo'<a rel="facebox" href=editroom.php?id=' . $row3["serial"] . '>' . 'Edit' . '</a>';
									echo ' | ';
									echo'<a rel="facebox" href=deleteroom.php?id=' . $row3["serial"] . '>' . 'Delete' . '</a>';
									echo '</td>';
								 echo '</tr>';
							
								  }
			  
			  ?>
			  
			  
			  </table><br />
			  </div>
            </div>
          </div>
		  
		  
		  
		

 <div class="panel" title="Panel 4">
            <div class="wrapper">

			<div class="view">
			  <table id="mytable" cellspacing="0" border="1">
				  <tr>
				  <td colspan="7">Hotels</td></tr>
                    <tr>
					<td width="93" id="label">Hotel ID</td>
					<td width="93" id="label">LOGO</td>
					<td width="44" id="label">Name</td>
					<td width="100" id="label">Contact</td>
					<td width="149" id="label">Email</td>
					<td width="180" id="label">Address</td>
                    <td width="80" id="label">Action</td>
				  </tr>
				  <?php					
								$result3 = mysqli_query($con, "SELECT * FROM hotels ");
								
								
								while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['h_id'].'</td>';
									echo '<td><img src='.$row3['hotel_logo'].' width="100" height="100"/></td>';
									echo '<td>'.$row3['hotel_name'].'</td>';
									echo '<td>'.$row3['hotel_contact'].'</td>';
									echo '<td>'.$row3['hotel_email'].'</td>';
                                    echo '<td>'.$row3['hotel_loc'].'</td>';
                                    echo '<td><a rel="facebox" href=deletehotel.php?id=' . $row3["h_id"] . '>Delete</a></td>';
								    echo '</tr>';
								  }			  
			  ?>
			  
			  
			  </table><br />
	
			  
			  </div>
            </div>
          </div>
		  
		  <div class="panel" title="Panel 5">
            <div class="wrapper">

			<div class="view">
			  <table id="mytable" cellspacing="0" border="1">
				  <tr>
				  <td colspan="6">Customer details</td></tr>
                    <tr>
					<td width="93" id="label">Customer ID</td>
					<td width="93" id="label">Name</td>
					<td width="100" id="label">Contact</td>
					<td width="149" id="label">Email</td>
					<td width="180" id="label">Address</td>
                    <td width="80" id="label">Action</td>
				  </tr>
				  <?php					
								$result3 = mysqli_query($con, "SELECT * FROM customer");
								
								
								while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['cust_id'].'</td>';
									echo '<td>'.$row3['customer_fname'].' '.$row3['customer_lname'].'</td>';
									echo '<td>'.$row3['contact'].'</td>';
									echo '<td>'.$row3['email'].'</td>';
                                    echo '<td>'.$row3['address'].'</td>';
                                    echo '<td><a rel="facebox" href=deletecust.php?id=' . $row3["cust_id"] . '>Delete</a></td>';
								    echo '</tr>';
								  }			  
			  ?>
			  
			  
			  </table><br />
	
			  
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