<?php
include('../db.php');

$id=$_POST['id'];


mysqli_query($con,"delete from customer where cust_id='$id'") or die(mysqli_error($con));

?>