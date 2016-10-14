<?php

$string = "The quick brown fox jumped over the crazy little dog";

$string = strtoupper($string);
$string = strtolower($string);
$string_cmp = strcmp($string,"Hi");
$string_len = strlen($string);
$string_slashes = addslashes("Hi' how the hel'd arn't you");
$string_encrypted = crc32($string);
$string_replaced = str_replace("fox","dog",$string);
$string_pos = strpos($string,"fox",0);


?>
