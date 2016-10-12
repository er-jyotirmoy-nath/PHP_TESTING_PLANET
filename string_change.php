<?php
if(isset($_GET['text1']) && !empty($_GET['text1']) && isset($_GET['text2']) && !empty($_GET['text2']) && isset($_GET['text3']) && !empty($_GET['text3']))
{
	$text1 = $_GET['text1'];
	$text2 = $_GET['text2'];
	$text3 = $_GET['text3'];
	$length = strlen($text2);
	$offset = 0;
	while($position = strpos($text1,$text2,$offset)){
		$offset = $position + $length;
		$text1 = substr_replace($text1, $text3, $position,$length);

	} 
	echo $text1;
}

?>