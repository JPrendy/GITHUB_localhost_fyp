<?php
    include 'header.php';
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="header">
	<h1>E-Learning Application</h1>
</div>


<!--<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>-->



<?php
    if (isset($_SESSION['id'])){
		echo $_SESSION['id'];

	}
	else {
		echo "You are not logged in!";
		echo "<br>";
	}



	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=empty') !== false){
	$ok= "Fill out all the fields!";
	echo $ok;

}
if
(strpos($url, 'error=wrong_password') !== false){
	echo "Your passwords must be the same";
}

?>


<div class="container">
       <form class="form-horizontal" action="includes/signup.inc.php" method="POST" >

		  <div class="form-group">
      <label class="control-label col-sm-2" for="text">Name:</label>

      <div class="col-sm-3">
        <input type="text" class="form-control" name="first" id="first" placeholder="Name">
      </div>
    </div>
	<br>

	      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="uid" id="uid" placeholder="Username">
      </div>
    </div>
    <br>




	     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control" name="last" id="last" placeholder="Email">
      </div>
    </div>
	<br>


	 <div class="form-group">
      <label class="control-label col-sm-2" for="email">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password">
		</div>

		<!-- <button class="control-label"  type="button" id="eye"> -->
		   <button type="button" id="eye">
           <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye" />
         </button>


    </div>
	<br>

	 <div class="form-group">
      <label class="control-label col-sm-2" for="email">Reconfirm Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Reconfirm Password">
      </div>


		 <button type="button" id="eye2">
    <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye2" />
</button>
		<!-- <button type="submit" class="btn btn-primary btn-xs" name="register_btn"> SIGN UP </button>-->


		 </div>
          <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
		    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
		  <button type="submit" class="btn btn-primary btn-s" name="register_btn"> SIGN UP </button>
    </div>
</div>
	</form>


	<br>
	<br>









		 <footer class="container-fluid text-center" id="foot01"></footer>

</footer>

		   <!--this is used to make the calculator to work-->
    <script src="password.js"></script>
	<script src="year.js"></script> <!--this is an example of place where you can put the javascript file-->
</body>
</html>
