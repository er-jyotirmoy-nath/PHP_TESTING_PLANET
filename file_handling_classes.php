
<?php

  class file_handling
  {

 /* function  __construct()
  {

    if($handledir = opendir($dirname))
    {
      echo 'Reading the Directory \ '.$dirname;
      while ($file = readdir($handledir))
      {
       echo "Files here are".$file."<br>"; 
      }
    }
  }*/
    public function  writetofile($filename,$text)
    {
     
       $handle = fopen($filename,"a");
       fwrite($handle,$text);
        fclose($handle);
      
    
    }
    
    public function  deletefile($filename)
    {
      unlink($filename);
    }

    public function  readafile($filename)
    {
      $handle = fopen($filename,"r");
       $string = fread($handle,filesize($filename));
        fclose($handle);
        return $string;
    }
}


?>
