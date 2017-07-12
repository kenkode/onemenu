<?php
session_start();

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("shopping", $con);
$serial = $_POST['serial'];
$name=$_POST['name'];
$description=$_POST['description'];
$price=$_POST['price'];
$category=$_POST['category'];
$restaurant=$_POST['restaurant'];



mysql_query("UPDATE african SET name='$name', description='$description', price='$price', category='$category', restaurant='$restaurant' WHERE serial='$serial'");
header("location: home_admin.php#4");
mysql_close($con);
?> 