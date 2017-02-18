<?php

//  session_start();

 include '..\difficulty_level.php';
unset($_SESSION["score"]);
unset($_SESSION["blank"]);
  header("Location: ../exercises.php")

?>
