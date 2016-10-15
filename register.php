<?php



class registeruser
{
	public $user_id;
	public $password;
	public $fname;
	public $lname;
	public $usert;
	
	function public __construct($a,$b,$c,$d,$e)
	{
		$this->$user_id = $a;
		$this->$password = $b;
		$this->$fname = $c;
		$this->$lname = $d;
		$this->$usert = $e;
		
	}
	public function checkuser($id)
	{
		$con = new PDO("mysql:host=localhost;dbname=a_database","localhost","");
		$con->setAttribute(PDO::ATTR_ERRORMODE,PDO::ERRMODE_EXCEPTION);
		$stmt_select = prepare("select count(id) from register_user where user_id = :user_id");
		$stmt_select->bindParam(":user_id",$id);
		$stmt_select->execute();
		$result = $stmt_select->fetchAll();
		$row = $result[0];
		if($row >= 1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	public function insert()
	{
		if($this->checkuser($user_id))
		{
		try
		{
			$stmt = $con->prepare("insert into(user_id,password,first_name,last_name,time) register_user values(:user_id,:password,:fname,:lname,:utime)");
			$stmt->bindParam(":user_id",$this->$user_id);
			$stmt->bindParam(":password",$this->$password);
			$stmt->bindParam(":fname",$this->$fname);
			$stmt->bindParam(":lname",$this->$lname);
			$stmt->bindParam(":utime",$this->$usert);
			$stmt->exectue();
			return true;
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
	

		$user_id = mysql_real_escape_string($_POST["user_id"]);
		$password = md5(mysql_real_escape_string($_POST["user_pass"]));
		$fname = mysql_real_escape_string($_POST["user_fname"]);
		$lname = mysql_real_escape_string($_POST["user_lname"]);
		$usert = date("d M Y H:m:s",time());
		$reg1 = new registeruser($user_id,$password,$fname,$lname,$usert);
		if($reg1->insert())
		{
			echo 'You have been registered...<a  href="index.php">Login</a>';
			
		}
		else
		{
			echo 'User exists'.'<a href="index.php">Login</a>';
		}
	?>
