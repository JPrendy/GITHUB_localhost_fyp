<?php

$db = mysqli_connect("localhost", "root","", "logintest");


if (!$db) {
	die("Connection failed: ". mysqli_connect_error());

}

?>
