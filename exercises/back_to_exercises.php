<?php

//  session_start();

 include '..\difficulty_level.php';
unset($_SESSION["score"]);
unset($_SESSION["blank"]);
$_SESSION["math_section_1"] =0;
  header("Location: ../exercises.php")

?>
