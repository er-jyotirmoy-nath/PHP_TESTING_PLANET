<?php
		
class registeruser
{
	public $userid;
	public $password;
	public $fname;
	public $lname;
	public $usert;
	
	function  __construct()
	{
		/*$this->$user_id = $a;
		$this->$password = $b;
		$this->$fname = $c;
		$this->$lname = $d;
		$this->$usert = $e;*/
		
	}
	private function checkuser($id)
	{
		$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$stmt_select = $con->prepare("select count(id) as count_id from register_user where user_id = :user_id");
		$stmt_select->bindParam(":user_id",$id);
		$stmt_select->execute();
		$result = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
		$count = $row["count_id"];

			# code...
		}
		
		if($count >= 1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	public function insert($uid,$upass,$ufn,$uln,$urt)
	{
		$this->userid = $uid;
		$this->password = $upass;
		$this->fname = $ufn;
		$this->lname = $uln;
		$this->usert = $urt;
		if(!$this->checkuser($uid))
		{
		try
		{
		
		$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
			$stmt = $con->prepare("insert into register_user(user_id,password,first_name,last_name,p_uploaded,reg_time) values(:user_id,:password,:fname,:lname,0,:utime)");
			$stmt->bindParam(":user_id",$this->userid);
			$stmt->bindParam(":password",$this->password);
			$stmt->bindParam(":fname",$this->fname);
			$stmt->bindParam(":lname",$this->lname);
			$stmt->bindParam(":utime",$this->usert);
			$stmt->execute();
			
			$to = "jyotirmoy85@gmail.com";
			$subject = "A user has been registered";
			$body= "A new user has been registered";
			$header = "From: Website Admin <jyotirmoy85@gmail.com>";
			if(mail($to,$subject,$body,$header))
			{
				$con=null;
				return true;
			}
			else{
				return false;
			}
			return true;
			
			$con=null;
			
		}
		catch (Exception $ex)
		{
			echo $ex->getMessage();
		}
		}
		else
		{
			return false;
		}
	}
	
}

if(isset($_POST["user_id"]) && !empty($_POST["user_id"]) && isset($_POST["user_pass"]) && !empty($_POST["user_pass"]) && isset($_POST["user_fname"]) && !empty($_POST["user_fname"]) && isset($_POST["user_lname"]) && !empty($_POST["user_lname"]))
{
	
		
		$uid = mysql_real_escape_string($_POST["user_id"]);
		$upass = md5(mysql_real_escape_string($_POST["user_pass"]));
		$ufn = mysql_real_escape_string($_POST["user_fname"]);
		$uln = mysql_real_escape_string($_POST["user_lname"]);
		$urt = date("d M Y H:m:s",time());
		$reg1 = new registeruser();
		if($reg1->insert($uid,$upass,$ufn,$uln,$urt))
		{
			echo 'You have been registered...<a  href="index.php">Login</a>';
			
		}
		else
		{
			echo 'User exists'.'<a href="index.php">Login</a>';
		}
	
}
else
{
	echo "You did not enter anything try again";
}
	?>
