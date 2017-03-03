<?php
    include 'header.php';
?>

<div class="header">
	<h1>E-Learning Application</h1>
</div>




<div class="container-fluid text-center">
    <div class="row content">

    <div class="col-sm-4 col-sm-offset-4 text-centre">
<?php

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=empty2') !== false){
	//echo "Fill out all the fields!";
  ?>
  <div class="alert alert-danger alert-dismissable">
  <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Please,</strong> Fill out all the fields.
  </div>
  <?php
}
if (strpos($url, 'error=empty1') !== false){
	//echo "Fill out all the fields!";
  ?>
  <div class="alert alert-danger alert-dismissable">
  <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Warning!</strong> The username or password you picked does not exist.
  </div>
  <?php
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

		//echo "ok";

	}



?>
<br>
<br>
</div>
  <div class="col-sm-12 text-centre">

   	<form class="form-horizontal" action="includes/login.inc.php" method="POST">

		  <div class="form-group">
      <label class="control-label   col-sm-offset-2  col-sm-2" for="username">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="uid" id="uid" placeholder="Username">
      </div>
    </div>
	<br>

	      <div class="form-group">
      <label class="control-label   col-sm-offset-2  col-sm-2" for="password">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
      </div>
    </div>
    <br>

    <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
		  <button type="submit" class="btn btn-primary btn-s" name="login_button"> LOGIN </button>
    </div>
  </div>
	</form>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer class="container-fluid text-center" id="foot01"></footer>

</footer>



<script src="year.js"></script> <!--this is an example of place where you can put the javascript file-->


</body>
</html>
