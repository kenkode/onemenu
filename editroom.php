<?php
				  if (isset($_GET['id']))
	{
	
	echo '<form action="editroomexec.php" method="post">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
	echo '<input type="hidden" name="name" value="'. $_GET['id'] .'">';
			$con = mysql_connect("localhost", "root", "");
			if (!$con)
  			{
  			die('Could not connect: ' . mysql_error());
  			}

			mysql_select_db("shopping", $con);
		
			$id=$_GET['id'];
			$result = mysql_query("SELECT * FROM african WHERE serial = $id");

			while($row = mysql_fetch_array($result))
  			{
			echo '<input type="hidden" name="serial" value="'. $row['serial'] .'">'; 
  			echo'Tour type: '.'<input type="text" name="name" value="'. $row['name'] .'">'; 
			   echo '<br>';
			  echo'Description: '.'<input type="text" name="description" value="'. $row['description'] .'">';
			  echo '<br>';
			  echo'Price: '.'<input type="text" name="price" value="'. $row['price'] .'">'; 
			   echo '<br>';
			  echo'Category: '.'<select name="category" size="1" id="category">
              <option selected>'. $row['category'] .'</option>
              <option value="African">African</option>
              <option value="Beverages">Beverages </option>
              <option value="Breakfast">Breakfast </option>
              <option value="Pizza">Pizza </option>
              <option value="Snacks">Snacks </option>
              <option value="Fruits">Fruits & Juices </option>
            </select>'; 
			   echo '<br>'; echo'Restaurant: '.'<select name="restaurant" size="1" id="restaurant">
              <option selected>'. $row['restaurant'] .'</option>
              <option value="Chicken Inn">Chicken Inn</option>
              <option value="Cafe Deli">Cafe Deli </option>
              <option value="Java">Java </option>
              <option value="Pizza Inn">Pizza Inn </option>
            </select>'; 
			   echo '<br>';
			   
			  echo '<input name="" type="submit" value="Save" />';
			  
  			}
	echo '</form>';
			}
			?>
			
			
