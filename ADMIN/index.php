<?php
if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] == 'cat')
{
  include('categoryman.php');
}
else if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] == 'user')
{
  include("userman.php");
}
else
{

}


?>
