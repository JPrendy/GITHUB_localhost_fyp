<?php

  session_start();

 include '..\difficulty_level.php';
unset($_SESSION["score"]);
  header("Location: ../exercises.php")

?>
