<?php
class ajaxpostdata extends Exception{
	
}


if(isset($_POST["user_id"]) && !empty($_POST["user_id"]) && isset($_POST["user_pass"]) && !empty($_POST["user_pass"]) && isset($_POST["user_fname"]) && !empty($_POST["user_fname"]) && isset($_POST["user_lname"]) && !empty($_POST["user_lname"]))
{
	
		require("connect.php");
		$user_id = mysql_real_escape_string($_POST["user_id"]);
		$password = md5(mysql_real_escape_string($_POST["user_pass"]));
		$fname = mysql_real_escape_string($_POST["user_fname"]);
		$lname = mysql_real_escape_string($_POST["user_lname"]);
		$usert = date("d M Y H:m:s",time());
		//if(!check_user_reg())
		//{

			$query = "insert into register_user values ('NULL','$user_id','$password','$fname','$lname','$usert')";
			if(mysql_query($query))
			{
				echo 'Registeration Successfull..<a href="index.php">Login</a>';
			}
			else
			{
				echo "The error is: ".mysql_error();
				
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