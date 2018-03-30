<?php
    session_start();

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Final Year Project</title>
  <link rel="icon" href="images/e.png">

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  footer {
    background-color: black;
    color: white;
    margin-top: 10px;
    padding: 15px;
  }

  @media screen and (min-width: 1400px) {
    footer {
      background-color: black;
      color: white;
      margin-top: 200px;
      padding: 15px;

    }
  }

  @media screen and (min-width: 1400px) {
    footer {
      background-color: black;
      color: white;
      margin-top: 200px;
      padding: 15px;

    }
  }

  body{
  font-family: 'Roboto Slab', serif;
}

  button{
      color: white;
  }

  li{
    color:white;
  }

  a:link {
    color: white;
     text-decoration: none;
}

/* visited link */
a:visited {
    color: white;
    text-decoration: none!important;
}

a:hover, a:active {
   text-decoration: none!important;

}
  </style>
</head>
<body>




<header>


  <nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <a class="navbar-brand active" <a href="index.php"><span class="glyphicon glyphicon-home  "></span> e-learning</a>

      <!-- <button class="btn btn-success btn-s"> <a href="login_page.php"> LOGIN </a></button>-->

      <!--<li><a href="login_page.php"> Login page </a></li>-->
     <!--<li><a href="index.php"> HOME </a></li>--> <!--this is not needed as we are making a neater desing-->

         <ul class="nav navbar-nav navbar-right">
	 <?php
	   if (isset($_SESSION['id'])){
		echo "<form action='includes/logout.inc.php'>
		 <button class='btn btn-success btn-md'>LOG OUT</button>
		 </form>";

	}
 else{
      echo "<button class='btn btn-success btn-md'> <a href='login_page.php'> LOGIN </a></button>";
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
	 <button class="btn btn-danger btn-md"> <a href="index.php"> SIGNUP </a> </button>
	 <!--<li><a href="index.php"> signup </a><li>-->
	 <!--OLD VERSION <li><a href="signup.php"> signup </a><li> -->
	 </ul>



</nav>
</div>
</div>
</header>
