<?php
session_start();

    include 'home_header.php';

?>


<div class="header">
	<h1>Settings</h1>
</div>



<div class="container-fluid text-center">
    <div class="row content">






    <div class="col-sm-9 text-centre">

     <form class="form-horizontal" method="POST"  >
           <div class="panel-heading"><h3><u>Change Password</u></h3></div>
           <br/>
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


    <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
  <button type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target="#myModal">CHANGE PASSWORD</button>
<!-- the data attribut "data-target points to #myModal"     -->



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!--This brings the  Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button> <!-- thiis will bring up a x button-->

        </div>
        <div class="modal-body">
          <p>Are you sure you want to change your password.</p>
        </div>
        <div class="modal-footer">
           <button type="submit" class="btn btn-primary btn-s" name="setting_button" id="btnupdate"> CHANGE PASSWORD </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">ClOSE</button>
        </div>
      </div>

    </div>
  </div>
</div>
	<!--	  <button type="submit" class="btn btn-primary btn-s" name="setting_button" id="btnupdate"> CHANGE PASSWORD </button> -->
    </div>

	</form>


<br>
<br>
  <hr>

<form class="form-horizontal"   action="theme.php" method="POST" >

    <div class="panel-heading"><h3><u>Change Theme</u></h3></div>
    <div class="form-group">
    <br/>
<label class="control-label col-sm-2" for="password">Change Theme:</label>
<div class="col-sm-3">

  <input type="radio" id="theme" name="theme" value="Light" <?php if ($_SESSION['theme'] == 'Light') echo "checked='checked'"; ?> >Light
    <input type="radio" id="theme" name="theme" value="Grey" <?php if ($_SESSION['theme'] == 'Grey') echo "checked='checked'"; ?> >Grey
  <input type="radio" id="theme" name="theme"  value="Dark"  <?php if ($_SESSION['theme'] == 'Dark') echo "checked='checked'"; ?> >Dark
</div>
</div>


<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
  <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
<button type="submit" class="btn btn-primary btn-s" name="theme_button" id="theme_button"> SAVE THEME</button>
</div>
</div>

</form>






<br>
<br>
  <hr>

  <form class="form"   method="POST" >

      <div class="panel-heading"><h3><u>Delete Last Exercise Record</u></h3></div>
        <div class="form-group">
      <br/>
  <label class="control-label col-sm-2" for="password">Delete Record:</label>
</div>


<div class="form-group">
<div class="col-sm-offset col-sm-8">
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal_delete_record">Delete</button>
</div>
</div>
</form>

<br>
<br>
<br>
<br>




<!--<form class="form-horizontal"   method="POST" >
<div class="form-group">
  <div class="panel-heading"><h3><u>Delete Last Record</u></h3></div>
  <br/>
  <label class="control-label col-sm-2" for="password">Delete last exercise record</label>
</div>
<form class="form-horizontal"    action="settings.php" method="POST">



<div class="col-sm-offset-2 col-sm-10">
<button type="button" class="btn btn-rimary btn-s" data-toggle="modal" data-target="#myModal_delete_record">Delete last Record</button>
</div>

</form>
</form>

</div>
</div-->


<!-- Modal -->
<div class="modal fade" id="myModal_delete_record" role="dialog">
  <div class="modal-dialog">

    <!--This brings the  Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> <!-- thiis will bring up a x button-->

      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete your last exercise record? This will change how the application works </p>
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary btn-s" name="btndelete_record" id="btndelete_record"> Delete Last Exercise Record </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>









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
//this COULD BE SOMETHING TO LOOK BACK
//      IT BRINGS THE LOCATION TO INDEX
        //  header("Location: ../index.php?error=real test");


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
            echo "<br></br>";
            echo "Record Updated successfully";
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







<!--//////////////////////////////////////////////////////////-->
<!--THIS PART HANDLES THE DELETING OF THE LAST SCORE RECORD OF THE CURRENT USER
USING MYSQL -->

<?php
$db = mysqli_connect("localhost", "root", "" , "logintest");

//NOW HERE IS WHERE WE IMPLEMENTED THE BUTTON FOR THEME
if (isset($_POST['btndelete_record'])){


//IF NEED HELP LOOK AT THIS LINK http://www.w3schools.com/php/php_mysql_delete.asp
$sql4 = "DELETE FROM quiz_scores WHERE uid='{$_SESSION['userid']}' ORDER BY sc_time DESC LIMIT 1";



if (mysqli_query($db, $sql4)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($d);
}

mysqli_close($db);
      }

?>






</body>
</html>
