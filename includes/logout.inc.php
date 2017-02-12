<?php

  session_start();

  $db = mysqli_connect("localhost", "root", "" , "logintest");
  $sql ="UPDATE users SET session= 2 WHERE id={$_SESSION['id']}";
  $result = mysqli_query($db, $sql);
  session_destroy();

  header("Location: ../index.php");

?>
