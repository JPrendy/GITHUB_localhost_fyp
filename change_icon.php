<?php
session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include 'home_header.php';
  }
  else {
      include 'home_header_dark.php';
  }
  ?>

<div class="container-fluid text-center">
    <div class="row content">
  <!--<div class="row content">

    <div class="col-sm-2 sidenav" >
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
	  <div class="well">
        <p>ADS</p>
		</div>
      <p><a href="#">Link</a></p>
    </div>-->







    <div class="col-sm-9 text-left">
      <h1>Change Icons</h1>





    <!-- <div class="container"> -->
      <div class="row">
          <div class="col-sm-4">
        <h2>Panel Group</h2>
        <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">Panel Header</div>
            <!--make a test scenario where the user has to done the lesson before they are able to do this topic-->
            <div class="panel-body"><a href="#">First Icon </a></div>

          </div>
          </div>
          </div>
           <div class="col-sm-4">
             <h2>Panel Group</h2>
             <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>
             <div class="panel-group">
               <div class="panel panel-default">
           <div class="panel-heading">Panel Header</div>
            <div class="panel-body"><a href="lessons/algebra.php">Second Icon</a></div>
           </div>


        </div>
      </div>
      </div>





<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
