<?php 
//error_reporting(0);
//composer's autoloader
require_once 'vendor/autoload.php';

$bid=$_REQUEST['bid'];

$stripe = [
'publishable' => 'pk_test_ZpnJIM0PN2tNbBnl8udhwP2z',
'private' => 'sk_test_iNE8nhjF8ICSPGzT3DCvOdkB'
];

Stripe::setApiKey($stripe['private']);

mysql_select_db('mortuary',mysql_connect('localhost','root',''))or die(mysql_error());
$userQuery=mysql_query("select * from corpses left join booking on corpses.corpse_id=booking.corpse_id left join hospital_report on corpses.patient_id=hospital_report.patient_id where corpses.corpse_id='".$_REQUEST['bid']."'") or die(mysql_error());

$user = mysql_fetch_array($userQuery);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Morgue</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">


<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../js/DT_bootstrap.js"></script>

<script type="text/javascript" src="../jquery-simple-datetimepicker-master/jquery.simple-dtpicker.js"></script>
	<link type="text/css" href="../jquery-simple-datetimepicker-master/jquery.simple-dtpicker.css" rel="stylesheet" />
	<!---->
	<link href="../css/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/DT_bootstrap.css">

	<style type="text/css">
		body { background-color: #fefefe; padding-left: 2%; padding-bottom: 100px; color: #101010; }
		footer{ font-size:small;position:fixed;right:5px;bottom:5px; }
		pre{ background-color: #eeeeee; margin-left: 1%; margin-right: 2%; padding: 2% 2% 2% 5%; }
		p { font-size: 0.9rem; }
		ul { font-size: 1.5rem; }
		hr { border: 2px solid #eeeeee; margin: 2% 0% 2% -3%; }
		h3 { border-bottom: 2px solid #eeeeee; margin: 2rem 0 2rem -1%; padding-left: 1%; padding-bottom: 0.1em; }
		h4 { border-bottom: 1px solid #eeeeee; margin-top: 2rem; margin-left: -1%; padding-left: 1%; padding-bottom: 0.1em; }
		
		ul{
list-style:none;
margin-left:130px;
}

li.head{

display:inline;
list-style:none;
overflow: hidden;
margin: 0 12px 20px 50px;
padding:5px;
}
div#wrap{
	width:1750px;
	background:#CC9933;
	margin:0;
	padding:50px 80px;
	overflow: hidden; 
	margin-left:-210px;
	margin-top:-100px;
	position:fixed; 
	}
	footer{
	background-color:#CC9933;
	margin:0;
	padding:10px;
	overflow: hidden; 
	margin-bottom:-10px;
	padding-left:1300px;
	}
	</style>
	
</head>

<body>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="../images/tombstone-159792_1280.png" width="50" height="10" />MORTUARY MANAGEMENT SYSTEM</a>
        </div>
		<div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="" style="font-size:14px" >Booking in progress...</a></li>
          </ul>
        </div>
      </div>
    </div>    
    <div id="wrap"></div>