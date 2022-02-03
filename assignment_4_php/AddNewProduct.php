<?php require('conn.php'); ?>
<?php
session_start(); // Starting Session

if(isset($_SESSION["login"]) == false){	
	header('Location: SignIn.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js"  > </script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			
			$("#addProduct").click(function(){
				// <!-- name, price ,type , description, productpic   -->
				var name = $("#name").val();
				var price =  Number($("#price").val());				  
				var type = $("#type").val();
				var description = $("#description").val();
				var productpic = $("#productpic").val();
				
				var flag = true;
				
				if(name == ""){
					flag = false;
					alert("Name is mandatory!");
				}
				if(price <= 0){
					flag = false;
					alert("Price should be greater than 0!");
				}
				if(type == '0' )
				{
					flag = false;
					alert("Select Type");
				}
				
				if(description == ""){
					flag = false;
					alert("Description is mandatory!");
				}
				if(productpic == ""){
					flag = false;
					alert("Upload Product Pcture!");
				}
				
				// if we return false from event handler it will kill that event
				return flag;  
			});
		});
	</script>
</head>
<body>
		   
<?php
	 
	if(isset($_REQUEST["logout"])){
		
		$_SESSION["login"] = null;
		header('Location: SignIn.php');
	}	
 
?>
  
<?php
	$error = "";
	$uname = "";
	$msg = "";
	if(isset($_REQUEST["addProduct"])){
		// <!-- name, price ,type , description, productpic   -->
		$name = $_REQUEST["name"];
		$price = (int) $_REQUEST["price"];
		$type = (int) $_REQUEST["type"];
		$description = $_REQUEST["description"];
		$adminId = (int) $_SESSION["userid"] ;

		
		$temp = explode(".", $_FILES["productpic"]["name"]);
		$new_name = round(microtime(true)) . '.' . end($temp);		
		move_uploaded_file($_FILES["productpic"]["tmp_name"], "img//".$new_name);
		
		date_default_timezone_set("Asia/Karachi");
		$date= date("Y-m-d h:i:s");
		
		// echo($name ." " . $price ." " . $type ." ".  $description ." ". $new_name );
		 $sql = "INSERT INTO product (Name, TypeId, Price, Description, PicURL,  UpdatedOn, UpdatedBy, IsActive )
         		 VALUES ('$name', $type, $price, '$description', '$new_name', '$date', $adminId, 1 )";
            
		if (mysqli_query($conn, $sql) === TRUE) {			
			header('Location: AdminHome.php');
		} else {
			$error = "Some Problem has occurred";
		}
	}
?>
    <div class="container">
       
        <div class="heading">Add Product</div>
        <form class="my-form" action="AddNewProduct.php"  method="post"  enctype="multipart/form-data" >
			<!-- name, price ,type , description, productpic   -->
			<div class="form-group">
				<label>Name </label>
				<input type="text" name="name" id="name" placeholder="Name...">
			</div>
            <div class="form-group">
				<label>Price </label>
				<input type="number" name="price" id="price" placeholder="Price...">
			</div>

			<div class="form-group">
				<label>Type Select </label>
				<select name="type" id="type">
				    <option value="0"> Select Type</option>	
				    <?php 
				
						$sql = "SELECT TypeId,TypeName FROM type";
						$result = mysqli_query($conn, $sql);
						$recordsFound = mysqli_num_rows($result);			
						if ($recordsFound > 0) {
							while($row = mysqli_fetch_assoc($result)) {
							
								$id = $row["TypeId"];
								$name = $row["TypeName"];
								echo "<option value='$id'>$name</option>";
							}
						}				
					?>
                </select>
			</div>

            <div class="form-group">
				<label>Description </label>
				<Textarea name="description" id="description" placeholder="Description..." maxlength="100"></Textarea>
			</div>

            <div class="form-group">
				<label>Picture </label>
				<input type="file" id="productpic" name="productpic"/> 
			</div>
		 
			<input class="btn" id="addProduct" name="addProduct" type="submit" value="Add Product" >
			<div style='color:red;margin: 23px -3px; margin-bottom: 5px;'><?php echo $error; ?></div>
		
		</form>

		<!-- logout button -->
     	<div id="log">
				<span class="vl"></span>
			   
				<form action="AddNewProduct.php" method="post">
					<input type="submit" id=logout name="logout" value="Logout">
				</form>
		  </div>
  </div>
    </div>
</body>
</html>