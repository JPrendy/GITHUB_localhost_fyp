<?php



  session_start();

	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");

	if (isset($_POST['login_button'])){

		$uid = $_POST['uid'];
		$password = $_POST['pwd'];


		//$sql = "Select * from users WHERE uid='$uid'";
		//$result = mysqli_query($db, $sql);
		//$row = mysqli_fetch_assoc($result);
		//$hash_pwd = $row['pwd'];
		//$hash = password_verify($password, $hash_pwd);


	//	if ($db->query($sql2) === TRUE) {
      //      echo "Record deleted successfully";
//} else {
  //  echo "Error deleting record: " . $db->error;/
//}

		//if ($hash == 0) {
		 //	header("Location: ../index.php?error=emptyhash");
		//exit();

	//	}
         //else{

			if (empty($uid && $password)){ //this is checking $username
		//header("Location: ../index.php?error=empty");
		echo "$hash";
		//exit();
	    }




			//$password2 = md5($password); //hash password before storing for security purposes
			$sql = "Select * from users WHERE uid='$uid' AND pwd='$password'";
			$result = mysqli_query($db, $sql);
      $sql2 = "Select * from lessons WHERE uid='$uid'";
      $result2 = mysqli_query($db, $sql2);
      $sql3 = "Select * from theme WHERE uid='$uid'";
      $result3 = mysqli_query($db, $sql3);

		if (!$row = mysqli_fetch_assoc($result)){

		  echo "Your username or password is incorrect!";
          header("Location: ../index.php?error=real test");


		}
		//if (empty($uid && $hash_pwd)){ //this is checking $username
		//header("Location: ../index.php?error=empty");
		//exit();
	//}
		else{
			$_SESSION['id'] = $row['id'];
      	$_SESSION['userid'] = $row['uid'];
        $_SESSION['welcome'] = $row['session'];

      $row2 = mysqli_fetch_assoc($result2);

       $_SESSION['lesson'] = $row2['lesson_type'];


           $row3 = mysqli_fetch_assoc($result3);

           $_SESSION['difficulty_level'] = $row['difficulty_level'];

      $_SESSION['theme'] = $row3['theme_col'];
		//	$login = 1;
    //  $login2 += $login;

    //  $_SESSION['1'] = $login2;

    $_SESSION['test'] += 1;
      $login +=1;
    //	$sql = "insert into users(session) VALUES ( '$login')";
    if($row["session"] != 2){
      $sql ="UPDATE users SET session='$login' WHERE uid='$uid'";
      	$result = mysqli_query($db, $sql);
			header("Location: ../home.php");
    }
    else{
      	header("Location: ../home.php");
    }

		}
		 // header("Location: ../index.php?error=correct");
		 //}
		// header("Location: ../home.php");
	}
?>
