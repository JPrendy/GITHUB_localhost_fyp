
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script   src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
      <script>
      // create angular app
    var validationApp = angular.module('validationApp', []);

    // create angular controller
    validationApp.controller('mainController', function($scope) {

        // function to submit the form after all validation has occurred
        $scope.submitForm = function() {

            // check to make sure the form is completely valid
            if ($scope.userForm.$valid) {

            }

        };

    });
    </script>
      <?php
          include 'header.php';
      ?>

      <center><font color=red><h3>Notice: this website is under testing don't put private information in the sign up page such as usernames and passwords</h3></font></center>

<div class="header">
	<center><h1>E-Learning Application</h1></center>
</div>





<div ng-app="validationApp" ng-controller="mainController">
  <div class="container-fluid text-center">
    <div class="row content">

    <div class="col-sm-4 col-sm-offset-4 text-centre">
      <?php
          if (isset($_SESSION['id'])){
      		echo $_SESSION['id'];

      	}
      	else {
      		//echo "You are not logged in!";
      		echo "<br>";
      	}



      	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      if (strpos($url, 'error=empty') !== false){
      	//$ok= "Fill out all the fields!";
      ?>
      <div class="alert alert-danger alert-dismissable">
      <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
      <strong>Please,</strong> Fill out all the fields.
      </div>
      <?php

      }
      if
      (strpos($url, 'error=wrong_password') !== false){
      //	echo "Your passwords must be the same";?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> Your passwords must be the same.
        </div>
     <?php
      }
      if
      (strpos($url, 'error=username') !== false){
      //	echo "Your passwords must be the same";?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> The username you picked has already been taken.
        </div>
     <?php
      }
      if
      (strpos($url, 'error=passwordlength') !== false){
      //	echo "Your passwords must be the same";?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> The username you inserted does not meet the signup criteria.
        </div>
     <?php
      }
      if
      (strpos($url, 'error=passwordfail') !== false){
      //	echo "Your passwords must be the same";?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> The password you inserted does not meet the signup criteria.
        </div>
     <?php
      }

      ?>
</div>
  <div class="col-sm-12 text-centre">
       <form class="form-horizontal" action="includes/signup.inc.php" method="POST"  name="userForm" ng-submit="submitForm()"  >

		  <div class="form-group">
      <label class="control-label  col-sm-offset-2  col-sm-2" for="text">Name:</label>

      <div class="col-sm-3">
        <input type="text" class="form-control" name="first" id="first" placeholder="Name">
      </div>
    </div>
	<br>



	      <div class="form-group"  ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.uid.$pristine }">
      <label class="control-label  col-sm-offset-2  col-sm-2" for="email">Username:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="uid" id="uid" placeholder="Username" ng-model="user.uid" ng-minlength="4" ng-maxlength="9">
      </div>
        <div class="col-sm-2">
      <span ng-show="userForm.uid.$error.minlength">Username is too short.</span>
      <span ng-show="userForm.uid.$error.maxlength">Username is too long.</span>
    </div>
    </div>
    <br>




	     <div class="form-group">
      <label class="control-label  col-sm-offset-2  col-sm-2" for="email">Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control" name="last" id="last" placeholder="Email">
      </div>
    </div>
	<br>


	 <div class="form-group" ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.pwd.$pristine }">
      <label class="control-label  col-sm-offset-2  col-sm-2" for="email">Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password"  ng-model="user.pwd" ng-minlength="4" ng-maxlength="12">

  	</div>


         <div class="col-sm-1">
       		 <label type="button" id="eye">
           <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye2" />
       </label>
       </div>
       <div class="col-sm-2">
     <span ng-show="userForm.pwd.$error.minlength">Password is too short.</span>
     <span ng-show="userForm.pwd.$error.maxlength">Password is too long.</span>
     </div>
    </div>
	<br>

	 <div class="form-group" ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.pwd2.$pristine }">
      <label class="control-label col-sm-offset-2 col-sm-2" for="email">Reconfirm Password:</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="Reconfirm Password"  ng-model="user.pwd2" ng-minlength="4" ng-maxlength="12">
      </div>

  <div class="col-sm-1">
		 <label type="button" id="eye2">
    <img src="https://cdn0.iconfinder.com/data/icons/feather/96/eye-16.png" alt="eye2" />
</label>
</div>
<div class="col-sm-2">
<span ng-show="userForm.pwd2.$error.minlength">Password is too short.</span>
<span ng-show="userForm.pwd2.$error.maxlength">Password is too long.</span>
</div>
</div>
		<!-- <button type="submit" class="btn btn-primary btn-xs" name="register_btn"> SIGN UP </button>-->


		 </div>
          <div class="form-group">
           <div class="col-sm-offset-2 col-sm-6">
		    <button type="reset" class="btn btn-danger btn-s" name="register_btn"> RESET </button>
		  <button type="submit" class="btn btn-primary btn-s" name="register_btn"> SIGN UP </button>
    </div>
</div>
	</form>
</div>
</div>
</div>
</div>
	<br>
	<br>









		 <footer class="container-fluid text-center" id="foot01"></footer>

</footer>

		   <!--this is used to make the calculator to work-->
    <script src="password.js"></script>
	<script src="year.js"></script> <!--this is an example of place where you can put the javascript file-->
</body>
</html>
