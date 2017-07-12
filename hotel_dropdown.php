<?php
include'db.php';
$sql=mysqli_query($con,"select * from hotels");
if(mysqli_num_rows($sql)){
$data = array();
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
$data[] = array(
'hid' => $row['h_id'],
'hname' => $row['hotel_name']
);
}
header('Content-type: application/json');
echo json_encode($data);
}
?>
