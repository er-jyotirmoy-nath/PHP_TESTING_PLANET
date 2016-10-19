
<?php
$array_name = array("orange","apple","grapes","bannna");

array_push($array_name,"Cucumber");
print_r($array_name);
echo '</br>';
$fruit = array_pop($array_name);
print_r($array_name);
echo '</br>';
array_shift($array_name,"Mango");
print_r($array_name);
echo '</br>';
$fruit = array_unshift($array_name);
print_r($fruit);
echo '</br>';

?>
