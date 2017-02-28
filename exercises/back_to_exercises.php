<?php

//  session_start();

 include '..\difficulty_level.php';
unset($_SESSION["score"]);
unset($_SESSION["blank"]);
$_SESSION["math_section_1"] =0;
$_SESSION["math_section_2"] =0;
$_SESSION["math_section_3"] =0;
$_SESSION["math_section_4"] =0;
  header("Location: ../exercises.php")

?>
