<?php
require_once('core.php');
$id = base64_decode($_GET['id']) ;
$emailid = base64_decode($_GET['emailid']);
$hash = base64_decode($_GET['token']);

echo $id."<br>".$emailid."<br>".$hash."<br>";

$getid = getuserdata('id',$id);
$getemail = getuserdata('user_id',$id);
$gethas = getuserdata('token',$id);
$emv = getuserdata('Email_V',$id);
echo $getid."<br>".$getemail."<br>".$gethas."<br>".$emv;
if(!strcmp($emailid, $getemail) && !strcmp($hash, $gethas) && $emv <= 0){
	try{

		$con1 = new PDO("mysql:host=localhost;dbname=a_database","root","");
		$con1->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt1 = $con1->prepare("update register_user set Email_V = 1 where id = :id");
		$stmt1->bindParam(":id",$id);
		$stmt1->execute();
		header("Location: index.php?status=".base64_encode("emailverified"));
	}
	catch(Exception $ex){
		echo $ex->getMessage();
	}

}
else
{
	header("Location: index.php");
}
?>