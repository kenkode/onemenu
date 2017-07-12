<?php
error_reporting(0);
include'db.php';
session_start();
echo 'Thank for shopping with us! Please check your email for confirmation on your order...<br/>
You will be required to give the confirmation upon receiving your order....<a href="../index.php">Go back</a>
';

$total=0;
$new_stock=0;
foreach($_SESSION["cart_array"]as $each_item){
		$item_id=$each_item['item_id'];
		$sel = mysqli_multi_query($con,"select * from orders left join hotels on orders.hotels_id=hotels.h_id left join meal on orders.meal_id=meal.m_id left join customer on orders.customer_id=customer.cust_id where orders.customer_id='".$_REQUEST['id']."'") or die(mysqli_error($con));
		if($sel){
			do{
			if($result=mysqli_store_result($con)){
		while($user=mysqli_fetch_array($result)){
	$total+=$user['amount'];
	$new_stock=$user['stock']-$user['quantity'];
	
 $db=mysqli_query($con,"UPDATE orders SET order_value = 0 WHERE customer_id ='".$_REQUEST['id']."'") or die(mysqli_error($con));
 $db1=mysqli_query($con,"UPDATE meal SET stock = '".$new_stock."' WHERE m_id ='".$item_id."'") or die(mysqli_error($con));
	  if($db && $db1){
	  include '../smtp/Send_Mail.php';
	
$to=$user['customer_email'];
$subject="Booking Food Confirmation";
$body='Hi '.$user['customer_fname'].' '.$user['customer_lname'].' , <br/> <br/> This is to confirm that you have successfully booked <strong><u>'.$user['meal_name'].'</u></strong> from  <strong><u>'.$user['hotel_name'].'</u></strong> hotel on <strong>'.$user['date_ordered'].'</strong>. <br/>Please remember that this information will be used to confirm the meal you have bought so remember to present it once you receive your order...<br/><br/><table><tr><td colspan = "2"><strong> Meal details include:</strong></td></tr><tr><td></td></tr><tr><td><strong>Meal name</strong>:</td><td>'.$user['meal_name'].'</td></tr><tr><td><strong>Customer name</strong>:</td><td>'.$user['customer_fname'].' '.$user['customer_lname'].'</td></tr><tr><td><strong>Contact:</strong></td><td>'.$user['customer_contact'].'</td></tr><tr><td><strong>Address </strong>:</td><td>'.$user['customer_address'].'</td></tr><tr><td><strong>Amount</strong>:</td><td>Ksh. '.$user['amount'].'</td></tr><tr><td><strong>Booking date</strong>:</td><td>'.$user['date_ordered'].'</td></tr><tr><td><strong>Total amount</strong>:</td><td>Ksh. '.$total.'</td></tr></table><br/><br/> Thank you for visiting our site and booking a meal... For more information visit our site on <a href="http://localhost/one_menu/index.php">onemenu.com</a>.<br/> <br/>';
Send_Mail($to,$subject,$body);
	        }
	      }
		  mysqli_free_result($con);
	    }
	  }
	  while(mysqli_next_result($con));
    }
 }
?>