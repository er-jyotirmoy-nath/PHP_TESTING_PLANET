<?php
$host  = '';
$username = '';
$password = '';

try
{
  $con = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRORMODE_EXCEPTION);
  $sql = "":
  $con->exec($sql);
  echo "Donesuccessfully";
  
}
catch(PDOException $ex){
  echo $ex->getMessage();
}

?>
