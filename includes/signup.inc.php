
<?php

//include 'dbh.php';

//$first = $_POST['first'];
//$last = $_POST['last'];
//$uid = $_POST['uid'];
//$pwd = $_POST['pwd'];




//$sql = "INSERT INTO users(first, last, pwd, uid) VALUES ('$first, '$last','$pwd', '$uid')";


//$result = mysqli_query($conn, $sql);

//header("Location: index.php");

?>

<?php

  session_start();

	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");

	if (isset($_POST['register_btn'])){
		$username = mysql_real_escape_string($_POST['first']);
		$email = mysql_real_escape_string($_POST['last']);
		$uid = mysql_real_escape_string($_POST['uid']);
		$password = mysql_real_escape_string($_POST['pwd']);
	    $password2 = mysql_real_escape_string($_POST['pwd2']);

      $theme = "Light";

#change all these back to index
	if (empty($username)){ //this is checking $username
		header("Location: ../index.php?error=empty");
		exit();
	}
	if (empty($email)){

		header("Location: ../index.php?error=empty");
		exit();

	}if (empty($uid)){

		header("Location: ../index.php?error=empty");
		exit();

	}
	 if (empty($password)){

		header("Location: ../index.php?error=empty");
		exit();

	}

	if ($password !== $password2){

		header("Location: ../index.php?error=wrong_password");
		exit();

	}
	else{
		$sql = "SELECT uid from users where uid='$uid'";
		$result = mysqli_query($db, $sql);
		$uidcheck = mysqli_num_rows($result);
    $difficulty_level = 1;
		if($uidcheck > 0){
			header("Location: ../signup.php?error=username");
			exit();
		}else {
			//$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
			//$password = md5($password); //hash password before storing for security purposes
			$sql = "insert into users(first, last, uid, pwd, difficulty_level) VALUES ('$username', '$email', '$uid', '$password', '$difficulty_level')";
      $sql2 = "insert into lessons(uid) VALUES ('$uid')";
      $sql3 = "insert into lessons_visited(uid, topic_visited) VALUES ('$uid', 0)";
      $sql4 = "insert into theme (uid, theme_col) VALUES ('$uid', '$theme')";
      //THIS IS USED TO SET THE DEFAULT INSERT INSERT SETTING FOR THE DYNAMIC_SETTINGS TABLE
        $sql5 = "insert into dynamic_settings (uid, text_hint, timer) VALUES ('$uid', 'text_hint_N', 'N')";
			mysqli_query($db, $sql);
      		mysqli_query($db, $sql2);
          	mysqli_query($db, $sql3);
            	mysqli_query($db, $sql4);
                  	mysqli_query($db, $sql5);
		    $_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;



			header("location:../index.php");



		}
	}
	//else{
		//	$password = md5($password); //hash password before storing for security purposes
			//$sql = "insert into users(first, last, uid, pwd) VALUES ('$username', '$email', '$uid', '$password')";
			//mysqli_query($db, $sql);
		    //$_SESSION['message'] = "You are now logged in";
			//$_SESSION['username'] = $username;
			//header("location:../index.php");

	//}
	}
?>
