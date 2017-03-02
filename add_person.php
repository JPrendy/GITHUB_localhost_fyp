<?php

  session_start();


	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");
  $userid = $_SESSION['userid'];

	if (isset($_POST['submit'])){
		$friend = mysql_real_escape_string($_POST['friend']);
    $remove_friend = mysql_real_escape_string($_POST['remove_friend']);
      $permission = mysql_real_escape_string($_POST['permission']);

	if (empty($friend or $remove_friend)){ //this is checking $username
		header("Location:settings.php?error=empty");
		exit();
	}
  //include 'home_header.php';
  if($permission == "N"){
  if($friend != 1){


    $sql2= "SELECT * from add_friend where uid='{$_SESSION['userid']}' and other_user = '$friend' ";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result2 = mysqli_query($db, $sql2);


		if (!$row3 = mysqli_fetch_assoc($result2)){

		}

			$check_asked = $row3['asked'];
echo $check_asked;



if($check_asked != "Y"){

        echo $friend;
        		$sql = "insert into add_friend(uid, asked, other_user, permission) VALUES ('$userid', 'Y', '$friend', 'N')";
	//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
		$result = mysqli_query($db, $sql);
       header("Location:find.php?error=first_inserted");
}
else {

   header("Location:find.php?error=already_inserted");

}

}
if($remove_friend != 1){
      echo $remove_friend;
          $sql = "DELETE FROM add_friend
WHERE other_user='$remove_friend' AND uid='$userid'";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
  $result = mysqli_query($db, $sql);
    header("Location:find.php?error=deleted");

}
}

}

if (isset($_POST['add_invite'])){
$permission = mysql_real_escape_string($_POST['permission']);
		$friend = mysql_real_escape_string($_POST['friend']);
if($permission == "Y")
{
    $sql = "update add_friend set permission='Y' where uid ='$friend' and other_user = '$userid'";
    $result = mysqli_query($db, $sql);
  //  header("Location:settings.php?error=updated");
    header("Location:settings.php?error=updated");
}
}




	if (isset($_POST['remove'])){
   		$remove = mysql_real_escape_string($_POST['remove1']);
      echo $remove;
      $sql = "DELETE FROM add_friend
WHERE other_user='$remove' AND uid='$userid'";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result = mysqli_query($db, $sql);
 header("Location: home.php?error=removeuser");

}

if (isset($_POST['remove_check'])){
    $remove = mysql_real_escape_string($_POST['remove1']);
    echo $remove;
    $sql = "DELETE FROM add_friend
WHERE uid='$remove' AND other_user='$userid'";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result = mysqli_query($db, $sql);
echo $sql;
header("Location: settings.php?error=deleted");
//header("Location: home.php");

}


?>
