<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="jq.js" type="text/javascript"></script>
</head>

<body>
<select name="select1" id="select1">
<?php 
include'db.php';
$hotel=mysqli_query($con,"select * from hotels");
$select = "";
while($row=mysqli_fetch_array($hotel,MYSQLI_ASSOC)){
$meal=mysqli_query($con,"select * from meal where hotel_id='".$row['h_id']."'");
while($arr=mysqli_fetch_array($meal,MYSQLI_ASSOC)){
$value='<option value="'.$arr['m_id'].'">'.$arr['meal_name'].'</option>';
$select .= $value;
 } 
?>

<option value="<?php echo $row['h_id'];?>"><?php echo $row['hotel_name'];?></option>
<?php } ?>
</select>

<select name="select2" id="select2"><?php echo $select; ?></select>


<script type="text/javascript">
$("#select1").change(function() { 
if($(this).data('options') == undefined){
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options',$('#select2 option').clone());
    } 
var id = $(this).val();
var options = $(this).data('options').filter('[value=' + id + ']');
$('#select2').html(options);
});

</script>
</body>
</html>
