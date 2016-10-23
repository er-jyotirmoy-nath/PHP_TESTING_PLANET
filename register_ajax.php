<?php 
require("core.php");
?>
	<?php

	if(loggedin())
{
	header('Location: index.php');
}
else
{
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Registration Page</title>
	<script type="text/javascript">
		function load2()
		{
			
			
			var user_id = document.forms["register"]["user_id"].value;
			var user_pass = document.forms["register"]["user_pass"].value;
			var user_pass_a = document.forms["register"]["user_pass_a"].value;
			if((user_id == '' || user_pass == '' ) || (user_pass != user_pass_a)){
				window.alert("Not Entered");

			}
			else
			{
				var url = 'user_id='+user_id+'&user_pass='+user_pass;
				document.getElementById('result1').innerHTML = "<i class=\"fa fa-circle-o-notch fa-spin fa-3x fa-fw\"></i><span class=\"sr-only\">Loading...</span>";
					if(window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
				}
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
						document.getElementById('result1').innerHTML = xmlhttp.responseText;
					}
				}
				parameters1 = 'user_id='+user_id+'&user_pass='+user_pass;
				xmlhttp.open('POST','register.php',true);
				xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xmlhttp.send(parameters1);
		}

		}
	</script>
	</head>
	<body>

<div class="header">Welcome to share-o-smile webpage.</div>
<h4>Please register yourself !!</h4><br>
<div id="result1">
<form name="register" >
		Enter your Email id:<br>
		<input type="text" name="user_id" value="" autocomplete="off" onKeyUp="checkuser()"/><br><br>
		Enter a Password:<br>
		<input type="password" name="user_pass" value="" autocomplete="off" onKeyUp="checkpass()" /><br><br>
		Enter a Password Again:<br>
		<input type="password" name="user_pass_a" value="" autocomplete="off"/><br><br>
		<input type="button" class="buttons" value="Submit" onClick="load2();" />
		</form></div>
		<?php
}
	
?>

	</body>
	</html>
