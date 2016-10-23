<?php 
require_once("core.php");
	if(!loggedin())
		{

			header("Location: login.php");

		}
		else
		{
			require_once("photogalary.php");
			$photo1 = new viewphoto();
?>

<html>
<head>
	<title>Share-O-Smile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		function load(abc){
			document.getElementById(abc).innerHTML = '<b><i>Working...</i></b>';
			var x = document.forms["string_relace"]["str_text"].value;
			var y = document.forms["string_relace"]["replace_str"].value;
			var z = document.forms["string_relace"]["set_set"].value;
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById(abc).innerHTML = xmlhttp.responseText;
				}
			}
			var def = 'string_change.php'+"?"+"text1="+x+"&text2="+y+"&text3="+z;
			xmlhttp.open('GET',def,true);
			xmlhttp.send();
			
		}
	</script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Share-O-Smile</a>
			</div>
			<ul class="nav navbar-nav ">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">My Photos</a></li>
				<li><a href="upload.php">Share a Pic</a></li> 
				
			</ul>
			<?php
			if(loggedin())
			{



			}
			else
			{

				?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>

				<?php
			}
			?>

		</div>
	</nav>

	<div class="container">
  <h2>Image Gallery</h2>
  <p>Look how happy people are...!!</p>
 
  
  <?php

$photo1->viewphotos(0,4);   

    
?>
  
   
</div>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>