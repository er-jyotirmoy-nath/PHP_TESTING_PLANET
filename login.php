<?php
include("core.php");
	if(isset($_POST["user_id"]) && !empty($_POST["user_pass"]) && isset($_POST["user_id"]) && !empty($_POST["user_pass"]))
	{
		$username = $_POST["user_id"];
		$password = MD5($_POST["user_pass"]);
		$con = new PDO("mysql:host=localhost;dbname=a_database","root","");
		$stmt = $con->prepare('SELECT id,user_id,password,Email_V FROM register_user where user_id = :username and password = :password ');

		$stmt->bindParam(':username',$username,PDO::PARAM_STR,12);
		$stmt->bindParam(':password',$password,PDO::PARAM_STR,12);
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $row)
		{
			$id = $row['id'];
			$emv = $row['Email_V'];
		}

		if(!empty($id) && !isset($_POST['stay']) )
		{
			if($emv >= 1)
			{
				$_SESSION['id'] = $id;
				$con = null;
				header("Location: index.php");

			}
			else
			{
				echo "Email ID has not been verified!!Check you email";
			}
		}
		else if(!empty($id) && isset($_POST['stay']))
		{
			$con = null;
			setcookie("id",$id,time()+3600);
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



		<html>
		<head>
			<title>Share-O-Smile</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
		</head>
		<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Share-O-Smile</a>
    </div>
    <ul class="nav navbar-nav ">
      <li ><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
    </ul>
     <ul class="nav navbar-nav navbar-right">
        <li ><a href="#" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
  </div>
</nav>
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
							<div class = "panel-heading">Are you already Registered?</div>
							<div class="panel-body">
								<form name="login_user" action="" method="POST">
									<div class="form-group">
										<label for="email">Email id:</label>
										<input type="email" class="form-control" id="email" name="user_id">
									</div>
									<div class="form-group">
										<label for="pwd">Password</label>
										<input type="password" class="form-control" name="user_pass" id="pwd">
									</div>
									<div class="checkbox">
										<label><input type="checkbox" name="stay">Stay Loggedin</label>
									</div>
									<input class="btn btn-default" type="submit" value="Submit" name="user_submit">
								</form></div>
								<div class="panel-footer">
									Not Registered Yet?&nbsp<a href="register_ajax.php" >Register Now!!</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">


					</div>
				</div>
			</body>
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</body>
		</html>

		<?php
	}


?>
