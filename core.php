<?php
ob_start();
session_start();
ini_set("magic_quotes_gpc", "On");
@$script_name = $_SERVER['script_name'];
@$http_refer = $_REQUEST['HTTP_REFERER'];
function loggedin(){

if(isset($_SESSION["id"])&& !empty($_SESSION["id"])){
	return true;
}
else
{
	return false;
}
}
function getuserdata($field,$id){
	try{

	

	$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
	$stmt = $con->prepare("SELECT :field from register_user where id = :id");
	$stmt->bindParam(':field',$field);
	$stmt->bindParam(':id',$id,PDO::PARAM_STR,12);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$myfield = $row[$field];
		
	}
	return $myfield;
}
catch(Exception $ex){
	echo $ex->getMessage();
}
}
?>
