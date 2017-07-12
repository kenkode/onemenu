<?php
include('../db.php');

$id=$_POST['id'];

$sel = mysqli_query($con,"select * from hotels where h_id='".$_POST['id']."'");

$row = mysqli_fetch_array($sel,MYSQLI_ASSOC);

mysqli_query($con,"delete from hotels where h_id='$id'") or die(mysqli_error($con));

mysqli_query($con,"delete from users where user_id='".$row['u_id']."'") or die(mysqli_error($con));

unlink($row['hotel_logo']);

?>