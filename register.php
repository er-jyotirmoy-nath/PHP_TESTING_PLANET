<?php
if(isset($_POST["user_id"]) && !empty($_POST["user_id"]) && isset($_POST["user_pass"]) && !empty($_POST["user_pass"]) && isset($_POST["user_fname"]) && !empty($_POST["user_fname"]) && isset($_POST["user_lname"]) && !empty($_POST["user_lname"]))
{
	
		
		$user_id = mysql_real_escape_string($_POST["user_id"]);
		$password = md5(mysql_real_escape_string($_POST["user_pass"]));
		$fname = mysql_real_escape_string($_POST["user_fname"]);
		$lname = mysql_real_escape_string($_POST["user_lname"]);
		$usert = date("d M Y H:m:s",time());
		//if(!check_user_reg())
		//{
			try{
			echo $password;
		//require_once("connect.php");
		$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
			$stmt = $con->prepare("insert into register_user(`user_id`, `password`, `first_name`, `last_name`, `reg_time`)  values(:user_id,:password,:fname,:lname,:utime)");
			
			$stmt->bindParam(":user_id",$user_id);
			$stmt->bindParam(":password",$password,PDO::PARAM_STR,24);
			$stmt->bindParam(":fname",$fname);
			$stmt->bindParam(":lname",$lname);
			$stmt->bindParam(":utime",$usert);
			$stmt->execute();
			//$con=null;
			echo 'Registeration Successfull..<a href="index.php">Login</a>';
			}
			catch (Exception $ex){
				echo $ex->getMessage();
			}
	//	}
	//	else
		//{
	//		echo 'User exists'.'<a href="index.php">Login</a>';
	//	}
	
}
else
{
	echo "You did not enter anything try again";
}
	?>
