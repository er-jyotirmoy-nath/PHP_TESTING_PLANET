<?php 
require_once("core.php");

?>
<html>
<head>
	<title>A simple app to find and replace string</title>
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
<h2>Welcome to the string find and replace web page.</h2>

<?php
if(!loggedin())
	{
		require_once('login.php');
	}
	else
	{

		?>
		<h4>Hi, <?php echo getuserdata('first_name',$_SESSION['id']); echo ' '.getuserdata('last_name',$_SESSION['id']); ?></h4><a href="logout.php">Logout</a>
		<br>
		<a href="#">Upload your photo</a>|<a href="#">View your photos</a>
		<form name="string_relace" action="index.php" method="POST">
		Enter your text below:<br>
		<textarea cols="25" rows="7" name="str_text" ><?php echo @$_POST['str_text'];?></textarea><br><br>
		Enter word to be replaced:<br>
		<input type="text" name="replace_str" value=<?php echo @$_POST['replace_str'];?> ><br><br>
		Enter word to be set:<br>
		<input type="text" name="set_set" value = <?php echo @$_POST['set_set'];?>><br><br>
		<input type="button" value="Submit" name="submit_str" onclick="load('result');" /><input type="submit" value="Undo" name="undo_str" />
		</form>
		<br>
		<div id="result"></div>
		<?php //if(replacestr() != ''){ echo '<br>The replaced string is: '.replacestr(); }?>
		<?php
	}

?>

</body>
</html>