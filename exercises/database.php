<?php
//create connection credentials
$db_host= 'localhost';
$db_name= 'logintest';
$db_user= 'root';
$db_pass='';

//Create MySQLI oci_fetch_object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);


//Error Handler
if($mysqli->connect_error){
  printf("Connect failed:  %s\n", $mysqli->connect_error);
  exit();
}


 ?>
