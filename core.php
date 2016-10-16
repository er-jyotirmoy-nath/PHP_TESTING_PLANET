<?php
ob_start();
session_start();
ini_set("magic_quotes_gpc", "On");
@$script_name = $_SERVER['script_name'];
@$http_refer = $_REQUEST['HTTP_REFERER'];
require_once("file_handling_classes.php");
class uphotoupload extends file_handling
{
	private $name ;
	private $tmp_name ;
	private $type ;
	private $size ;
	function __construct(){}
	public function updateuserupload($id_ph,$photo_nm,$cid,$fnm)
	{
		try
		{
			$con=null;
			$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
			$stmt_photo = $con->prepare("insert into panorama(user_id,photo_file,category_id,user_comm) values (:userid,:photo,:category_id,:userfn);");
			/*if(!$stmt_photo)
			{
				print_r($con->errorInfo());
			}
			else
			{*/
				$stmt_photo->bindParam(":userid",$id_ph);
				$stmt_photo->bindParam(":photo",$photo_nm);
				$stmt_photo->bindParam(":category_id",$cid);
				$stmt_photo->bindParam(":userfn",$fnm);
				$stmt_photo->execute();
				$con = null;
			//}
		}
		catch(Exception $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function photosave($fnm,$ftmp,$ftyp,$fs,$cid,$text)
	{
		
		$this->name = $fnm;
		$this->tmp_name = $ftmp;
		$this->type = $ftyp;
		$this->size = $fs;
		//opendir("uploads");
		$location = "uploads/";
		$extention = strtolower(substr($this->name, strrpos($this->name, '.')+1));
		$first_name = substr($this->name,0,strrpos($this->name, '.'));
		if(isset($this->name) && !empty($this->name))
		{
			if ($extention == 'jpg' || $extention == 'jpeg') 
			{
							# code...
				if (move_uploaded_file($this->tmp_name, $location.md5($first_name).'.'.$extention)) {
					# code...
					try{
						$con = null;
						$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
						$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						$count_p = getuserdata('p_uploaded',$_SESSION['id']);
						$count_p = $count_p + 1;
						$stmt_upload = $con->prepare("update register_user set p_uploaded = :count_p where id = :id;");
						$stmt_upload->bindParam(":count_p",$count_p);
						$stmt_upload->bindParam(":id",$_SESSION['id']);
						$stmt_upload->execute();
						$idph = $_SESSION['id'];
						$pnm = md5($first_name).'.'.$extention;
						
						$fnm = md5($first_name).'.txt';
						file_handling::writetofile($fnm,$text);
						$this->updateuserupload($idph,$pnm,$cid,$fnm);
						$con = null;
						return true;
					}
					catch(Exception $ex)
					{
						return $ex->getMessage();
					}
					
				}
				else
				{
					return false;
				}

			}
			else
			{
				return false;
			}
		}
	}

}

//Procedural
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
