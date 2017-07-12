<?php
require_once 'init.php';

if(isset($_POST['stripeToken'])){
   
     $token = $_POST['stripeToken']; 
    
	 try{
     Stripe_Charge::create(array(
	 "amount" => $user['cost']*100,
	  "currency" => "kes", 
	  "card" => $token, // obtained with Stripe.js 
	  "description" => $user['email'] 
	  ));
	  
	  $db=mysql_query("UPDATE corpses SET booking = 1 WHERE corpse_id ='".$user['corpse_id']."'");
	  
	  if($db){
	  include '../smtp/Send_Mail.php';
	
$to=$user['email'];
$subject="Booking Cadaver Confirmation";
$body='Hi '.$user['family_fname'].' '.$user['family_lname'].' , <br/> <br/> This is to confirm that you have successfully booked <strong><u>'.$user['deceased_name'].'</u></strong> body on <strong>'.$user['date'].'</strong>. <br/>Please remember to come with your national id for identification purposes and original copy of your affidavit before you take the body. You will also be issued with the death certificate as you come to pick body...<br/><br/><table><tr><td colspan = "2"><strong> Cadaver details include:</strong></td></tr><tr><td></td></tr><tr><td><strong>Deceased name</strong>:</td><td>'.$user['deceased_name'].'</td></tr><tr><td><strong>Family name</strong>:</td><td>'.$user['family_fname'].' '.$user['family_lname'].'</td></tr><tr><td><strong>Contact:</strong></td><td>'.$user['contact'].'</td></tr><tr><td><strong>Address </strong>:</td><td>'.$user['address'].'</td></tr><tr><td><strong>Province</strong>:</td><td>'.$user['province'].'</td></tr><tr><td><strong>Amount</strong>:</td><td>'.$user['cost'].'</td></tr><tr><td><strong>Booking date</strong>:</td><td>'.$user['date'].'</td></tr></table><br/><br/> Thank you for visiting our site and booking a cadaver... Visit us again on <a href="http://localhost/mortuary/index.php">Morgue.com</a>.<br/> <br/>';
Send_Mail($to,$subject,$body);

	  }
	 
     }catch(Stripe_CardError $e){
        //Do something incase of error
		
     }
	 
	 header('Location:index.php?bid='.$user['corpse_id']);
	 exit();
}
?> 

 </div>
        </div>
		<footer>joegich&copy;2015. All rights preserved</footer>
</div>