<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title>SnackHouse Home</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>


<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style>

<!--sa poip up-->
 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
  <!--sa validate from-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["login"]["user"].value;
var a=document.forms["login"]["password"].value;
if ((y==null || y==""))
  {
  alert("you must enter your username");
  return false;
  }
  if ((a==null || a==""))
  {
  alert("you must enter your password");
  return false;
  }
 

}
</script>

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
    <ul class="art-hmenu"><li><a href="home.html" class="active">Home</a></li><li><a href="contact-us.html">Contact Us</a></li><li><a href="category.html">Category</a><ul><li><a href="category/african.php">African</a></li><li><a href="category/breakfast.php">Breakfast</a></li><li><a href="category/snacks.php">Snacks</a></li><li><a href="category/fruitsjuices.php">Fruits&amp;juices</a></li><li><a href="category/beverages.php">Beverages</a></li><li><a href="category/pizza.php">Pizza</a></li></ul></li><li><a href="partners.html">Partners</a></li></ul> 
    </nav>

                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><div class="art-block clearfix">
        <div class="art-blockcontent">
        <form action="login.php" method="post" name="login" id="form1" onsubmit="return validateForm()">
  <fieldset class="input" style="border: 0 none;">
  
    <p id="form-login-username">
      <label for="modlgn_username">Username</label>
      <br />
      <input id="modlgn_username" type="text" name="user" class="inputbox" alt="username" style="width:100%" />
    </p>
    <p id="form-login-password">
      <label for="modlgn_passwd">Password</label>
      <br />
      <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" alt="password" style="width:100%" />
    </p>
    <p id="form-login-remember">
      <label class="art-checkbox">
      <input type="checkbox" id="modlgn_remember" name="remember" value="yes" alt="Remember Me" />Remember Me
      </label>
    </p>
    <input type="submit" value="login" name="Submit" class="art-button" />    
  </fieldset>
  <ul>
    <li>
      <a rel="facebox" href=recover.php>Forgot Password? </a>
    </li>
    <li>
      <a href="#">Forgot your username?</a>
    </li>
    <li>
      <a href="#">Create an account</a>
    </li>
  </ul>
</form></div>
</div><div class="art-block clearfix">
        <div class="art-blockcontent"><p> </p><nav class="nav clearfix"> <dnn:menu menustyle="Menu" runat="server"> <templatearguments> <dnn:templateargument name="class" value="hmenu"></dnn:templateargument> </templatearguments> </dnn:menu> </nav> <div class="sheet clearfix"> <!-- Breadcrumb Code --> <dnn:text runat="server" id="dnnTEXT" text="You are here &gt;" resourcekey="Breadcrumb"></dnn:text> <dnn:breadcrumb id="dnnBREADCRUMB" rootlevel="0" separator="&nbsp;&gt;&nbsp;" runat="server"></dnn:breadcrumb> <!-- Breadcrumb Code -->
<p>
                        
        </p></div></div>
</div><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 50%" >
        <h4>Three-course dinning</h4>
        <p><img width="120" height="120" alt="" src="images/course.jpg" style="float: left; margin-right: 10px;" class=""></p>
        <p>From snacks to beverages to sumptous chef prepared delicacies, we've got your back. Simply make an order and we'll deliver it to the comfort of your home/office....</p>
    </div><div class="art-layout-cell layout-item-0" style="width: 50%" >
        <h4>Favorite desserts</h4>
        <p><img width="120" height="120" alt="" src="images/dessert.jpg" style="float: left; margin-right: 10px;" class=""></p>
        <p>The votes are in, and the winner is...</p>
    </div>
    </div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 25%" >
        <h4>Directions</h4>
        <p><span jsl="$x 3;" jstid="1666" style="font-weight: bold;">Norwich Union</span></p><h2 class="card-entity-subtitle cards-light" style="display: none;" jsl="$x 4;" jstid="1667"></h2><div class="cards-entity-address cards-strong" jsl="$x 6;" jstid="1669"><div class="cards-text-truncate-and-wrap" jsl="$x 7;" jstid="1670" jsinstance="0"><span jsl="$x 8;" jstid="1671">Shop 201, Norwich Union House, Mama Ngina Street</span></div><div class="cards-text-truncate-and-wrap" jsl="$x 7;" jstid="1672" jsinstance="*1"><span jsl="$x 8;" jstid="1673">Nairobi</span></div></div>
        <p><span style="font-weight: bold;">0700 123 456</span></p><p><a class="art-button">Locate on map</a></p>
    </div><div class="art-layout-cell layout-item-0" style="width: 25%" >
        <h4>We ARE OPENED</h4>
        <p><span style="font-weight: bold;">Mon - Sat, 8:30 AM - Until</span></p>
        <p>Feel like take out? Well, we've got you covered...</p>
        <p><a class="art-button" href="category.html">Proceed to order&gt;&gt;</a></p>
    </div><div class="art-layout-cell layout-item-0" style="width: 50%" >
        <h4>Latest Updates</h4>
        <p><img width="120" height="120" alt="" src="images/food-snack.jpg" style="float: left; margin-right: 10px;" class=""></p>
        <p style="font-weight: bold;">Currently trending dishes</p>
        <p>What's new and trending right now?</p>
        <p style="text-align: right;"><a class="art-button">Read more...</a></p>
    </div>
    </div>
</div>
</div>


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