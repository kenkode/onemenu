<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Get States</title>
</head>

<body>
<form name="form1" action="submit.php" method="post">
<select name="country" onchange="window.getStates()">
<option disabled>Select Hotel</option>
 <?php
	   include'db.php';
	   $sel = mysqli_query($con,"select * from hotels");
	   while($row=mysqli_fetch_array($sel,MYSQLI_ASSOC)){
	   echo '<option value="'.$row['h_id'].'">'.$row['hotel_name'].'</option>';
	   }
	   ?>
</select>
<input type="submit" name="submit" value="submit" />
</form>
<script type="text/javascript">
function getStates(){
var xmlhttp;
try{
xmlhttp = new XMLHttpRequest;
}catch(e){
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
if(xmlhttp){
var form = document['form1'];
var country = form['country'].value;

xmlhttp.open("GET","http://localhost/one_menu/getStates.php?id="+country,true);
xmlhttp.onreadystatechange = function(){
if(this.readyState == 4){
var s = document.createElement("select");
s.name="state";
s.innerHTML=this.responseText;

if(form['state']){
form.replaceChild(s, form['state'])
}else{
form.insertBefore(s, form['submit']);
}
}
}
xmlhttp.send(null);
}
}
</script>

</body>
</html>
