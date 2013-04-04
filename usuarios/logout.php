<?php


  session_start();
  $_SESSION["contadorSession"] = 0;
  unset($_SESSION["miSession"]); 
  unset($_SESSION["contadorSession"]); 
  session_destroy();
  header("Location: ../index.php");
  exit;


?>
