<?php
  session_start();
  unset($_SESSION["data"]);
  header("Location: ../signin.php");
  exit();

?>