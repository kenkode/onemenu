<?php
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
<header class="art-header">


    <div class="art-shapes">

            </div>
<h1 class="art-headline" data-left="4.01%">
    <a href="#">Snack</a>
</h1>
<h2 class="art-slogan" data-left="4.45%">HOUSE</h2>




<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.html" class="">Home</a></li><li><a href="contact-us.html" class="">Contact Us</a></li><li><a href="category.html" class="">Category</a><ul class=""><li><a href="category/african.html" class="">African</a></li><li><a href="category/breakfast.html" class="">Breakfast</a></li><li><a href="category/snacks.html" class="">Snacks</a></li><li><a href="category/fruitsjuices.html" class="">Fruits&amp;juices</a></li><li><a href="category/beverages.html" class="">Beverages</a></li><li><a href="category/pizza.html" class="">Pizza</a></li></ul></li><li><a href="partners.html" class="">Partners</a></li></ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><div class="art-block clearfix">
        <div class="art-blockcontent"><form action="#" method="post" name="login" id="form-login">
  <fieldset class="input" style="border: 0 none;">
   </div>
</div><div class="art-block clearfix">
        <div class="art-blockcontent"><p> </p><nav class="nav clearfix"> <dnn:menu menustyle="Menu" runat="server"> <templatearguments> <dnn:templateargument name="class" value="hmenu"></dnn:templateargument> </templatearguments> </dnn:menu> </nav> <div class="sheet clearfix"> <!-- Breadcrumb Code --> <dnn:text runat="server" id="dnnTEXT" text="You are here &gt;" resourcekey="Breadcrumb"></dnn:text> <dnn:breadcrumb id="dnnBREADCRUMB" rootlevel="0" separator="&nbsp;&gt;&nbsp;" runat="server"></dnn:breadcrumb> <!-- Breadcrumb Code -->
<p>
                        
        </p></div></div>
</div><article class="art-post art-article">
                                <h2 class="art-postheader">Admin Module</h2>
                                
                                
                                <div class="mainwrapper">
  <div class="leftother">
    <div class="l">
	<div style="margin-top: 225px; margin-right: 10px;">
	 <?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	
  echo '<a href="#2" class="cross-link">View Booker Comments</a><br />';
  echo '<a href="#1" class="cross-link">Monitor Orders</a><br />';
  echo '<a href="#3" class="cross-link">Generate Reports</a><br />';
  echo '<a href="#5" class="cross-link">Room Inventory</a><br />';
  echo '<a href="#4" class="cross-link">Food Inventory</a><br />';
  echo '<a href="home.php">logout</a><br />';
 
 }
 ?> 
 <?php
if ($_SESSION['SESS_FIRST_NAME']=="frontdesk"){
	
  echo '<a href="#2" class="cross-link">View Booker Comments</a><br />';
  echo '<a href="#1" class="cross-link">Monitor Reservation</a><br />';
  echo '<a href="#3" class="cross-link">Generate Reports</a><br />';
  echo '<a href="home.php">logout</a><br />';
 }
 ?> 
	</div>
	
	
	</div>
	<div class="r">
	
	
	
	
<div class="right3">
  
    <div class="slider-wrap">
      <div id="slider1" class="csw">
        <div class="panelContainer">
          <div class="panel" title="Panel 1">
            <div class="wrapper">
			  <div class="view">
			  <table id="mytable" cellspacing="0">
  <tr>
    <td width="191" id="label">Name</td>
    <td width="73" id="label">Mpesa ID</td>
    <td width="85" id="label">Address</td>
    <td width="96" id="label">Phone </td>
    <td width="90" id="label">Action</td>
  </tr>
              <?php
			   $con = mysql_connect("localhost", "root", "");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("shopping", $con);
								
								$result2 = mysql_query("SELECT * FROM customers where mpesaid != ''");
								
								
								while($row = mysql_fetch_array($result2))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row['name'].' ' .$row['lastname'].'</td>';
    								echo '<td class="contacts">'.$row['mpesaid'].'</td>';
									echo '<td class="contacts">'.$row['address'].'</td>';
									echo '<td class="contacts">'.$row['phone'].'</td>';;
									$r=$row['orderid'];
									$result1 = mysql_query("SELECT * FROM order_detail WHERE orderid = '$r'");
			while($row1 = mysql_fetch_array($result1))
			{
			echo $row1['type'];
			}
									echo '</td>';
									echo '<td class="contacts">'.$row['result'].'</td>';
									echo '<td class="contacts">'.'<a href=out.php?id=' . $row["serial"] . '>' . 'Check Out' . '</a>'.'</td>';
  								echo '</tr>';
							
								  }
			  
			  ?>
			  </table>
			  </div>
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
          <div class="panel" title="Panel 2">
            <div class="wrapper">
			<table id="mytable" cellspacing="0">
  <tr>
    <td width="207" id="label">Name</td>
    <td width="322" id="label">Email Address</td>
    <td width="126" id="label">Action</td>
  </tr>
              <?php
			   $con = mysql_connect("localhost", "root", "");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("shopping", $con);
								
								$result3 = mysql_query("SELECT * FROM comment");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row3['name'].'</td>';
    								echo '<td class="contacts">'.$row3['email'].'</td>';
									echo '<td class="contacts">'.'<a rel="facebox" href=viewcomment.php?id=' . $row3["comment_id"] . '>' . 'Read Message' . '</a>'.'</td>';
  								echo '</tr>';
							
								  }
			  
			  ?>
			  </table>
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
          <div class="panel" title="Panel 3">
            <div class="wrapper">
              <div class="view">
			  <table id="mytable" cellspacing="0">
  <tr>
    <td width="191" id="label">Date</td>
    <td width="73" id="label">Customer ID</td>
    <td width="85" id="label">Departure</td>
    <td width="96" id="label">Room Type </td>
    <td width="105" id="label">No. of Nights</td>
    <td width="90" id="label">Action</td>
  </tr>
              <?php
			   $con = mysql_connect("localhost", "root", "");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("shopping", $con);
								
								$result2 = mysql_query("SELECT * FROM `orders` WHERE date < (NOW() - INTERVAL 10 MINUTE)");
								
								
								while($row = mysql_fetch_array($result2))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row['date'].' ' .$row['lastname'].'</td>';
    								echo '<td class="contacts">'.$row['customerid'].'</td>';
									echo '<td class="contacts">'.$row['departure'].'</td>';
									echo '<td class="contacts">';
									$r=$row['serial'];
									$result1 = mysql_query("SELECT * FROM order_detail WHERE orderid = '$r'");
			while($row1 = mysql_fetch_array($result1))
			{
			echo $row1['type'];
			}
									echo '</td>';
									echo '<td class="contacts">'.$row['result'].'</td>';
									echo '<td class="contacts">'.'<a href=viewreservation.php?id=' . $row["reservation_id"] . '>' . 'Preview' . '</a>'.'</td>';
  								echo '</tr>';
							
								  }
			  
			  ?>
			  </table>
			  </div>
            </div>
          </div>
		  
		  
		  
		  
		  
          <div class="panel" title="Panel 4">
            <div class="wrapper">
              <div class="view">
			  <table id="mytable" cellspacing="0">
				  <tr>
					<td width="93" id="label">Food Item</td>
					<td width="44" id="label">Description</td>
					
					<td width="72" id="label">Price</td>
					<td width="51" id="label">Image</td>
					<td width="51" id="label">Category</td>
					<td width="51" id="label">Restaurant</td>
					<td width="80" id="label">Action</td>
				  </tr>
				  <?php
			   $con = mysql_connect("localhost", "root", "");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("shopping", $con);
								
								$result3 = mysql_query("SELECT * FROM african");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['name'].'</td>';
									echo '<td>'.$row3['description'].'</td>';
									echo '<td>'.$row3['price'].'</td>';
									echo '<td>';
									echo'<a rel="facebox" href=editpic.php?id=' . $row3["serial"] . '>' . '<img width=72 height=52 alt="Image not available" src=' . $row3["image"] . '>' . '</a>';
								
									echo '</td>';
									echo '<td>'.$row3['category'].'</td>';
									echo '<td>'.$row3['restaurant'].'</td>';
									echo '<td>';
									echo'<a rel="facebox" href=editroom.php?id=' . $row3["serial"] . '>' . 'Edit' . '</a>';
									echo ' | ';
									echo'<a rel="facebox" href=deleteroom.php?id=' . $row3["serial"] . '>' . 'Delete' . '</a>';
									echo '</td>';
								 echo '</tr>';
							
								  }
			  
			  ?>
			  
			  
			  </table><br />
			  <a rel="facebox" href="addroom.php">Add Food Item
			  
			  </a></div>
            </div>
          </div>
		  
		  
		  
		

 <div class="panel" title="Panel 5">
            <div class="wrapper">

			<div class="view">
			  <table id="mytable" cellspacing="0">
				  <tr>
					<td width="93" id="label">Arrival</td>
					<td width="44" id="label">Departure</td>
					<td width="100" id="label">Quantity Reserve</td>
					<td width="149" id="label">Room Type</td>
					<td width="180" id="label">Confirmation Number</td>
                                        <td width="80" id="label">Status</td>
				  </tr>
				  <?php
			   $con = mysql_connect("localhost", "root", "");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("shopping", $con);
								
								$result3 = mysql_query("SELECT * FROM roominventory where status != 'out'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['arrival'].'</td>';
									echo '<td>'.$row3['departure'].'</td>';
									echo '<td>'.$row3['qty_reserve'].'</td>';
									
									echo '<td>';
                                                               $ro=$row3['room_id'];
                                                             $result4 = mysql_query("SELECT * FROM room where room_id='$ro'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
echo $row4['type'];
                                                                  }


									echo '</td>';
                                                                        echo '<td>'.$row3['confirmation'].'</td>';
                                                                        echo '<td>'.$row3['status'].'</td>';
								 echo '</tr>';





								  }




							$result5 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='6'");
				                        while($row5 = mysql_fetch_array($result5))
				                           {
echo 'Toal reserve Room of Superior Room: ';
echo $row5['sum(qty_reserve)'];
echo '<br>';
                                                           }
$result6 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='7'");
				                        while($row6 = mysql_fetch_array($result6))
				                           {
echo 'Toal reserve Room of Deluxe Room: ';
echo $row6['sum(qty_reserve)'];
echo '<br>';
                                                           }
$result7 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='8'");
				                        while($row7 = mysql_fetch_array($result7))
				                           {
echo 'Toal reserve Room of Standard Single Room: ';
echo $row7['sum(qty_reserve)'];
echo '<br>';
                                                           }
$result8 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='9'");
				                        while($row8 = mysql_fetch_array($result8))
				                           {
echo 'Toal reserve Room of Standard Single Room: ';
echo $row8['sum(qty_reserve)'];
echo '<br>';
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
    <div class="art-layout-cell layout-item-0" style="width: 30%">
        <p>Copyright © 2014 - 2015. All Rights Reserved. &nbsp;&nbsp;</p>
    </div><div class="art-layout-cell" style="width: 25%">
        <p><img width="32" height="32" alt="" src="images/rss_32.png">&nbsp;&nbsp;<img width="32" height="32" alt="" src="images/facebook_32.png">&nbsp;&nbsp;<img width="32" height="32" alt="" src="images/twitter_32.png"></p>
    </div><div class="art-layout-cell" style="width: 45%">
        <p style="text-align: right">Sign up to newsletter &nbsp;<input style="font-style: italic; font-size: 13px; width: 170px; height: 28px;color: #808080" value=" Enter email">&nbsp;&nbsp;<a class="art-button">Subscribe</a></p>
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