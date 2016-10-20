<?php 
require_once("core.php");

?>
<?php




//Instatiate class
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
			header("Location: register_success.php?status=$status");
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
<html>
<head>
	<title>Share-O-Smile</title>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
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
<h2>Welcome to share-o-smile webpage.</h2>
<h4>Got an amazing photo and want to share it with others?? Go ahead</h4>
<?php
if(!loggedin())
	{
		require_once('login.php');
	}
	else
	{

		?>
		<strong>Hi, <?php echo getuserdata('first_name',$_SESSION['id']); echo ' '.getuserdata('last_name',$_SESSION['id']); ?></strong> (<a href="logout.php">Logout</a>)
		<br>
		<a href="#">Upload your photo</a> | <a href="#">View your photos</a>(<?php echo getuserdata('p_uploaded',$_SESSION['id']); ?>)
		<form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST" enctype="multipart/form-data">
		<h3>Step 1: Let's give it a title.</h3><br>
		<input type="text" name="title_photo"><br>
		<h3>Step 2: Select a photograph that makes you smile.</h3><br>
        <input type="file" name="file" >
		<br><br>
		<h3>Step 3: Enter a paragraph saying why it makes you smile.</h3><br>
		<textarea name="smile_say" cols="55" rows="10"></textarea><br><br>
		<h3>Step 4: Select a category.</h3><br>
		
		<?php
	
		try
		{
			$con_cat = new PDO("mysql:host=localhost;dbname=a_database","root","");
			$con_cat->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt_cat = $con_cat->prepare("select category_id,category from category");
		$stmt_cat->execute();
		$result_cat = $stmt_cat->fetchAll();
		echo "<select name=\"category_get\">";
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
		
        <br><br>
		<input type="submit" value="Upload" name="submit"  />
		</form>
		<br>
		<div id="result"></div>
		<?php //if(replacestr() != ''){ echo '<br>The replaced string is: '.replacestr(); }?>
		<?php
	}

?>

</body>
</html>
