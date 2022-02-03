<?php
	require('conn.php'); 
	session_start(); // Starting Session

	if(isset($_SESSION["login"]) == false){	
		header('Location: SignIn.php');
	} 
 
    if(isset($_REQUEST['logout']))
    {
       $_SESSION["login"] = null;
	     $_SESSION["userid"] = null;
		header('Location: SignIn.php');
        
    }

    if(isset($_REQUEST['delete']))
    {
        $delete = $_REQUEST['delete'];
		$sql1 = "update product set isActive=0 where ProductId ='$delete'";		
        $result1=mysqli_query($conn,$sql1);
		//header('Location: adminproductview.php');
       
    }

    if(isset($_REQUEST['edit']))
    {
        $_SESSION["ProductId"] = $_REQUEST['edit'];
		header('Location: EditProduct.php'); 
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
	<script src="js/jquery.js"></script>
 
</head>
<body>
	

<div class="container">

 	<form  >   
        <button class="button3" type="submit" id="logout" name="logout">Logout</button>
    </form>
 


	<?php
		$error = "";
		$uname = "";
		$msg = "";
		
		$sql = "SELECT product.ProductId , product.Name, type.TypeName, product.Price, product.Description, product.PicURL, product.UpdatedOn, admin.Name as adminName, product.IsActive FROM product join type ON product.TypeId = type.TypeId join admin On product.UpdatedBy =admin.AdminId";
		
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

				
				echo '<div style="height:300px">';
				echo '<h1 >'.$row['Name'].'</h1>';
				echo '<p>Type: '.$row['TypeName'].' </p>';
				echo ' <p>Price: '.$row['Price'].' </p>';
				echo '<p>Description: '.$row['Description'].'</p>  ';
				echo '<p>Updated By: '.$row['adminName'].'</p>  ';
				echo ' <p>Updated_On: '. $row['UpdatedOn'].' </p>'; 				 
				 
				echo '</div>';

				echo '<form  class="form" action="" method="post" >';
                echo    '<button class="button1" type="submit"  name="delete" value="'.$row['ProductId'].'">Delete</button>';
                echo '</form>';

				echo '<form class="form" action="" method="post" >';
                echo  '  <button class="button2" type="submit"  name="edit" value="'.$row['ProductId'].'">Edit</button>';
                echo '</form>';
				
				 
				echo '</div>';
                 

			}
			
		}	 
	?> 
		 
		
		 

</div>
	  
</body>
</html>