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
		<title>Registration Page</title>
	<script type="text/javascript">
		function load2()
		{
			document.getElementById('result1').innerHTML = '<b><i>Working...</i></b>';
			var user_id = document.forms["register"]["user_id"].value;
			var user_pass = document.forms["register"]["user_pass"].value;
			var user_fname = document.forms["register"]["user_fname"].value;
			var user_lname = document.forms["register"]["user_lname"].value;
			var user_pass_a = document.forms["register"]["user_pass_a"].value;
			if((user_id == '' || user_pass == '' || user_fname == '' || user_lname == '') && (user_pass != user_pass_a)){
				window.alert("Not Entered");

			}
			else
			{
				var url = 'user_id='+user_id+'&user_pass='+user_pass+'&user_fname='+user_fname+'&user_lname='+user_lname;
				
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
				parameters1 = 'user_id='+user_id+'&user_pass='+user_pass+'&user_fname='+user_fname+'&user_lname='+user_lname;
				xmlhttp.open('POST','register.php',true);
				xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				xmlhttp.send(parameters1);
		}

		}
	</script>
	</head>
	<body>


<h2>Please register yourself !!</h2><br>
<form name="register" >
		Enter your Userid:<br>
		<input type="text" name="user_id" value="" autocomplete="off"/><br><br>
		Enter a Password:<br>
		<input type="password" name="user_pass" value="" autocomplete="off" /><br><br>
		Enter a Password Again:<br>
		<input type="password" name="user_pass_a" value="" autocomplete="off"/><br><br>
		Enter Fist Name:<br>
		<input type="text" name="user_fname" value="" autocomplete="off"/><br><br>
		Enter Last Name:<br>
		<input type="text" name="user_lname" value="" autocomplete="off"/><br><br>
		<input type="button" value="Submit" onclick="load2();" />
		</form>
		<?php
}
	
?>
<div id="result1"></div>
	</body>
	</html>