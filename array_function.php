<?php
/*a real life example*/
class array_work
{
	public function __construct()
	{
		echo "Below this is a live problem solved <br>";
	}
	public function __destruct()
	{
	}
	public function convert_to_city($city_assoc,$newcity)
	{
		//$newcity = $city;
		$count = 0;
		foreach($city_assoc as $row => $value)
		{
			$newcity[strtolower($row)] = 0;
		}
		foreach($city_assoc as $row => $value)
		{
			if(strtolower($row) == strtolower($row))
			{
				$newcity[strtolower($row)] += $value;
			}
		}
		print_r($newcity);
	}
}
$mywork = new array_work();
$city = array("mumbai" => 5, "Mumbai" => 10,"Delhi" => 15,"DELHI" => 20,"madras" => 15,"Madras" => 5,"MADRAS" => 5,"MaDrAs" => 20);
$newcity = array();
$mywork->convert_to_city($city,$newcity);
echo "<br> Below this we have our examples <br>Pushed an array<br>";
$array_name = array("orange","apple","grapes","bannna");
print_r($array_name);
array_push($array_name,"Cucumber");
print_r($array_name);
echo '</br> Pooped<br>';
$fruit = array_pop($array_name);
print_r($array_name);
echo '</br>Shifted<br>';
array_shift($array_name);
print_r($array_name);
echo '</br>Unshifted<br>';
$array_name = array("orange","apple","grapes","bannna");
array_unshift($array_name,"Mango");
print_r($array_name);
echo '</br>';

echo array_key_exists(3, $array_name);
echo '<br>Sorted City<br>';
$array_name = array("orange","apple","grapes","bannna");
sort($array_name);
print_r($array_name);
echo "<br>";
rsort($array_name);
print_r($array_name);
echo "<br>";
asort($city);
print_r($city);
echo "<br>";
arsort($city);
print_r($city);
echo "<br>";
ksort($city);
print_r($city);
echo "<br>";
krsort($city);
print_r($city);
echo "<br>";
?>
