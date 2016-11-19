<?php
    include 'header.php';
?>

<div class="header">
	<h1>Register, login and logout user php mysql</h1>
</div>





<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=empty') !== false){
	echo "Fill out all the fields!";
}
elseif
(strpos($url, 'error=username') !== false){
	echo "Username already exists";
}



    if (isset($_SESSION['id'])){
		echo $_SESSION['id'];

	}
	else {
		echo "You are not logged in!";
	}

?>
<br>
</br>
<?php
    if (isset($_SESSION['id'])){
		echo "you are already logged in";

	}
	else {

		echo "ok";

	}



?>
<br>
<br>
   <div class="container">
   	<form class="form-horizontal" action="includes/login.inc.php" method="POST">

		  <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="uid" id="uid" placeholder="Username">
      </div>
    </div>
	<br>

	      <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
      </div>
    </div>
    <br>

    <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
		  <button type="submit" class="btn btn-primary btn-s" name="login_button"> Login </button>
    </div>
  </div>
	</form>
</div>





</body>
</html>
