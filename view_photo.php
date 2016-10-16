<?php
require_once("core.php");

class viewphotos
{

	public function viewurphoto()
	{
		try
		{
		$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt_getph = $con->prepare("select * from panorama");
		$stmt_getph->execute();
		$result = $stmt_getph->fetchAll();
		$list = '';
		foreach ($result as $value) {
			# code...
			$list .= $value['ID'].' '.getuserdata('first_name',$value['USER_ID']).' '.getuserdata('last_name',$value['USER_ID']).' <img src="uploads/'.$value['PHOTO_FILE'].'" height="150" width="300"> '.$value['USER_COMM'].' '.$value['CATEGORY_ID'].'<br>';

		}
		echo $list;
		}
		catch(Exception $ex){
			echo $ex->getMessage();
		}
	}
}

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
<?php
$user1 = new viewphotos();
$user1->viewurphoto();
/*if(base64_decode($_GET['status'])=='uploadsuccess')
{
	
}
else if (base64_decode($_GET['status'])=='registersuccess') {
	
}
else
{
	header("Location: index.php");
}*/
?>



</body>
</html>