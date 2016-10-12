<?php
require_once('connect.php');

class counterror extends Exception{
	public function count_error(){
		echo 'There was a count error';
	}
}
try {
	/*Find the number of counts*/
	$select_query = "SELECT count FROM counter where 1";
	$result = mysql_query($select_query);
	if(mysql_num_rows($result) >= 0)
	{
		$row = mysql_result($result,0,"count");
	}
	echo "Total counts on website: $row";

	/*Check ip address*/
	$client_ip = $_SERVER["REMOTE_ADDR"];
	echo "Your ip is $client_ip";
	$ip_query = "Select ip from ip_address where ip = $client_ip";
	$result = mysql_query($ip_query);
	if (mysql_num_rows($result) >= 1 ) 
	{
		
		# code...
	}
	else
	{
		$row = $row + 1;
	echo "<br>You are vistor number:$row";
	$insert_query = "update counter set count = $row where id = 1";
	if(mysql_query($insert_query))
	{
		echo "Done";
	}
	else
	{
		throw new counterror('Count error');
	}	
	}
	
}
catch(counterror $ex){
	echo $ex->count_error();
}

?>