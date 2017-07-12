<?php 
require_once 'init.php';
if(!$user['booking']){
header('Location: index.php');
exit();
}
?>