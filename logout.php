<?php
session_start();

if(isset($_SESSION['manager']))
{
?>
<?php

$_SESSION['manager']=" ";
session_destroy();
header("location:admin_index.php");
exit();
?>
<?php
}
else
{
header("location:admin_index.php");
exit();
}
?>