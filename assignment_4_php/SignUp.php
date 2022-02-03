
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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"  > </script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			
			$("#btnSubmit").click(function(){
				
				var l = $("#login").val();
				var n = $("#name").val();
				var p = $("#password").val();
				var flag = true; 			
				
                if(n == ""){
					flag = false;
					alert("Name is mandatory!");
				}
				if(p == ""){
					flag = false;
					alert("Password is mandatory!");
				}
                if(l == ""){
					flag = false;
					alert("Login is mandatory!");
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
				
		$sql = "SELECT * FROM admin where login='$login' ";
		
	   $result = mysqli_query($conn, $sql);
	   
	   $recordsFound = mysqli_num_rows($result);
		  
	   if($recordsFound == 1)
	   {
           $error =  "Login Already Exist"; 
		    		
	   }
	   else {
           //  new login/user 
		    $name = $_REQUEST["name"];
            $login = $_REQUEST["login"];
            $password = $_REQUEST["password"];
            $sql = "INSERT INTO admin (name, login,password)
                VALUES ('$name', '$login', '$password')";
            
            if (mysqli_query($conn, $sql) === TRUE) {
                $last_id = mysqli_insert_id($conn);
                $_SESSION['login']= $login;
                $_SESSION["userid"] = $last_id;                 
                header('Location: AdminHome.php');

            } else {
                //$msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
                $error = "Some Problem has occurred";
            }
	   }  
	}
?>
    <div class="container">
       
        <div class="heading">Sign up</div>
        <form class="my-form" action="SignUp.php" method="POST" >
			<div class="form-group">
				<label>Name </label>
				<input type="text" name="name" id="name" placeholder="Name...">
			</div>
			<div class="form-group">
				<label>Password </label>
				<input type="password" name="password" id="password" placeholder="Password..." >
			</div>
            <div class="form-group">
                    <label>Login </label>
                    <input type="text" name="login" id="login" placeholder="Login...">
            </div>

			<input class="btn" type="submit" value="Sign up" name="btnSubmit"  id="btnSubmit">
             
			<div style='color:red;margin: 23px -3px; margin-bottom: 5px;'><?php echo $error; ?></div>
		</form>
        
  </div>
    </div>
</body>
</html>