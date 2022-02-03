
<html>
<head>

<script src="jquery.js"></script>

<script>
	$(document).ready(function(){
		
		$("#btnShow").click(function(){
		
			var dataToSend = {"action": "task3","Name":"Nouman","City":"Lahore"};  
			
			var settings= {
				type: "POST",
				dataType: "json",
				url: "api.php",       // where to hit ajax call
				data: dataToSend,
				success: Mysucfunction,
				error: OnError
			};
			
			$.ajax(settings);
			console.log('request sent');
			return true;			
		});//end of show all
		
		function Mysucfunction(response) {
				console.log("response from server :", response );	    //     showing response in console				
		}
		function OnError(){
			alert('error has occured');
		}
	});//end of ready
</script>
</head>
<body>

<h1> Simple AJAX Example 1 </h1>
   
   <input type="submit" id="btnShow" value="Show" />
   
</body>
</html>