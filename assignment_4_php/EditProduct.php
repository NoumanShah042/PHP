 
<?php
	require('conn.php'); 
	session_start();


	

	$ProductId = $_SESSION["ProductId"];
	$sql = "SELECT * FROM product where ProductId='$ProductId'";
    $result = mysqli_query($conn,$sql);
	$recordsFound = mysqli_num_rows($result);		  
	if($recordsFound == 1)
	{
		$row = mysqli_fetch_assoc($result); 
	}
	else {
		  header('Location: AdminProductview.php');
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
<script src="js/jquery.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			
			$("#edit").click(function(){
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
	    $_SESSION["userid"] = null;
		header('Location: SignIn.php');
	}	

	if(isset($_REQUEST['edit']))
    {
        $ProductId =$_SESSION["ProductId"];
        $name = $_REQUEST['name'];
        $type = $_REQUEST['type'];
        $price = $_REQUEST['price'];
        $description = $_REQUEST['description'];
        $UpdatedBy = $_SESSION["userid"];
		date_default_timezone_set("Asia/Karachi");          
        $date= date("Y-m-d h:i:s");

        $temp = explode(".", $_FILES["productpic"]["name"]);
		$new_name = round(microtime(true)) . '.' . end($temp);		
		echo $new_name;
		move_uploaded_file($_FILES["productpic"]["tmp_name"], "img//".$new_name);
		
	
        $query = "update product set Name='$name', TypeId='$type', Price='$price',Description='$description',PicURL='$new_name' ,UpdatedOn='$date',UpdatedBy='$UpdatedBy' where ProductId=$ProductId";
        $query_run=mysqli_query($conn,$query);
        
        if($query_run== true)
        {
            $_SESSION["ProductId"] = null;
            // header('Location: AdminProductview.php');
        }
         
    }

?>
 
    <div class="container">
       
        <div class="heading">Edit Product</div>
<!-- SELECT product.ProductId , product.Name, type.TypeName, product.Price, product.Description, product.PicURL, product.UpdatedOn, admin.Name as adminName, product.IsActive  -->
        <form class="my-form">
			<div class="form-group">
				<label>Name </label>
				<input type="text" name="name" placeholder="Name..."  value="<?php echo $row['Name'] ?>" >
			</div>
            <div class="form-group">
				<label>Price </label>
				<input type="text" name="price" placeholder="Price..." value="<?php echo $row['Price'] ?>">
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
							while($recordType = mysqli_fetch_assoc($result)) {
							

								$id = $recordType["TypeId"];
								$name = $recordType["TypeName"];
								if($row["TypeId"]==$id  )
								{
									echo "<option value='$id' selected>$name</option>";
								}
								else{

									echo "<option value='$id'  >$name</option>";
								}
							}
						}				
					?>
                </select>
			</div>

            <div class="form-group">
				<label>Description </label>
				<Textarea name="description" maxlength="100" >  <?php echo $row['Description'] ?>   </Textarea>
			</div>

            <div class="form-group">
				<label>Picture </label>
				<input type="file" id="productpic" name="productpic"/> 
			</div>
		 
			<input class="btn" type="submit" id="edit" name="edit" value="edit" >
		  </form>

		  <div id="log">
				<span class="vl"></span>
			  	<form action="AddNewProduct.php" method="post">
					<input type="submit" id="logout" name="logout" value="Logout">
				</form>
		  </div>

  			 
    </div>
</body>
</html>