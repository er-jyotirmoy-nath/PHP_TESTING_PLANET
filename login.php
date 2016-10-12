<?php
function login(){
	require_once("connect.php");
if(isset($_POST["user_id"]) && !empty($_POST["user_pass"]) && isset($_POST["user_id"]) && !empty($_POST["user_pass"]))
{
	$query = "SELECT id,user_id,password from register_user where user_id = '".mysql_real_escape_string($_POST["user_id"])."' and password = '".md5(mysql_real_escape_string($_POST['user_pass']))."'";
	$result = mysql_query($query);
	if(@mysql_num_rows($result)  > 0)
	{
		$id = mysql_result($result,0,'id');
		$_SESSION['id'] = $id;
		header("Location: index.php");
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
	User Name: <input type="text" name="user_id" value="" /> Password: <input type="password" name="user_pass" value=""/><input type="submit" value="Submit" name="user_submit">
</form>
<br>Not Registered Yet?&nbsp<a href="register_ajax.php" >Register Now!!</a>
	<?php
}
}
login();
	
?>
