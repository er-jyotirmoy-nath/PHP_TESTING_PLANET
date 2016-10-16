
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
<?php
if(base64_decode($_GET['status'])=='uploadsuccess')
{
	echo '<h4>Your photos have been saved successfully.Lets go back...<a href="index.php">Go</a></h4>';
}
else if (base64_decode($_GET['status'])=='registersuccess') {
	# code...
	echo '<h4>Yepee!! Registered Successfully...<a href="index.php">Go</a></h4>';
}
else
{
	header("Location: index.php");
}
?>



</body>
</html>