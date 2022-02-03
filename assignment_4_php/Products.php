<?php
require('conn.php'); 
session_start(); // Starting Session

if(isset($_SESSION["login"]) == true){	
	header('Location: SignIn.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Product View</title>
	<link rel="stylesheet" href="css/view.css">
 
</head>
<body>
	

<div class="container">


	<?php
		$error = "";
		$uname = "";
		$msg = "";
		
		$sql = "SELECT product.Name, type.TypeName, product.Price, product.Description, product.PicURL, product.UpdatedOn, admin.Name as adminName, product.IsActive FROM product join type ON product.TypeId = type.TypeId join admin On product.UpdatedBy =admin.AdminId";
		
		$result = mysqli_query($conn, $sql);	   
		$recordsFound = mysqli_num_rows($result);
		//echo $recordsFound;
		for($a=0 ; $a<$recordsFound ; $a++ ){
			$row = mysqli_fetch_assoc($result); 
			 
		    // var_dump($row);
			if((int)$row['IsActive'] == 1 )
			{				 
				echo '<div class="block">';
				echo '<img src="img/'.$row['PicURL']. '"  alt="">';
				echo '<p>Type: '.$row['TypeName'].' </p>';
				echo ' <p>Price: '.$row['Price'].' </p>';

				echo '<p>Description: '.$row['Description'].'</p>  ';
				echo '<p>Updated By: '.$row['adminName'].'</p>  ';
				echo ' <p>Updated_On: '. $row['UpdatedOn'].' </p>'; 
				 
 
				echo '</div>';


			}
			
		}	 
	?> 
		 
		
		<div style="clear: both;"></div>
</div>
	  
</body>
</html>