<?php
    include 'header.php';
?>

<div class="header"> 
	<h1>Register, login and logout user php mysql</h1>
</div>


<?php
	
	 session_start();
	
	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");
	
	if (isset($_POST['setting_button'])){
	
	
		$oldpassword = mysql_real_escape_string($_POST['pwd']);
		$newpassword = mysql_real_escape_string($_POST['pwd2']);
		
	    $user=$_SESSION['id'];
	
		
		$sql = "UPDATE users SET pwd='$password' where id= '$id'";
	
	
	?>
		</body>
</html>