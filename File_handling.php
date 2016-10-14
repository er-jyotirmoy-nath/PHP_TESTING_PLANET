
<?php
if(isset($_POST['edit']))
{
  $handle_file_write = fopen($file_name,"a");
  fwrite($handle_file_write,$_POST['text']);
  fclose($handle_file_write);
}
if(isset($_POST['delete']))
{
  $filename = base64_decode($_GET['id']);
 unline($filename);
  echo "file deleted";
}
$directory = $_POST['Directory'];

if($handle = opendir($directory))
{
  echo "Looking into <b>".$directory."</b>";
  
  while($file = readdir($handle))
  {
    echo "<b><a href =?id=".base64_encode($file).">".$file."</a></b></br>";
    
  }
}
else
{
  echo 'No such directory!!';
}
if(isset($_GET['id']) && !empty($_GET['id']))
{
  $file_name = base64_decode($_GET["id"]);
    if(file_exists($filename))
    {
    $handle_file = fopen($file_name,"r");
    $file_string = fread($handle_file,filesize($file_name));
    echo '<form name="fileediter" method="POST" action = "'.$_SERVER['PHP_SELF'].'"><textarea name="text" cols=50 rows = 50>'.$file_string.'</textarea>';
    echo '<input type="submit" name="edit" value="Edit" /><input type="submit" name="Delete" value="Delete" /></form>';
      $fclose($file_name);
    }
    else
    {
      echo 'File doesnt exist';
    }
}
  else
  {
    echo "No such file selected!!";
  }

?>
