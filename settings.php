<?php
    include 'header.php';
?>

<div class="header">
	<h1>Register, login and logout user php mysql</h1>
</div>

<?php
echo $_SESSION['id'];


?>
     <form class="form-horizontal" method="POST">
  <div class="form-group">
      <label class="control-label col-sm-2" for="password">Old Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Old Password">
      </div>
    </div>
    <br>


	      <div class="form-group">
      <label class="control-label col-sm-2" for="password">New Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="New Password">
      </div>
    </div>
    <br>

	   <div class="form-group">
      <label class="control-label col-sm-2" for="password">Reconfirm New Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd3" id="pwd3" placeholder="Reconfirm New Password">
      </div>
    </div>
    <br>

	    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
		  <button type="submit" class="btn btn-primary btn-s" name="setting_button"> CHANGE PASSWORD </button>
	</form>


	 <?php




	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");

	if (isset($_POST['setting_button'])){


		$pwd = mysql_real_escape_string($_POST['pwd']);
		$pwd2 = mysql_real_escape_string($_POST['pwd2']);
		$pwd3 = mysql_real_escape_string($_POST['pwd3']);

	//$sql = "Select * from users WHERE id='{$_SESSION['id']}'";
		//$result = mysqli_query($db, $sql);
		//$row = mysqli_fetch_assoc($result);
		//$hash_pwd = $row['pwd'];
		//$hash = password_verify($pwd, $hash_pwd);

		//if ($hash == 0) {
		 //	header("Location: ../index.php?error=emptyhash");
		//exit();

		//}
         //else{





			//$password2 = md5($password); //hash password before storing for security purposes
			$sql = "Select * from users WHERE id='{$_SESSION['id']}'  AND pwd='$pwd'";
			$result = mysqli_query($db, $sql);

		if (!$row = mysqli_fetch_assoc($result)){

		  echo "Your username or password is incorrect!";
          header("Location: ../index.php?error=real test");


		}
		//if (empty($uid && $hash_pwd)){ //this is checking $username
		//header("Location: ../index.php?error=empty");
		//exit();
	//}

	if ($pwd2 !== $pwd3){

		header("Location: settings.php?error=The new password is not the same");
		exit();

	}
		else{

		    $sql2 = "update users set pwd='$pwd2' where id='{$_SESSION['id']}'";
			echo "$sql2";

			if ($db->query($sql2) === TRUE) {
            echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}
		}
		 // header("Location: ../index.php?error=correct");
		 //}
		// header("Location: ../home.php");
	}


	 //session_start();

	//connect to databases
	/*$db = mysqli_connect("localhost", "root", "" , "logintest");

	if (isset($_POST['setting_button'])){


		$oldpassword = mysql_real_escape_string($_POST['pwd']);
		$newpassword = mysql_real_escape_string($_POST['pwd2']);
		$cpassword = mysql_real_escape_string($_POST['pwd3']);

	    $user=$_SESSION['id'];


		$sql = mysql_query("select pwd from users where id = '{$user}'") or die(mysql_error());
          echo "$sql"

        $data = mysql_fetch_row($sql);

		if($data[0]== $oldpassword)

			{
				if($newpassword == $cpassword)
				{
					$q = mysql_query("update users set pwd='{$newpassword}' where id='{$user}'") or die(mysql_error());

					if($q)
					{
						echo"<script>alert('Password changed')</script>";
					}

				}
				else{

					echo"<script>alert('old password and ne password do not match')</script>";
				}
			}
	    else
		{

					echo"<script>alert('old password and ne password do not match')</script>";
				}

	}
		*/

	?>

</body>
</html>
