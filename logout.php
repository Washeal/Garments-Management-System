<?php session_start();
  
 unset($_SESSION["uid"]);
 unset($_SESSION["uname"]);
 unset($_SESSION["urole"]);
 
 session_destroy();
 
 header("location:index.php");
 

?>