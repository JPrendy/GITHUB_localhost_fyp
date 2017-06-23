<?php
//create connection credentials
$db_host= 'localhost';
$db_name= 'logintest';
$db_user= 'root';
$db_pass='';

//Create MySQLI oci_fetch_object
$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


//Error Handler
if($db->connect_error){
  printf("Connect failed:  %s\n", $db->connect_error);
  exit();
}


 ?>
