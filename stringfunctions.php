<?php

$string = "The quick brown fox jumped over the crazy little dog";
$aray_string = array('Hi','How','Are','You','my','friend');
$stringr = array();
$stringr[] = trim($string);
$stringr[] = strtoupper($string);
$stringr[] = strtolower($string);
$stringr[] = strcmp($string,"Hi");
$stringr[] = strlen($string);
$stringr[] = addslashes("Hi' how the hel'd arn't you");
$stringr[] = crc32($string);
$stringr[] = str_replace("fox","dog",$string);
$stringr[] = strpos($string,"fox",0);
$stringr[] = substr($string,6);
$stringr[] = md5($string);
$stringr[] = ucwords($string);
$stringr[] = ucfirst($strimg);
$stringr[] = implode($aray_string,',');
$stringr[] = htmlspecialchars($string);
//we shal doo substr_replace later
$stringe = explode(" ",$string);
foreach($stringr as $row){
  echo $row.'<br>';
}

echo "<br> <b>Now using a for loop</b><br>";
for($i=0;$i<count($stringr);$i++)
{
  echo $stringr[$i].'<br>';
}
echo "<br><b>Exploded</b></br>";
foreach($stringe as $exp){
echo $exp;
}
?>
