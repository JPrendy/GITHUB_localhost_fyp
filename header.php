<?php
    session_start();

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Register, login and logout user php mysql</title>
	<link rel="stylesheet" typr="text/css" href="style.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>




<header>

<nav>
  <ul>

      <!-- <button class="btn btn-success btn-s"> <a href="login_page.php"> LOGIN </a></button>-->

      <!--<li><a href="login_page.php"> Login page </a></li>-->
     <!--<li><a href="index.php"> HOME </a></li>--> <!--this is not needed as we are making a neater desing-->
	 <?php
	   if (isset($_SESSION['id'])){
		echo "<form action='includes/logout.inc.php'>
		 <button class='btn btn-success btn-s'>LOG OUT</button>
		 </form>";

	}
 else{
      echo "<button class='btn btn-success btn-s'> <a href='login_page.php'> LOGIN </a></button>";
    }
	/*else {
		echo "<form action='includes/login.inc.php' method='POST'>
	      <input type='text' name='uid' placeholder='Username'>
		  <input type='password' name='pwd' placeholder='Password'>
		  <button type='submit' name='login_button'> Login </button>
		  </form>";
	}
	 */




	 ?>
	 <button class="btn btn-danger btn-s"> <a href="index.php"> SIGNUP </a> </button>
	 <!--<li><a href="index.php"> signup </a><li>-->
	 <!--OLD VERSION <li><a href="signup.php"> signup </a><li> -->
	 </ul>



</nav>
</header>
