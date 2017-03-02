<?php

  session_start();


	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");
  $userid = $_SESSION['userid'];

	if (isset($_POST['submit'])){
		$friend = mysql_real_escape_string($_POST['friend']);
    $remove_friend = mysql_real_escape_string($_POST['remove_friend']);

	if (empty($friend or $remove_friend)){ //this is checking $username
		header("Location:charts.php?error=empty");
		exit();
	}
  include 'home_header.php';
  if($friend != 1){
        echo $friend;
        		$sql = "insert into add_friend(uid, asked, other_user, permission) VALUES ('$userid', 'Y', '$friend', 'N')";
	//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
		$result = mysqli_query($db, $sql);
}
if($remove_friend != 1){
      echo $remove_friend;
          $sql = "DELETE FROM add_friend
WHERE other_user='$remove_friend' AND uid='$userid'";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
  $result = mysqli_query($db, $sql);
}



}
?>
