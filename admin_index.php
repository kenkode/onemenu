<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['ID']);
	unset($_SESSION['manager']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Login</title>
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

<body>
<div class="login">
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
		header('Location: reset_password.php');
		}else{
		header('Location: dashboard.php');
		}
		}
    }
else{
echo '<span style="color:red"><img src="images/1433075310_cancel_48.png" width="24" height="24"/>Invalid email/password!</span>';
}
}
?>

  <form id="form1" name="login" method="post" action="" onsubmit="return validateForm()">
    <label>UserName
      <input type="text" name="user" />
    </label>
    <p>
      <label>Password
      <input type="password" name="password" />
      </label>
    </p>
   <a rel="facebox" href="forgot.php">Forgot Password? </a>
    <p>
      <label>
      <input type="submit" name="login" value="login" />
      </label>
    </p>
  </form>
</div>
</body>
</html>
