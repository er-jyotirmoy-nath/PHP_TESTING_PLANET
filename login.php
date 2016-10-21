<?php
function login(){
	require_once("connect.php");
if(isset($_POST["user_id"]) && !empty($_POST["user_pass"]) && isset($_POST["user_id"]) && !empty($_POST["user_pass"]))
{
	$username = $_POST["user_id"];
	$password = MD5($_POST["user_pass"]);
	$stmt = $con->prepare('SELECT id,user_id,password FROM register_user where user_id = :username and password = :password ');

	$stmt->bindParam(':username',$username,PDO::PARAM_STR,12);
	$stmt->bindParam(':password',$password,PDO::PARAM_STR,12);
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach($result as $row)
	{
		$id = $row['id'];
	}
	if(!empty($id) && !isset($_POST['stay'])){
		$_SESSION['id'] = $id;
		header("Location: index.php");
	}
	else if(!empty($id) && isset($_POST['stay']))
	{
		setcookie("id",$id,time()+3600);
	}
	else
	{
		echo "Undefined Userid or Password";
	}
}
else
{
	
	?>
Are you already Registered?<br><form name="login_user" action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">
	User Name: <input type="text" name="user_id" value="" /> Password: <input type="password" name="user_pass" value=""/><input type="checkbox" name = "Stay" />Stay logged in<br><br><input class="buttons" type="submit" value="Submit" name="user_submit">
</form>
<br>Not Registered Yet?&nbsp<a href="register_ajax.php" >Register Now!!</a>
	<?php
}
}
login();
	
?>
