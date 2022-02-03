<?php require('conn.php'); ?>

<?php
  if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"])) 
  { 
    $action = $_REQUEST["action"];
	print_r($action);
    if($action == "deleteProduct")
	{
		 
		$ProductId = $_REQUEST["ProductId"];
		$sql = "UPDATE product SET IsActive=0  WHERE ProductId = '. $ProductId .'  " ;
		 
		$flag = false ;

		if (mysqli_query($conn, $sql) === TRUE) {			
			$flag = true;
		} else {
			 
			$flag = false;
		}
		$output["data"] = $flag;
		echo json_encode($output);
	}

	else if($action == "updateuser")
	{
		$id = $_REQUEST["id"];
		$name = $_REQUEST["name"];
		$login = $_REQUEST["login"];
		$password = $_REQUEST["password"];
		
		$sql = "Update users SET name='$name', login='$login',password='$password' where id='$id')";
		
		$flag = false;
		if (mysqli_query($conn, $sql) === TRUE) {			
			$flag = true;
		} else {
			//$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
			$flag = false;
		}
		$output["data"] = $flag;
		echo json_encode($output);
	}
	
  }//end of if
  


?>