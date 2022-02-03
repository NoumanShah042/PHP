<?php require("conn.php");?>
 
<?php

if(isset($_REQUEST['btnupload']))
{
	
	//Here 'userpic' is name of your 'file control'
	//explore will break the name by using '.' delimeter.
	$temp = explode(".", $_FILES["userpic"]["name"]);
	
	//Create a unique name by using time and append the actual extension
	$new_name = round(microtime(true)) . '.' . end($temp);
	
	//save file into "img" folder with the name stored '$new_name' variable
	move_uploaded_file($_FILES["userpic"]["tmp_name"], "img//".$new_name);

	//store image name in database
	$query = "INSERT INTO images (imagename) VALUES ('$new_name')";

	$sql = mysqli_query($conn, $query);

	if(!$sql){

		echo "data not updated";
		echo "Error: ". mysqli_error($conn);
		die;
	}
	else {
		echo "Image uploaded successfully";
	}

}//end of isset function

?>


<html>

<head>

<style>
.imagecontainer{

	padding: 10px;
}
.image {
	padding: 10px;
}
</style>

</head>

<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" id="userpic" name="userpic"/><br><br>
		<input type="submit" id="btnupload" name="btnupload" value="Upload Pic"/>
	</form>
	
	<form action="" method="post">
		<input type="submit" id="btnshowfile" name="btnshowfile" value="Show Files"/>
		<div class="imagecontainer">
			<?php 
			if(isset($_REQUEST['btnshowfile']))
			{
				$query = "SELECT * FROM images";
				$sql =mysqli_query($conn, $query);

				while($row = mysqli_fetch_array($sql))

				{
					echo "<div>ID:{$row['id']}    Image1:{$row['imagename']} </div>";

					echo "<div>";
						echo "<img src='img/{$row['imagename']}' width='100px' height='100px' class='image' />";
					echo "</div>";
				}//End of while
			}//end of if(isset)
			?>

		</div>
	</form>

</body>
</html>