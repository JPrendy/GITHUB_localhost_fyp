<?php

  session_start();
	
	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");
	
	if (isset($_POST['login_button'])){
	
		$uid = mysql_real_escape_string($_POST['uid']);
		$password = mysql_real_escape_string($_POST['pwd']);
		
	
		$sql = "Select * from users WHERE uid='$uid'";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
		$hash_pwd = $row['pwd'];
		$hash = password_verify($password, $hash_pwd);
        
		//if ($hash == 0) {
		 //	header("Location: ../index.php?error=emptyhash");
		//exit();
			
		//}
         //else{
			 
			if (empty($uid && $password)){ //this is checking $username
		header("Location: ../index.php?error=empty");
		exit();
	    }
			
			
			
			
			//$password2 = md5($password); //hash password before storing for security purposes
			$sql = "Select * from users WHERE uid='$uid' AND pwd='$hash_pwd'";
			$result = mysqli_query($db, $sql);
		
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
			header("Location: ../home.php");
			
		}
		 // header("Location: ../index.php?error=correct");
		 //}
		// header("Location: ../home.php");
	}
?>