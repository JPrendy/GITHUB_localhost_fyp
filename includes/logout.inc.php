<?php

  session_start();

  include 'dbh.php';

  #$db = mysqli_connect("localhost", "root", "" , "logintest");
  $userid =  $_SESSION['userid'];
  $sql ="UPDATE users SET session = 2 WHERE uid= '$userid'";
  $result = mysqli_query($db, $sql);
  session_destroy();

  header("Location: ../login_page.php");

?>
