
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
		
	if (empty($username)){ //this is checking $username
		header("Location: ../index.php?error=empty");
		exit();
	}
	if (empty($email)){
		
		header("Location: ../signup.php?error=empty");
		exit();
		
	}if (empty($uid)){
		
		header("Location: ../signup.php?error=empty");
		exit();
		
	}
	 if (empty($password)){
		
		header("Location: ../signup.php?error=empty");
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
		if($uidcheck > 0){
			header("Location: ../signup.php?error=username");
			exit();
		}else {
			//$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
			//$password = md5($password); //hash password before storing for security purposes
			$sql = "insert into users(first, last, uid, pwd) VALUES ('$username', '$email', '$uid', '$password')";
			mysqli_query($db, $sql);
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