<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['ID']);
	unset($_SESSION['manager']);
?>

<?php
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
	/*for ($i = 0; $i < $length; $i++) {
    $password .= $chars[mt_rand(0, strlen($chars) – 1)];
	}*/
    return $password;
}
?>

<?php $password = random_password(8); 
?>

<?php

$encrypted = encryptIt( $password );
$decrypted = decryptIt( $encrypted );

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="admin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script type="text/javascript">
function validateForm()
{

var y=document.forms["forgot"]["email"].value;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

 if ((y==null || y==""))
  {
  alert("you must enter your hotel`s email");
  return false;
  }
  if (!filter.test(y)) {
    alert('Please provide a valid email address');
    e.focus;
	return false;
   }
 

}
</script>
  </head>
  <body id="login">
    <div class="container">
    
      <form class="form-signin" name="forgot" method="post" onSubmit="return validateForm()">
        <h2 class="form-signin-heading">Forgot Password</h2>
		<?php
include 'db.php';
if(isset($_REQUEST['forgot'])){
$sql = mysqli_query($con,"select * from hotels where hotel_email='".$_REQUEST['email']."'") or die( mysqli_error($con));
$existCount=mysqli_num_rows($sql);
if($existCount == 1){//evaluate the count
$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
	$sql = mysqli_query($con,"update users set password='".$encrypted."', status=1 where user_id='".$row['u_id']."'");
	
	include 'smtp/Send_Mail.php';
	
              $to=$_REQUEST['email'];
              $subject="Password Reset";
              $body='Hi '.$row['hotel_name'].' Hotel...<br/> <br/> This is a password reset for username '.strtolower($row['hotel_name']).' <br/> Password is '.$decrypted.' <br/><br/>Please click <a href="http://localhost/one_menu/admin_login.php">here</a> to login and reset your password.<br> Thanks!<br/> <br/>';
             Send_Mail($to,$subject,$body);
	echo "<img src='images/1433075297_ok-green.png'/><span style='color:green'>A new password has been sent to your email...</span>";
    }
else{
echo '<span style="color:red"><img src="images/1433075310_cancel_48.png" width="24" height="24"/>Invalid email/doesn`t exist in the system!</span>';
}
}
?>
        <input type="text" class="input-block-level" placeholder="Email address" name="email">
        <button class="btn btn-large btn-primary" type="submit" name="forgot">Submit</button><br/>
		<a href="admin_login.php">Login</a>
      </form>

    </div> <!-- /container -->
    <script src="admin/vendors/jquery-1.9.1.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>