<?php 
require_once("core.php");

?>
<html>
<head>
	<title>Share-O-Smile</title>
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
		<a href="#">Upload your photo</a>|<a href="#">View your photos</a>
		<form name="string_relace" action="index.php" method="POST">
		<h3>Step 1: Select a photograph that makes you smile.</h3><br>
        <input name="photo_smile" type="file" size="2000">
		<br><br>
		<h3>Step 2: Enter a paragraph saying why it makes you smile.</h3><br>
		<textarea name="smile_say" cols="55" rows="10"></textarea><br><br>
		<h3>Step 3: Tag a friend or a place.</h3><br>
		<input type="text" name="set_set" value = <?php echo @$_POST['set_set'];?>><br><br>
		<input type="button" value="Upload" name="submit_str" onClick="load('result');" />
		</form>
		<br>
		<div id="result"></div>
		<?php //if(replacestr() != ''){ echo '<br>The replaced string is: '.replacestr(); }?>
		<?php
	}

?>

</body>
</html>