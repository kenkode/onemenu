
<script type="text/javascript">
function validateForm()
{
var a=document.forms["addroom"]["name"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter food name");
  return false;
  }
var b=document.forms["addroom"]["description"].value;
if (b==null || b=="")
  {
  alert("Pls. Enter food description");
  return false;
  }
 var c=document.forms["addroom"]["price"].value;
if (c==null || c=="")
  {
  alert("Pls. enter the qty of room");
  return false;
  }
 var e=document.forms["addroom"]["image"].value;
if (e==null || e=="")
  {
  alert("Pls. browse an image");
  return false;
  }
   var c=document.forms["addroom"]["category"].value;
if (f==null || f=="")
  {
  alert("Pls. enter the qty of room");
  return false;
   var c=document.forms["addroom"]["restaurant"].value;
if (g==null || g=="")
  {
  alert("Pls. enter the qty of room");
  return false;
/*if (c.which!=8 && c.which!=0 && (c.which<48 || c.which>57))
  {
  alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
  return false;
  }
if (b.which!=8 && b.which!=0 && (b.which<48 || b.which>57))
  {
  alert("The input U enter in Quantity field is not valid, only numbers are accepted (ex. 1, 2, 3, 4.......)");
  return false;
  }*/
}
</script>

<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
 Food Item<br />
  <input name="name" type="text" class="ed" /><br />
 Description<br />
    <input name="description" type="text" id="rate" class="ed"  /><br />
 Price<br />
    <input name="price" type="text" id="qty" class="ed" onkeypress="return isNumberKey(event)" /><br />
 
 
 Product Image: <br /><input type="file" name="image" class="ed"><br />
  Category<br />
    <select name="category" size="1" id="category">
              <option selected>***Please select one****</option>
              <option value="African">African</option>
              <option value="Beverages">Beverages </option>
              <option value="Breakfast">Breakfast </option>
              <option value="Pizza">Pizza </option>
              <option value="Snacks">Snacks </option>
              <option value="Fruits">Fruits & Juices </option>
            </select><br />
 Restaurant<br />
    <select name="restaurant" size="1" id="restaurant">
              <option selected>***Please select one***</option>
              <option value="Chicken Inn">Chicken Inn</option>
              <option value="Cafe Deli">Cafe Deli </option>
              <option value="Java">Java </option>
              <option value="Pizza Inn">Pizza Inn </option>
            </select>
 
    <input type="submit" name="Submit" value="save" id="button1" />

 
</form>
