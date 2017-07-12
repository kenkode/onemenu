<?php
include('../db.php');

$id=$_POST['id'];

$sel = mysqli_query($con,"select * from meal where m_id='".$_POST['id']."'");

$row = mysqli_fetch_array($sel,MYSQLI_ASSOC);

mysqli_query($con,"delete from meal where m_id='$id'") or die(mysqli_error($con));

unlink($row['photo']);
?>