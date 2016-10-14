
<?php
$directory = $_POST['Directory'];

if($handle = opendir($directory)){
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
  $file_name = $_GET["id"];
  if(file_exists($filename)){
  $handle_file = fopen($file_name,"r");
  $file_string = fread($handle_file,filesize($file_name));
  echo '<form name="fileediter" method="POST" action = "'.$_SERVER['PHP_SELF'].'"><textarea cols=50 rows = 50>'.$file_string.'</textarea>';
  echo '<input type="submit" name="edit" value="Edit" /><input type="submit" name="Delete" value="Delete" /></form>';
  }
  else{
    echo 'File doesnt exist';
  }
  }
  else
  {
    echo "No such file exists!!";
  }
}
?>
