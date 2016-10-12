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
	require_once("connect.php");
	$query = "SELECT $field FROM REGISTER_USER WHERE id=".$id;
	if($result = mysql_query($query))
	{
		$myfield = mysql_result($result, 0, "$field");
		return $myfield;
	}
	else
	{
		echo mysql_error();
		die();
	}
}
?>
