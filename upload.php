<?php 
require_once("core.php");

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
				<li ><a href="index.php">Home</a></li>
				<li><a href="#">My Photos</a></li>
				<li class="active"><a href="#">Share a Pic</a></li> 
				
			</ul>
			<?php
			if(loggedin())
			{

				?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>

				<?php
			}
			else
			{
				header("Location: login.php");
				
			}
			?>

		</div>
	</nav>

	<div class="container-fluid">
	<?php
		if (isset($_GET['status']) && base64_decode($_GET['status'])=='uploadsuccess') {
	# code...
			echo ' <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Image has been uploaded.
  </div>';
		}
		if(!loggedin())
		{

			header("Location: login.php");

		}
		else
		{

			?>
	<div class="row">
		<div class="col-sm-6">
			
			<strong>Hi, <?php echo getuserdata('first_name',$_SESSION['id']); echo ' '.getuserdata('last_name',$_SESSION['id']); ?></strong> (<a href="logout.php">Logout</a>)
			<br>
			<a href="#">Upload your photo</a> | <a href="index.php">View your photos <span class="badge">(<?php echo getuserdata('p_uploaded',$_SESSION['id']); ?>)</span></a>

			<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST" enctype="multipart/form-data">
			<div class="form-group">

				<h3>Step 1: Let's give it a title.</h3>
				
				<input type="text" class="form-control " name="title_photo" >
				</div>
				<div class="form-group">
				<h3>Step 2: Select a photograph that makes you smile.</h3><br>
				<input type="file" class="form-control" name="file" >

				</div>
				<h3>Step 3: Enter a paragraph saying why it makes you smile.</h3><br>
				<textarea class="textarea" name="smile_say" cols="55" rows="10"></textarea><br><br>
				<div class="form-group">
				<h3>Step 4: Select a category.</h3><br>

				<?php

				try
				{
					$con_cat = new PDO("mysql:host=localhost;dbname=a_database","root","");
					$con_cat->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$stmt_cat = $con_cat->prepare("select category_id,category from category");
					$stmt_cat->execute();
					$result_cat = $stmt_cat->fetchAll();
					echo "<select name=\"category_get\" class=\"form-control\">";
					foreach ($result_cat as $row) {
						echo '<option value="'.$row["category_id"].'">'.$row["category"].'</option>';
					}
					$con_cat = NULL;
					echo "</select>";	
				}
				catch(Exception $ex)
				{
					echo $ex->getMessage();
				}

				?>
				</div>
				
				<input type="submit" class="buttons" value="Upload" name="submit"  />
			</form>
			<br>
			<div id="result"></div>
			<?php //if(replacestr() != ''){ echo '<br>The replaced string is: '.replacestr(); }?>
			<?php
		}

		?>
			
		</div>
		<div class="col-sm-6"></div>
	</div>


			


	</div>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php

if(isset($_POST["submit"]) && !empty($_POST["submit"]))
{
	$n = $_FILES['file']['name'];
	$t = $_FILES['file']['tmp_name'];
	$tp = $_FILES['file']['type'];
	$s= $_FILES['file']['size'];
	$cid = $_POST["category_get"];
	$txt = $_POST["smile_say"];
	$title = $_POST["title_photo"];
	$user1 = new uphotoupload();
	if($user1->photosave($title,$n,$t,$tp,$s,$cid,$txt))
	{
		$status = base64_encode("uploadsuccess");
		header("Location: upload.php?status=$status");
	}
	else
	{
		echo "Something is wrong";
	}


}
else
{

}


?>