<?php
include('../db.php');

$id=$_POST['id'];


mysqli_query($con,"delete from orders where order_id='$id'") or die(mysqli_error($con));

?>