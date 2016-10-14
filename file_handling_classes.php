
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
  function public writetofile($filename)
  {
    
  }
  function public deletefile($filename)
  {
    
  }
  function public readafile($filename)
  {
    
  }
}


?>
