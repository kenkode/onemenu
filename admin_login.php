<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['ID']);
	unset($_SESSION['manager']);
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
  <body id="login">
    <div class="container">
    <?php
function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

include 'db.php';
if(isset($_REQUEST['login'])){
$sql = mysqli_query($con,"select * from users where username='".$_REQUEST['user']."' AND password='".encryptIt($_REQUEST['password'])."'") or die( mysqli_error($con));
$existCount=mysqli_num_rows($sql);
if($existCount == 1){//evaluate the count
	$row=mysqli_fetch_array($sql, MYSQLI_ASSOC);
	
		$_SESSION["ID"]=$row["user_id"];
	    $_SESSION["manager"]=$row['username'];
		$_SESSION["password"]=$row['password'];
		$_SESSION["level"]=$row["level"];
		
		session_write_close();
		if( $_SESSION['level'] == '1'){
			header('Location: admin/index.php');
		}
		elseif( $_SESSION['level'] == '2')
		{
	    if($row['status'] == 1){
		header('Location: hotel/reset_password.php');
		}else{
		header('Location: hotel/index.php');
		}
		}
    }
else{
echo '<span style="color:red"><img src="images/1433075310_cancel_48.png" width="24" height="24"/>Invalid email/password!</span>';
}
}
?>
      <form class="form-signin" name="login" method="post" onSubmit="return validateForm()">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="user">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary" type="submit" name="login">Sign in</button><br/>
		<a href="forgot.php">forgot password?</a>
      </form>

    </div> <!-- /container -->
    <script src="admin/vendors/jquery-1.9.1.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>