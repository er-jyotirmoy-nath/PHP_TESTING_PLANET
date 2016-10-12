<?php
$host  = '';
$username = '';
$password = '';

try
{
  $con = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRORMODE_EXCEPTION);
  $sql = "create table new_table(
  ID INT(16) ATU_INCREMENT PRIMARY_KEY,
  username VARCHAR(255) NOT NULL,
  firstname VARCHAR(255) NOT NULL,
  email VARCHAR(255) ,
  reg_date TIMESTAMP
  );":
  $con->exec($sql);
  echo "Donesuccessfully";
  
}
catch(PDOException $ex){
  echo $ex->getMessage();
}

?>
