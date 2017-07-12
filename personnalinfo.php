<?php
session_start();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title>New Page</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
<link href="css/main.css" rel="stylesheet" type="text/css" />

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
<!--sa show kag hide nga java script-->
<script language="javascript" type="text/javascript">
function showHide(shID) {
	if (document.getElementById(shID)) {
		if (document.getElementById(shID+'-show').style.display != 'none') {
			document.getElementById(shID+'-show').style.display = 'none';
			document.getElementById(shID).style.display = 'block';
		}
		else {
			document.getElementById(shID+'-show').style.display = 'inline';
			document.getElementById(shID).style.display = 'none';
		}
	}
}
</script>
<style type="text/css">
	

	/* This CSS is used for the Show/Hide functionality. */
	.more {
		display: none;
		border-top: 1px solid #666;
		border-bottom: 1px solid #666; }
	a.showLink, a.hideLink {
		text-decoration: none;
		color: #36f;
		padding-left: 8px;
		background: transparent url(down.gif) no-repeat left; }
	a.hideLink {
		background: transparent url(up.gif) no-repeat left; }
	a.showLink:hover, a.hideLink:hover {
		border-bottom: 1px dotted #36f; }
.style5 {color: #FF9900}
a:link {
	color: #0000FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
	color: #FFFF00;
}
a:active {
	text-decoration: none;
}
 #errmsg { color:red; }
 #errmsg1 { color:red; }
</style>


<script type="text/javascript">
function validateForm()
{

var y=document.forms["personal"]["name"].value;
var a=document.forms["personal"]["last"].value;
var b=document.forms["personal"]["address"].value;
var c=document.forms["personal"]["city"].value;
var d=document.forms["personal"]["zip"].value;
var e=document.forms["personal"]["country"].value;
var f=document.forms["personal"]["email"].value;
var g=document.forms["personal"]["cemail"].value;
var x=document.forms["personal"]["cnumber"].value;
var i=document.forms["personal"]["password"].value;
var z=document.forms["personal"]["card"].value;

var atpos=f.indexOf("@");
var dotpos=f.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
if( f != g ) {
alert("email does not match");
  return false;
} 
if ((a=="Lastname" || a=="") || (b=="Address" || b=="") || (c=="City" || c=="") || (d=="ZIP Code" || d=="") || (e=="Country" || e=="") || (f=="Email" || f=="") || (g=="Confirm Email" || g=="")|| (x=="Contact Number" || x=="") || (y=="Firstname" || y=="") || (i=="Password" || i=="") (z=="card" || z=="") ||)
  {
  alert("all field are required!");
  return false;
  }
 
if (document.personal.condition.checked == false)
{
alert ('pls. agree the term and condition of this hotel');
return false;
}
else
{
return true;
}
}
</script>
<script type="text/javascript">
function validateForm1()
{
var r=document.forms["log"]["email"].value;
var g=document.forms["log"]["password"].value;
var atpos=r.indexOf("@");
var dotpos=r.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=r.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }  

if ((a==null || a==""))
  {
  alert("pls.enter your password");
  return false;
  }
}
</script>

<!--sa watermark-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
<script type="text/javascript">
jQuery(function($){
   $("#name").Watermark("Firstname");
   $("#last").Watermark("Lastname");
   $("#address").Watermark("Address");
   $("#city").Watermark("City");
   $("#zip").Watermark("ZIP Code");
   $("#country").Watermark("Country");
   $("#email").Watermark("Email");
   $("#cemail").Watermark("Confirm Email");
   $("#cnumber").Watermark("Contact Number");
   $("#password").Watermark("Password");
   $("#em").Watermark("Email Address");
   $("#cardtype").Watermark("Credit Card");
      $("#cardnumber").Watermark("Card Number");
   $("#scode").Watermark("Security Code");
   $("#month").Watermark("Month");
   $("#year").Watermark("Year");
   $("#pass").Watermark("Password");

   });
</script>

<!--sa input that accept number only-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    //called when key is pressed in textbox
	$("#zip").keypress(function (e)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
	  {
		//display error message
		$("#errmsg").html("Number Only").show().fadeOut("slow"); 
	    return false;
      }	
	});
	$("#cnumber").keypress(function (a)  
	{ 
	  //if the letter is not digit then display error and don't type anything
	  if( a.which!=8 && a.which!=0 && (a.which<48 || a.which>57))
	  {
		//display error message
		$("#errmsg1").html("Number Only").show().fadeOut("slow"); 
	    return false;
      }	
	});

  });
  </script>

</script>
</head>

<body>
<div id="art-main">
<header class="art-header">


    <div class="art-shapes">

            </div>
<h2 class="art-slogan" data-left="1.33%">Travel Kenya Safaris</h2>


<div class="art-textblock art-textblock-1949152464" data-left="97.52%">
        <div class="art-textblock-1949152464-text-container">
        <div class="art-textblock-1949152464-text">&nbsp;<a href="http://www.facebook.com/" class="art-facebook-tag-icon"></a>&nbsp;</div>
    </div>
    
</div><div class="art-textblock art-textblock-1743052658" data-left="92.98%">
        <div class="art-textblock-1743052658-text-container">
        <div class="art-textblock-1743052658-text">&nbsp;<a href="https://twitter.com/" class="art-twitter-tag-icon"></a>&nbsp;</div>
    </div>
    
</div>
<div class="art-textblock art-object251235602" data-left="99.2%">
    <form class="art-search" name="Search" action="javascript:void(0)">
    <input type="text" value="">
            <input type="submit" value="Search" name="search" class="art-search-button">
    </form>
</div>
                        
                    
</header>
<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="home.html" class="">Home</a></li><li><a href="about-us.html" class="">About Us</a></li><li><a href="safari-packages.html" class="">Safari Packages</a><ul class=""><li><a href="safari-packages/kenya-camping-safaris-or-economy-safaris-from-mombasa.html" class="">KENYA CAMPING SAFARIS or ECONOMY SAFARIS FROM MOMBASA</a></li><li><a href="safari-packages/honeymoon-safaris.html" class="">Honeymoon Safaris</a></li><li><a href="safari-packages/4-days-3-nights-lake-nakuru-and-maasai-mara.html" class="">4 Days 3 Nights Lake Nakuru and Maasai Mara.</a></li><li><a href="safari-packages/16-days-15-night-kenya-safaris-budget-package.html" class="">16 Days 15 Night Kenya Safaris Budget Package</a></li><li><a href="safari-packages/11-days-10-night-mbuni-safaris.html" class="">11 Days 10 Night Mbuni Safaris</a></li><li><a href="safari-packages/7-days-in-kenya-highlands-birding-safaris.html" class="">7 Days in Kenya Highlands Birding Safaris</a></li><li><a href="safari-packages/1-day-mombasa-city-tours.html" class="">1 Day Mombasa City Tours</a></li><li><a href="safari-packages/1-day-kenya-shimba-hills-national-reserve.html" class="">1 Day Kenya Shimba Hills National Reserve.</a></li><li><a href="safari-packages/1-day-tsavo-east-national-park.html" class="">1 DAY TSAVO EAST NATIONAL PARK</a></li><li><a href="safari-packages/6-days-5-nights-masai-mara-lake-nakuru-amboselitsavo-east.html" class="">6 Days 5 Nights Masai Mara/ Lake Nakuru/ Amboseli/Tsavo east</a></li><li><a href="safari-packages/14-days-travel-in-kenya-africa-wildlife-adventures-and-mombasa-beach-holidays.html" class="">14 Days Travel in Kenya Africa Wildlife Adventures and Mombasa Beach Holidays</a></li><li><a href="safari-packages/12-days-best-of-safari-in-kenya-and-tanzania-authentic-safaris.html" class="">12 Days Best of  Safari in Kenya and Tanzania Authentic Safaris</a></li><li><a href="safari-packages/new-page.html" class="">New Page</a></li></ul></li><li><a href="safari-destinations.html" class="">Safari Destinations</a><ul class=""><li><a href="safari-destinations/11-day-safarimasai-maralake-nakuru-or-naivashaamboselitsavo-east-and-tsavo-west-national-park.html" class="">11 Day Safari&nbsp;Masai Mara/Lake Nakuru or Naivasha/Amboseli/Tsavo East and Tsavo West National Park</a></li><li><a href="safari-destinations/the-great-rift-valley.html" class="">The Great Rift Valley</a></li><li><a href="safari-destinations/kenya-safari-lake-magadi-bird-watching.html" class="">Kenya Safari Lake Magadi Bird Watching</a></li><li><a href="safari-destinations/meru-national-park.html" class="">Meru National Park</a></li><li><a href="safari-destinations/lake-turkana-and-ewaso-nyiro-river.html" class="">Lake Turkana And Ewaso Nyiro River</a></li><li><a href="safari-destinations/the-samburu.html" class="">The Samburu</a></li><li><a href="safari-destinations/mt-kenya.html" class="">Mt Kenya</a></li></ul></li><li><a href="bookings.html" class="active">Bookings</a></li><li><a href="national-parks.html">National Parks</a></li><li><a href="gallery.html">Gallery</a></li><li><a href="faqs.html">FAQs</a></li><li><a href="contacts.html">Contacts</a></li></ul> 
    </nav>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <div class="art-postmetadataheader">
                                        <h2 class="art-postheader">Reservations</h2>
                                    </div>            
                
</article></div>
                    </div>
                </div>
                
                <div style="display:none;">
<?php

	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	$no_rooms = $_POST['no_rooms'];
	$roomid = $_POST['roomid'];
	$result = $_POST['result'];
	
?>
</div>
	<div class="right3">
  <div style="float: left; margin-left: 25px; margin-top: 12px; font-family:Arial, Helvetica, sans-serif;">
  
 
  <br />
Already an existing user?
            <a href="#" id="example-show" class="showLink" onclick="showHide('example');return false;">login</a>
            </p>
            <div id="example" style="border-top-width: 0px; border-bottom-width: 0px;" class="more">
              <div class="f" style="margin-left: 5px;">
			  <form action="payment1.php" method="post" style="height: 89px; margin-top: -31px;" onsubmit="return validateForm1()" name="log">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <input name="n_room" type="hidden" value="<?php echo $no_rooms; ?>" />
  <input name="rm_id" type="hidden" value="<?php echo $roomid; ?>" />
  <input name="result" type="hidden" value="<?php echo $result; ?>" />
                  <input name="email" type="text" class="ed" id="em" /><br />
                  <input name="password" type="text" class="ed" id="pass" /><br />
                  <input name="login" type="submit" value="login" />
				  </form>
              </div>
              <p style="margin-bottom: 0px; margin-top: 0px;"><a href="#" id="example-hide" class="hideLink" onclick="showHide('example');return false;">Cancel</a></p>
            </div>
      <br />
  
  </div>
   <div style="float: right; margin-right: 0px; margin-top: 12px; color:#000000; font-family:Arial, Helvetica, sans-serif; width:489px;">
    
 <form action="payment.php" method="post" style="margin-top: -31px;" onsubmit="return validateForm()" name="personal">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <input name="n_room" type="hidden" value="<?php echo $no_rooms; ?>" />
  <input name="rm_id" type="hidden" value="<?php echo $roomid; ?>" />
  <input name="result" type="hidden" value="<?php echo $result; ?>" />
<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>






  <br />
  <h2>Personal Details</h2>
 <input name="firstname" type="text" class="ed" id="name" /> 
 <input name="lastname" type="text" class="ed" id="last" /> <br />
 <input name="address" type="text" class="ed" id="address" /> 
 <input name="city" type="text" class="ed" id="city" /> <br />
<input name="country" type="text" class="ed" id="country" />
  <input name="zip" type="text" class="ed" id="zip" /> <span id="errmsg"></span> <br />
 <input name="email" type="text" class="ed" id="email" /> 
 <input name="cemail" type="text" class="ed" id="cemail" /> <br />
 <input name="password" type="password" class="ed" id="password" />
 <input name="cnumber" type="text" class="ed" id="cnumber" /></span>  <br />
<h2>Credit Card Details</h2> 

Card Type:<br \>
 <select name="cardtype" id="card">
       		      <option selected>***please pick one***</option>
       		      <option value="1">Visa</option>
       		      <option value="2">Mastercard</option>
       		       <br />
Card Number:
 <input name="cardnumber" type="text" class="ed" id="cardnumber"><span id="errmsg1"></span>  <br />
 Expiration Date:
 <table row="1" col="2" border="0">
       <tr>
       <td><select name="month" id="month">
       		      <option selected>month</option>
       		      <option>1</option>
       		      <option>2</option>
       		      <option>3</option>
       		      <option>4</option>
       		      <option>5</option>
       		      <option>6</option>
       		      <option>7</option>
       		      <option>8</option>
       		      <option>9</option>
       		      <option>10</option>
       		      <option>11</option>
       		      <option>12</option>
       		      </select></td>
       	<td> <select name="year" id="year"	>
       		      <option selected>year</option>
       		      <option>2013</option>
       		      <optiond>2014</option>
       		      <option>2015</option>
       		      <option>2016</option>
       		      <option>2017</option>
       		      <option>2018</option>
       		      <option>2019</option>
       		      <option>2020</option>
       		      </select></td>
       		      </tr></table><span id="errmsg1"></span>  <br />
Security Code:<br />
 <input name="scode" type="text" class="ed" id="scode" /><span id="errmsg1"></span>  <br />

 <label>
 <input type="checkbox" name="condition" value="checkbox" />
  <small>i agree the <a rel="facebox" href="#">terms and condition</a></small></label>
 <br />
 
 <input name="but" type="submit" value="Confirm" />
  </form>


  </div>
  </div>

  </div>
  <div class="leftother">
  
  <div class="reservation">
	  <div align="center" style="padding-top: 7px; font-size:24px;"><strong>RESERVATION  DETAILS</strong></div>
	<div style="margin-top: 14px;">
<label style="margin-left: 16px;">Check In Date : <?php echo $arival; ?></label><br />
<label style="margin-left: 3px;">Check Out Date : <?php echo $departure; ?></label><br />
<label style="margin-left: 71px;">Adults : <?php echo $adults; ?></label><br />
<label style="margin-left: 78px;">Child : <?php echo $child; ?></label><br />
<label style="margin-left: -9px;">Number Of Nights : <?php echo $result; ?></label><br />
      <BR />
  </div>
	</div>
	</div>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
            </div><footer class="art-footer">
<p style="float: left"><a href="#">Home</a>&nbsp;&nbsp;&nbsp; | &nbsp; &nbsp;<a href="#">About</a> &nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">Contacts<br></a>Copyright © 2013. All Rights Reserved.<br>
<br>
<br></p>

<br>
</footer>

    </div>
    <p class="art-page-footer">
        <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer by edwin nyagah.</span>
    </p>
</div>


</body></html>