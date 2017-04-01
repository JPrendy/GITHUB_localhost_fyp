<?php

//  session_start();



 include '..\difficulty_level.php';
unset($_SESSION["score"]);
unset($_SESSION["blank"]);
$db = mysqli_connect("localhost", "root", "" , "logintest");
$userid =  $_SESSION['userid'];
if($_SESSION["welcome"] !=2){
$sql ="UPDATE users SET session = 2 WHERE uid= '$userid'";
$result = mysqli_query($db, $sql);
$_SESSION["welcome"] =2;
$_SESSION["math_section_1"] =0;
$_SESSION["math_section_2"] =0;
$_SESSION["math_section_3"] =0;
$_SESSION["math_section_4"] =0;
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=home') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../home.php?error=session");

}
if (strpos($url, 'error=lessons') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../lessons.php?error=session");

}
if (strpos($url, 'error=settings') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../settings.php?error=session");

}
if (strpos($url, 'update=dynamic') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../lessons/Algebra.php?error=session");

}
else{
  header("Location: ../exercises.php?error=session");
}

}
else{
$_SESSION["math_section_1"] =0;
$_SESSION["math_section_2"] =0;
$_SESSION["math_section_3"] =0;
$_SESSION["math_section_4"] =0;


  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'update=dynamic') !== false){
  //$ok= "Fill out all the fields!";
  header("Location: ../lessons/algebra.php");

}
if (strpos($url, 'update=back') !== false){
  //$ok= "Fill out all the fields!";
  header("Location: ../exercises.php");

}
if (strpos($url, 'error=home') !== false){
  //$ok= "Fill out all the fields!";
  header("Location: ../home.php");

}
if (strpos($url, 'error=settings') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../settings.php");

}
if (strpos($url, 'error=lessons') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../lessons.php");

}
if (strpos($url, 'error=ex') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../exercises.php");

}
if (strpos($url, 'error=results') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../select_result.php");

}
if (strpos($url, 'error=ch') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../charts.php");

}
if (strpos($url, 'error=ci') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../change_icon.php");

}
if (strpos($url, 'update=dynamic') !== false){
//$ok= "Fill out all the fields!";
header("Location: ../lessons/Algebra.php");

}




}

?>
