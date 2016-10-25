
<?php

header("Content-type: image/jpeg");
$name = "jyotirmoy85@gmail.com";
$stringlen = strlen($name);
$fontheight = 10;
$image_height = ImageFontHeight($fontheight);
$image_width = ImageFontWidth($fontheight) * $stringlen;

$image = imagecreate($image_width,$image_height);

imagecolorallocate($image,255,255,255);

$font_color = imagecolorallocate($image,0,0,0);

imagestring($image,$fontheight,0,0,$name,$font_color);
imagejpeg($image);

?>
