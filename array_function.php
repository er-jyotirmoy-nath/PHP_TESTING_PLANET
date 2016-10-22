
<?php
$array_name = array("orange","apple","grapes","bannna");

array_push($array_name,"Cucumber");
print_r($array_name);
echo '</br>';
$fruit = array_pop($array_name);
print_r($array_name);
echo '</br>';
array_shift($array_name);
print_r($array_name);
echo '</br>';
$array_name = array("orange","apple","grapes","bannna");
array_unshift($array_name,"Mango");
print_r($array_name);
echo '</br>';
echo array_key_exists(3, $array_name);

/*a real life example*/
<?php
$city = array("mumbai" => 5, "Mumbai" => 10,"Delhi" => 15,"DELHI" => 20,"madras" => 15,"Madras" => 5,"MADRAS" => 5);
$newcity = array();
//$newcity = $city;
$count = 0;

foreach($city as $row => $value)
{
	$newcity[strtolower($row)] = 0;
	
	
}
foreach($city as $row => $value)
{
	
	if(strtolower($row) == strtolower($row))
	{
		$newcity[strtolower($row)] += $value;
	}
	
	
}
print_r($newcity);
?>
?>
