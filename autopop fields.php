<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="jq.js" type="text/javascript"></script>
</head>

<body>
<select name="select1" id="select1">
<option value="1">Fruit</option>
<option value="2">Animal</option>
<option value="3">Bird</option>
<option value="4">Car</option>
</select>


<select name="select2" id="select2">
<option value="1">Banana</option>
<option value="1">Apple</option>
<option value="1">Orange</option>
<option value="2">Wolf</option>
<option value="2">Fox</option>
<option value="2">Bear</option>
<option value="3">Eagle</option>
<option value="3">Hawk</option>
<option value="4">BWM<option>
</select>

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
