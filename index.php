<?php
    include 'header.php';
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="header"> 
	<h1>Register, login and logout user php mysql</h1>
</div>


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

<?php
// define variables and set to empty values
$nameErr = "";
$first =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first"])) {
    $nameErr = "Name is required";
  } else {
    $first = test_input($_POST["first"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

       <form class="form-horizontal" action="includes/signup.inc.php" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	      
		  <div class="form-group">
      <label class="control-label col-sm-2" for="text">Name:</label>
	  <span class="error">* <?php echo $nameErr;?></span>
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
		 
		 
		    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
		  <button type="submit" class="btn btn-primary btn-s" name="register_btn"> SIGN UP </button>
		
	</form>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	  
		
<!-- get rid of this and put it in the header

		
		 <br></br>
		 <form action="includes/logout.inc.php">
		 <button>LOG OUT</button>
		 </form>
		 
		 
		 -->
		 
		 <footer class="container-fluid text-center" id="foot01"></footer>
  
</footer>
		 
		   <!--this is used to make the calculator to work-->
    <script src="password.js"></script> 
	<script src="year.js"></script> <!--this is an example of place where you can put the javascript file-->
</body>
</html>