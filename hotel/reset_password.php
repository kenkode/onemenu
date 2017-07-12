<?php
include'../db.php';
require_once('../auth.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_SESSION['manager'].'`s ';?>Home Page</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script type="text/javascript">
function validateForm()
{

var y=document.forms["reset"]["newp"].value;
var a=document.forms["reset"]["confp"].value;
if ((y==null || y==""))
  {
  alert("please enter your new password");
  return false;
  }
  if ((a==null || a==""))
  {
  alert("please confirm your new password");
  return false;
  }
 if ((y!=a))
  {
  alert("Your passwords don`t match");
  return false;
  }

}
</script>
  </head>
  <body id="login">
    <div class="container">
    <?php
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

if(isset($_REQUEST['reset'])){
$sql = mysqli_query($con,"update users set password='".encryptIt($_REQUEST['confp'])."', status=0 where username='".$_SESSION['manager']."'") or die( mysqli_error($con));
if($sql){
        echo "<script type='text/javascript'>alert('Password reset successfully... Please login with your new password!');
		window.location = '../admin_login.php';
		</script>";
		session_destroy();
		
		}else{
		echo"<img src='images/1433077051_cancel.png' width='24' height='24'/><span style='color:red'>Error in resetting password</span>";
    }

}
?>
      <form class="form-signin" name="reset" method="post" onSubmit="return validateForm()">
        <h2 class="form-signin-heading">Reset Password</h2>
        <input type="password" class="input-block-level" placeholder="New Password" name="newp">
        <input type="password" class="input-block-level" placeholder="Confirm Password" name="confp">
        <button class="btn btn-large btn-primary" type="submit" name="reset">Reset Password</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>