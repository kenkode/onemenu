<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("shopping") or die(mysql_error());





	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"category/photos/" . $_FILES["image"]["name"]);
			
			$location="photos/" . $_FILES["image"]["name"];
			$name=$_POST['name'];
			$description=$_POST['description'];
			$price=$_POST['price'];
			$category=$_POST['category'];
			$restaurant=$_POST['restaurant'];
			
			

			
			$update=mysql_query("INSERT INTO african (name, description, price, image, category, restaurant)
VALUES
('$name','$description','$price','$location','$category','$restaurant')");
			
			
			header("location: home_admin.php#4");
			exit();
		
			}
	}


?>
