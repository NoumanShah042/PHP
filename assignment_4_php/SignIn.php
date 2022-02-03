<?php require('conn.php'); ?>

<?php
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
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js"  > </script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			
			$("#btnSubmit").click(function(){
				
				var l = $("#login").val();
				var p = $("#password").val();
				var flag = true;
				console.log("hello");
				
				if(l == ""){
					flag = false;
					alert("Login is mandatory!");
				}
				if(p == ""){
					flag = false;
					alert("Password is mandatory!");
				}
				
				// if we return false from event handler it will kill that event
				return flag;  
			});
		});
	</script>
</head>
<body>

<?php
	$error = "";
	$uname = "";
	$msg = "";
	if(isset($_REQUEST["btnSubmit"])){
		
		$login = $_REQUEST["login"];
		$password = $_REQUEST["password"];
		
		$sql = "SELECT * FROM admin where login='$login' and password='$password'";
		
	   $result = mysqli_query($conn, $sql);
	   
	   $recordsFound = mysqli_num_rows($result);
		  
	   if($recordsFound == 1)
	   {
		    $row = mysqli_fetch_assoc($result); 
			$_SESSION['login']=$login;
			$_SESSION["userid"] = $row["AdminId"];
			header('Location: AdminHome.php');
	   }
	   else {
		 $error =  "Invalid User Name/Password";
	   }  
	}
?>
    <div class="container">
       
        <div class="heading">Sign in</div>
        <form class="my-form" action="SignIn.php" method="POST" >
			<div class="form-group">
				<label>Login </label>
				<input type="text" name="login" id="login" placeholder="Login...">
			</div>
			<div class="form-group">
				<label>Password </label>
				<input type="password" name="password" id="password" placeholder="Password..." >
			</div>
		 
			<input class="btn" type="submit" value="Sign in" name="btnSubmit"  id="btnSubmit">

			<div style='color:red;margin: 23px -3px; margin-bottom: 5px;'><?php echo $error; ?></div>
		</form>
        
  </div>
    
</body>
</html>