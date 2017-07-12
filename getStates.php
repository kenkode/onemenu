
<?php
include'db.php';
echo "<option value=''>----------select food-------</option>";
$sql=mysqli_query($con,"select * from meal where hotel_id='".$_REQUEST['id']."'");
if(mysqli_num_rows($sql)){
while($row=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
echo "<option data-mid='".$row['m_id']."' value'".$row['m_id']."'>".$row['meal_name']."</option>";
}
}
header('Content-type: application/json');
echo json_encode($data);

?>
<script src="jquery2.0.js" type="text/javascript"></script>