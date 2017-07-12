<?php 
session_start();
//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
include"db.php";

?>
<?php 
//push items into array
if(isset($_REQUEST['id'])){
	$pid=$_REQUEST['id'];
	$wasFound=false;
	$i=0;
	//if the cart session variable is not set or cart array is empty
	if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])<1){
		//run if the cart is empty or not set
		$_SESSION["cart_array"]=array(0=>array("item_id"=>$pid,"quantity"=>1));
     }else{
	  //Run if cart has atleast one item in it
	  foreach($_SESSION["cart_array"]as $each_item){
		  $i++;
		  while(list($key,$value)=each($each_item)){
			 if($key=="item_id"&&$value==$pid){
			//that item is in the cart adjust quantity using array_splice()
			array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id"=>$pid,"quantity"=>$each_item['quantity']+1)));
			$wasFound=true;
		    } //close if condition
	     }//close while loop
	  }//close foreach loop
	  if($wasFound==false){
		  array_push($_SESSION["cart_array"],array("item_id"=>$pid,"quantity"=>1));
	  }
   }
   header("location:cart.php");
	exit();
}
?>
<?php 
// if user chooses to empty cart
if(isset($_GET['cmd'])&&$_GET['cmd']=="emptycart"){
	unset($_SESSION["cart_array"]);
}
?>
<?php 
// if user chooses to adjust item quantity
if(isset($_POST['item_to_adjust'])&&$_POST['item_to_adjust']!=""){
	$item_to_adjust=$_POST['item_to_adjust'];
	$quantity=$_POST['quantity'];
	$quantity=preg_replace('#[^0-9]#i','',$quantity);//filter everything but numbers
	if($quantity>=100){
	$quantity=99;	
	}
	if($quantity<1){
	$quantity=1;	
	}
	$i=0;
  foreach($_SESSION["cart_array"]as $each_item){
		  $i++;
		  while(list($key,$value)=each($each_item)){
			 if($key =="item_id"&&$value==$item_to_adjust){
			//that item is in the cart adjust quantity using array_splice()
			array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id"=>$item_to_adjust,"quantity"=>$quantity)));
		    } //close if condition
	     }//close while loop
	  }//close foreach loop
}
?>
<?php 
//To remove item from cart
if(isset($_POST['index_to_remove'])&&$_POST['index_to_remove']!=""){
	//Access the array and run code to remove that array index
$key_to_remove=$_POST['index_to_remove'];
	if(count($_SESSION["cart_array"])<=1){
		unset($_SESSION["cart_array"]);
	}else{
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>

<?php
if(isset($_REQUEST['first_name']) && isset($_REQUEST['last_name']) && isset($_REQUEST['email']) && isset($_REQUEST['contact']) && isset($_REQUEST['address'])){
	$ins = mysqli_query($con,"insert into customer(customer_fname,customer_lname,customer_email,customer_contact,customer_address)values('".$_REQUEST['first_name']."','".$_REQUEST['last_name']."','".$_REQUEST['email']."','".$_REQUEST['contact']."','".$_REQUEST['address']."')") or die(mysqli_error($con));
	$order = mysqli_multi_query($con,"insert into orders(meal_id,hotels_id,customer_id,amount,date_ordered)values('".$_POST['reference']."','".$_REQUEST['hid']."','".$row['cust_id']."','".$_POST['total_amount']."',NOW())") or die(mysqli_error($con));
	}
?>
<?php 
//render cart for user to view
$cartOutput="";
$cartTotal=""; 
$pp_checkout_btn=''; 
$product_id_array='';
$hotel_id='';

if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])<1){
  $cartOutput="<h3 align='center'>Your shopping cart is empty</h3>";		
}else{
	//start paypal checkout button pesapal-php-master/pesapal-iframe.php
	$pp_checkout_btn.='<form action="pesapal-php-master/pesapal-iframe.php" method="post">
	<input name="cmd" type="hidden" value="_cart">
	<input name="upload" type="hidden" value="1">
	<input type="hidden" name="type" value="MERCHANT" readonly="readonly" />
	
	';
	
	//start foreach loop
	  $i=0;
	  foreach($_SESSION["cart_array"]as $each_item){
		  $item_id=$each_item['item_id'];
		  $sql=mysqli_query($con,"SELECT * FROM meal left join hotels on meal.hotel_id=hotels.h_id WHERE meal.m_id='".$item_id."' LIMIT 1") or die(mysqli_error($con));
		  $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
		  	$product_name=$row["meal_name"];
			$price=$row["price"];
			$hotel_name=$row["hotel_name"];
			$details=$row['description'];
			$hid = $row['h_id'];
			$hotel_id .= $hid;
	     
		  $pricetotal=$price * $each_item['quantity'];
		  $cartTotal=$pricetotal + $cartTotal;
		 
		  setlocale(LC_MONETARY,"en_US");
		  $price=number_format($price, 2);
		  
	      $pricetotal=number_format($pricetotal, 2);
		  
		  //Dynamic checkout button assembly
		  $X=$i+1;
		  $pp_checkout_btn.='<input name="item_name_'.$X.'" type="hidden" value="'.$product_name.'">
		  <input name="amount_'.$X.'" type="hidden" value="'.$price.'">
		  <input name="price" type="hidden" value="'.$price.'">
		  <input name="description" type="hidden" value="'.$details.'">
		  <input type="hidden" name="reference" value="'.$row['m_id'].'" />
		  <input type="hidden" name="hid" value="'.$row['h_id'].'" />
		  <input type="hidden" name="total" value="'.$pricetotal.'" />
		  <input name="quantity_'.$X.'" type="hidden" value="'.$each_item['quantity'].'">';
		  $product_id_array.="$item_id-".$each_item['quantity']." , ";
		  //Dynamic table row assembly
		   $cartOutput.="<tr>";
		   $cartOutput.="<td>".$product_name."</td>";
		   $cartOutput.="<td>".$hotel_name."</td>";
		   $cartOutput.='<td>'.$details.'</td>';
		   $cartOutput.='<td>Ksh. '.$price."</td>";
		   $cartOutput.='<td><form action="cart.php" method="post">
		   <input name="quantity" type="text"size="1" maxlength="2"  value="'.$each_item['quantity'].'" style="width:45px;height:25px;">
		   <input name="adjustBtn'.$item_id.'"type="submit"value="change"/>
		   <input name="item_to_adjust" type="hidden" value="'.$item_id.'">
		   </form></td>';
		  // $cartOutput.='<td>'.$each_item['quantity'].'</td>';
		   $cartOutput.='<td>Ksh. '.$pricetotal.'</td>';
	       $cartOutput.='<td><form action="cart.php" method="post"><input name="deleteBtn'.$item_id.'"type="submit"value="X"/>
		   <input name="index_to_remove" type="hidden" value="'.$i.'"></form></td>';
	       $cartOutput.='</tr>'; //while(list($key,$value)=each($each_item)){
			 //$cartOutput.="$key: $value<br/>";
	 // }
	 $i++;
   }
          setlocale(LC_MONETARY,"en_US");
		  $cartTotal=number_format($cartTotal, 2);
		  $cart1 = $cartTotal;
   $cartTotal="Cart Total : Ksh. ".$cartTotal;
   //finish paypal checkoutbtn
   $pp_checkout_btn.='<input name="custom" type="hidden" value="'.$product_id_array.'">
   <input name="rm" type="hidden" value="2">
   <input name="cbt" type="hidden" value="Return to The Store">
   <input name="Ic" type="hidden" value="US">
   <input name="currency_code" type="hidden" value="Ksh">
   <h4>Fill in your details</h4>
   <input type="hidden" name="total_amount" value="'.$cart1.'">
   Firstname*:<input type="text" name="first_name" placeholder="Your firstname" required><br>
   Lastname*:<input type="text" name="last_name" placeholder="Your lastname" required><br>
   Email*:<input name="email" type="email" placeholder="Your email"><br>
   Contact*:<input name="contact" type="number" placeholder="Your contact"><br>
   Address*:<textarea name="address" placeholder="Your address" required></textarea><br>
   <input name="submit" type="image" src="images/pesa.png" alt="Make payment with PesaPal.Its fast, free and secure"width="150"height="90"><br/><br/>
  
   </form>
   ';
   ?>
    <?php
   if(isset($_REQUEST['submit_email'])){
   $sql = mysqli_query($con,"select * from customer where customer_email='".$_REQUEST['email_exist']."'") or die(mysqli_error($con));   
   if(mysqli_num_rows($sql)>0){
	   header("location:pesapal-iframe1.php");
	   }else{
		echo "<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>That email doesn`t exist!</span>";   
	   }
   }
   ?>
   <?php
   $pp_checkout_btn.='<form method="post">
   <h4>If already registered</h4>
   <input type="email" name="email_exist"><br/>
   <input name="submit_email" type="image" src="images/pesa.png" alt="Make payment with PesaPal.Its fast, free and secure"width="150"height="90">
   </form>';
}
?>

<html>
<head>
<title>Your Cart</title>

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
                        <!-- block -->
						
           
<div id="pageContent">
<div align="center"><h2>Food Cart</h2></div>
<div align="right" style="margin-right:32px;margin-top:24px;margin-bottom:5px;"><a href="order.php">+ Add another Item</a></div>
  <div style="margin-left:24px;margin-right:24px;margin-bottom:24px;margin-top:0px; text-align:left;">
  <br/>
  <table width="100%" border="1" cellpadding="6" cellspacing="0" class="table table-bordered" id="example">
 
    <tr bgcolor="#FFFFFF">
      <td bgcolor="#C8F0EB"><strong>Meal</strong></td>
      <td bgcolor="#C8F0EB"><strong>Hotel</strong></td>
      <td bgcolor="#C8F0EB"><strong>Description</strong></td>
      <td bgcolor="#C8F0EB"><strong>Unit Price</strong></td>
      <td bgcolor="#C8F0EB"><strong>Quantity</strong></td>
      <td bgcolor="#C8F0EB"><strong>Total</strong></td>
      <td bgcolor="#C8F0EB"><strong>Remove</strong></td>
    </tr>
   
     <?php echo $cartOutput; ?>
     
  </table>
  <br/>
  <a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
  <span style="float:right; color:#00F;"><?php echo $cartTotal; ?></span>
  <br/>
  <br/>
 <div align="right"> <?php echo $pp_checkout_btn; ?></div>
</div>  <br/>
</div>
<table border="0" width="1000px">
<tr>
<td>

</td>
</tr>
</table>
</div>
</div>
</div>

<?php
 if(isset($_REQUEST['email_exists'])){
		   $sql = mysqli_query($con,"select * from customer where customer_email='".$_REQUEST['email_exists']."'");
		   if(mysqli_num_rows($sql)){
			   header('location:pesapal-php-master/pesapal-iframe1.php');
			   }else{
				 echo 'Your email doesnt exist in the system';  
				   }
		   }
   
?>

<script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
				<script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
   <script type="text/javascript">
   $(document).ready(function() {
    $('#example').dataTable();
	$('#emailid').hide();
	$('#exists').click(function(){
		$('#emailid').show();
	  });
   });
   </script>

<script type="text/javascript">
function validate(){
	alert("
		  <?php
 if(isset($_REQUEST['email_exists'])){
		   $sql = mysqli_query($con,"select * from customer where customer_email='".$_REQUEST['email_exists']."'");
		   if(mysqli_num_rows($sql)){
			   header('location:pesapal-php-master/pesapal-iframe1.php');
			   }else{
				 echo 'Your email doesnt exist in the system';  
				   }
		   }
   
?>
	");
	}

</script>

</body>
</html>