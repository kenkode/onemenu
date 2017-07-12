<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title>ONE MENU Home</title>
     <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<link href="style/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">
    <link href="hotel/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="hotel/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
     
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <style>
        input[type=text],input[type=email],input[type=number]{
			width:300px;
			height:30px;
	   }
	   select{
		  margin-left:30px;
		 width:80px;
		 height:20px;
		   }
		   textarea{
			  width:300px;
			  height:100px;
			   }
	}
	</style>
		<script src="js/validate.min.js"></script>
		<script src="js/init.js"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="script.js"></script>
    <script src="script.responsive.js"></script>
    

<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
<body>
<div id="art-main">
<header class="art-header" style="background:url(images/pizza-329523_1280.jpg)">


    <div class="art-shapes">

            </div>
<h1 class="art-headline" data-left="4.01%">
    <a href="#">ONE</a>
</h1>
<h2 class="art-slogan" data-left="4.45%">MENU</h2>

<nav class="art-nav">
    <ul class="art-hmenu"><li><a href="index.php" class="active">Home</a></li><li><a href="order.php">Order</a></li><li><a href="#">Category</a><ul><li><a href="#">Breakfast</a></li><li><a href="#">African</a></li><li><a href="#">International</a></li><li><a href="#">Snacks</a></li><li><a href="#">Desserts</a></li><li><a href="#">Beverages</a></li></ul></li><li><a href="contact.php">Contact Us</a></li></ul> 
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
                                
                                                
     <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 50%" >
    <form method="post">
    <table>
    <?php
	if(isset($_REQUEST['submit'])){
		include'db.php';
		$ins = mysqli_query($con,"insert into comments(email,subject,comment,name,date)values('".$_REQUEST['email']."','".$_REQUEST['subject']."','".$_REQUEST['comment']."','".$_REQUEST['name']."','".date('Y-m-d')."')") or die(mysqli_error($con));
		if($ins){
			echo '<img src="images/1433075297_ok-green.png"/><span color="green">Thank you for your comment</span>';
	    }else{
			echo '<img src="images/1433075310_cancel_48.png" width="24" height="24"/><span color="red">Error occurred in sending comment...Pease try again!</span>';
			}
	}
	?>
    <tr><td><h3>Please leave a comment</h3></td></tr>
    <tr><td>Name*:</td><td><input type="text" name="name" placeholder="Your Names" required></td></tr>
    <tr><td>Email*:</td><td><input type="email" name="email" placeholder="Email" required></td></tr>
   <tr><td>Subject:</td><td><input type="text" name="subject" placeholder="Subject"></td></tr>
   <tr><td>Comment:</td><td><textarea name="comment" placeholder="Your comment"></textarea></td></tr>
   <tr><td><input name="submit" type="submit" value="Send" width="150"height="90" class="btn btn-success"></td></tr>
  </table>
  </form>
    </div>
    </div>
</div>
</div>

</article></div>
                    </div>
                </div>
            </div><footer class="art-footer" style="height:10%">
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 10%">
        <p>Copyright © 2015. All Rights Reserved. &nbsp;&nbsp;</p>
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