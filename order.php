<?php 
session_start();
include_once("config.php");
?>

<?php 
//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<?php 
//check to see URL variable is set and exists in db
if(isset($_GET['id'])){
include"db.php";
$id=preg_replace('#[^0-9]#i','',$_GET['id']);
//Use this variable to check if the ID exists, if yes get the product
//details, if no then exit script and give msg why
$sql=mysqli_query($con,"SELECT * FROM meal WHERE m_id='".$id."' LIMIT 1");
$productCount=mysqli_num_rows($sql);//count the output amount
if($productCount>0){
	//get all the product details
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){	
		 $product_name=$row["meal_name"];
		 $price=$row["price"];
		 $details=$row["description"];
  }
}else{
	 echo "That item doesn`t exist.";
	 exit();
}
}
?>
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
     
    <script src="jquery2.0.js"></script>
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
    <div class="products" style="width: 50%" >
	<?php
	if(isset($_REQUEST['submit'])){
		header("location:menu.php?hotelid=".$_REQUEST['hotel']);
		}
	?>
    <h3 style="color:#0CF">Order now while stock lasts</h3><br/>
       <form name="form1" method="post" action="">
<select name="hotel" required>
<option value="">--------Select Hotel-------</option>
 <?php
	   include'db.php';
	   $sel = mysqli_query($con,"select * from hotels");
	   while($row=mysqli_fetch_array($sel,MYSQLI_ASSOC)){
	   echo '<option value="'.$row['h_id'].'">'.$row['hotel_name'].'</option>';
	   }
	   ?>
</select><br/>
<input type="submit" name="submit" class="btn btn-success" value="View menu" /><br>
</form>

	</div>
</article></div>
                    </div>
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
<script type="text/javascript">
function getStates(){
var xmlhttp;
try{
xmlhttp = new XMLHttpRequest;
}catch(e){
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
if(xmlhttp){
var form = document['form1'];
var hid = form['hotel'].value;

xmlhttp.open("GET","http://localhost/one_menu/getStates.php?id="+hid,true);
xmlhttp.onreadystatechange = function(){
if(this.readyState == 4){
var s = document.createElement("select");
s.id="Bname"
s.name="Bname";
s.innerHTML=this.responseText;

if(form['Bname']){
form.replaceChild(s, form['Bname'])
}else{
form.insertBefore(s, form['submit']);
}
}
}
xmlhttp.send(null);
}
}
</script>

<script type="text/javascript">

$('#Bname').change(function() {
    selectedOption = $('option:selected', this);
    $('input[name=mealid]').val( selectedOption.data('mid') );
});

</script>

</body></html> 