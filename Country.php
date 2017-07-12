<?php
include 'db.php';
?>

<html>
<head>
<title>Hotel dropdown</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
function Country(){
$('#hotel').empty();
$('#hotel').append("<option>Loading...........</option>");
$.ajax({
type:"POST",
url:"hotel_dropdown.php",
contentType:"application/json; charset=utf-8",
dataType:"json",
success:function(data){
$('#hotel').empty();
$('#hotel').append("<option value='0'>----Select Hotel---</option>");
$.each(data,function(i,item){
$('#hotel').append("<option value='"+data[i].hid+"'>"+data[i].hname+"</option>");
});
},
complete:function(){
}
});
}
$(document).ready(function(){
Country();
});
</script>
</head>
<body>
<select id="hotel"></select>
</body>
</html>
