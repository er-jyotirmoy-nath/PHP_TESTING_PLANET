<?php
ob_start();
session_start();
ini_set("magic_quotes_gpc", "On");
@$script_name = $_SERVER['script_name'];
@$http_refer = $_REQUEST['HTTP_REFERER'];
function loggedin(){

if((isset($_SESSION["id"])&& !empty($_SESSION["id"])) || (isset($_COOKIE["id"])&& !empty($_COOKIE["id"]))){
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
	$field = str_ireplace("'", "",$field);
	$stmt = $con->prepare("SELECT ".$field." from register_user where id = :id");
	
	$stmt->bindParam(':id',$id,PDO::PARAM_STR,12);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$myfield = $row[$field];
		
	}
	return $myfield;
	$con = null;
}
catch(Exception $ex){
	echo $ex->getMessage();
}
}
?>
