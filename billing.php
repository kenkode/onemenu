<?php
	include("includes/db.php");
	include("includes/functions.php");
	
	if($_REQUEST['command']=='update'){
		$name=$_REQUEST['name'];
		$mpesaid=$_REQUEST['mpesaid'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		
		$result=mysql_query("insert into customers values('','$name','$mpesaid','$address','$phone')");
		$customerid=mysql_insert_id();
		$date=date('Y-m-d');
		$result=mysql_query("insert into orders values('','$date','$customerid')");
		$orderid=mysql_insert_id();
		
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
		}
		die('Thank You! your order has been placed!');
	}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title>Billing</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">



    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
 
 <script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
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
    <p id="form-login-username">
      <label for="modlgn_username">Username</label>
      <br />
      <input id="modlgn_username" type="text" name="username" class="inputbox" alt="username" style="width:100%" />
    </p>
    <p id="form-login-password">
      <label for="modlgn_passwd">Password</label>
      <br />
      <input id="modlgn_passwd" type="password" name="passwd" class="inputbox" size="18" alt="password" style="width:100%" />
    </p>
    <p id="form-login-remember">
      <label class="art-checkbox">
      <input type="checkbox" id="modlgn_remember" name="remember" value="yes" alt="Remember Me" />Remember Me
      </label>
    </p>
    <input type="submit" value="Login" name="Submit" class="art-button" />    
  </fieldset>
  <ul>
    <li>
      <a href="#">Forgot your password?</a>
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
                                <h2 class="art-postheader">Billing</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 100%" >
        <p>content here</p>
    </div>
    </div>
</div>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell" style="width: 25%" >
        <p><img width="156" height="149" alt="" src="images/thCAZNF81H.jpg"><br></p>
    </div><div class="art-layout-cell" style="width: 75%" >
        <p>billing code here</p>
        
        <form name="form1" onSubmit="return validate()">
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center">Billing Info</h1>
        <table border="0" cellpadding="2px">
        	<tr><td>Order Total:</td><td><?php echo get_order_total()?></td></tr>
            <tr><td>Your Name:</td><td><input type="text" name="name" /></td></tr>
            <tr><td>Address:</td><td><input type="text" name="address" /></td></tr>
            <tr><td>Mpesa ID:</td><td><input type="text" name="mpesaid" /></td></tr>
            <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
        </table>
	</div>
</form>
        
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