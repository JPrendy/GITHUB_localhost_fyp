<?php
    include 'header.php';
?>

<div class="header"> 
	<h1>Register, login and logout user php mysql</h1>
</div>


<form action="includes/login.inc.php" method="POST">
<input type="text" name="uid" placeholder="Username">
<input type="password" name="pwd" placeholder="Password">
<button type="submit" name="login_button"> Login </button>

</form>

<?php 
    if (isset($_SESSION['id'])){
		echo $_SESSION['id'];
		
	}
	else {
		echo "You are not logged in!";
	}

?>
<br>
</br>

       <form action="includes/signup.inc.php" method="POST">
	     <input type="text" name="first" placeholder="Firstname">
		 <input type="text" name="last" placeholder="Lastname">
		 <input type="text" name="uid" placeholder="Username">
		 <input type="password" name="pwd" placeholder="Password">
		 <button type="submit"  name="register_btn"> SIGN UP </button>
		 </form>
		 
		 
		 <br></br>
		 <form action="includes/logout.inc.php">
		 <button>LOG OUT</button>
		 </form>
		 
		 
		 
</body>
</html>