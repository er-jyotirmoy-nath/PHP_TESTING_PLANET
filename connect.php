<?php
/*
class Serverexception extends Exception {
	public function showsverror(){
		echo "We have a server error";
	}
}
class Databaseexception extends Exception {
	public function showdberror(){
		echo "We have a DB error";
	}
}

try{
			if(!mysql_connect("localhost","root",""))
		{
			
			throw new Serverexception('Server Error');
			
		}
		else if (!mysql_select_db("a_database")) {
			throw new Databaseexception('Database Error');
		}

		else
		{
			mysql_connect("localhost","root","");
			mysql_select_db("a_database");	
		}

}


catch(Serverexception $ex1)
{
	echo $ex1->showsverror();
}
catch(Databaseexception $ex2)
{
	echo $ex2->showdberror();
}
*/
try
{
	$username = "root";
	$password = "";
	$host = "localhost";
	$db_name = "a_database";
	$con = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
}
catch (Exception $ex)
{
	echo $ex->getMessage();
}

?>
