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
	public function insert($uid,$upass,$urt)
	{
		$this->userid = $uid;
		$this->password = $upass;
		
		$this->usert = $urt;
		if(!$this->checkuser($uid))
		{
		try
		{
		
		$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
			$stmt = $con->prepare("insert into register_user(user_id,password,p_uploaded,reg_time,Token,Email_V) values(:user_id,:password,0,:utime,:token,:emailv)");
			$stmt->bindParam(":user_id",$this->userid);
			$stmt->bindParam(":password",$this->password);
			
			$stmt->bindParam(":utime",$this->usert);
			$rand = rand(000000,999999);
			$token = md5($rand.$this->userid.$this->usert);
			$emailv = 0;
			$stmt->bindParam(":token",$token);
			$stmt->bindParam(":emailv",$emailv);
			$stmt->execute();
			
			$to = "jyotirmoy85@gmail.com";
			$subject = "A user has been registered";
			$body= "You have been registered <br>"."<a href=http://localhost/Project_app/PHP_TESTING_PLANET/verify.php?id=".base64_encode($this->userid)."&token=".base64_encode($token).">Click to verify</a>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: Website Admin <jyotirmoy85@gmail.com>' . "\r\n";
			if(mail($to,$subject,$body,$headers))
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

if(isset($_POST["user_id"]) && !empty($_POST["user_id"]) && isset($_POST["user_pass"]) && !empty($_POST["user_pass"]) )
{
	
		
		$uid = mysql_real_escape_string($_POST["user_id"]);
		$upass = md5(mysql_real_escape_string($_POST["user_pass"]));
		
		$urt = date("d M Y H:m:s",time());
		$reg1 = new registeruser();
		if($reg1->insert($uid,$upass,$urt))
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
