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
     
	<style>
			body{
				background-color: #31302B;
				font: bold 16px Arial, Helvetica, sans-serif; 
				margin: 0;
			}
			.container {
				width: 40%; /* use percentage for responsive look*/
				margin: auto;
				margin-top: 5%; 
				background-color: white;
				border: 8px solid #474341;
				position:relative;
				
			}
			.heading {
				padding: 25px;
				font-size: 25px;
				text-align:center;
				background-color: #1BBC9B;
				color: white; 
			}
			.Buttons
			{
				color: white;
				
			}
			.Buttons Button{
				
				width:50%;
				background-color: #1BBC9B;
				color: white;
				border:none;
				font-size: 20px;
				padding: 10px 20px;
			}

			.button1
			{
				margin: 41px 136px;
				margin-top: 56px;
				margin-bottom: 9px;
			}
			.button2{margin-top: 22px;
				margin-left: 136px;
				margin-bottom: 131px;
			}
			#logout{ 
				position:absolute;
				right: -160px;
				 cursor: pointer;
				background-color: #31302B;
				color: white;
				border:none;
				font-size: 20px;
				padding: 10px 20px;
			}
	</style>
</head>
<body>
	   
<?php
	 
	if(isset($_REQUEST["logout"])){
		
		$_SESSION["login"] = null;
	     $_SESSION["userid"] = null;
		header('Location: SignIn.php');
	}	
 
?>
    <div class="container">
       
        <div class="heading">Welcome Admin</div>
        <div class="Buttons">
			<a href='AddNewProduct.php'><Button class="button1">Add New Product</Button></a>
           <a href='AdminProductView.php'> <Button class="button2" >View Products</Button></a>
        
		</div>
		 
		<form action="AdminHome.php" method="post">
			<input type="submit" id=logout name="logout" value="Logout">
		</form>
 		
		<!-- <Button type="submit" name="logout" id="logout">Logout</Button> -->
    </div>
</body>
</html>