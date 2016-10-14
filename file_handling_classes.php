
<?php

class file_handling{

function public __construct($dirname){
  if($handledir = opendir($dirname))
  {
    echo 'Reading the Directory \ '.$dirname;
    while ($file = readdir($handledir))
    {
     echo "Files here are".$file."<br>"; 
    }
  }
}
  function public writetofile($filename,$text)
  {
   
     $handle = fopen($filename,"a");
     fwrite($handle,$text);
      fclose($handle);
    
  
  }
  function public deletefile($filename)
  {
    unlink($filename);
  }
  function public readafile($filename)
  {
    $handle = fopen($filename,"r);
     $string = fread($handle,filesize($filename));
      fclose($handle);
      return $string;
  }
}


?>
