<?php 
include("core.php");
session_destroy();
unset($_COOKIE['id']);
setcookie('id','',time() - 3600);
header("Location: index.php");


?>
