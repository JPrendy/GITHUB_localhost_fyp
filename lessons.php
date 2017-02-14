<?php
session_start();

    include 'home_header.php';

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




    <div class="col-sm-9   text-centre">
      <h1>Lessons</h1>


    <?php   if($_SESSION['welcome'] != 2){?>
      <div class="alert alert-danger alert-dismissable">
   <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
   <strong>Welcome!</strong> Please click a maths lessons you would like to study
 </div>
 <?php } ?>


    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-sm-1">
        </div>
          <div class="col-sm-4">
        <h2>Trignomety Lesson</h2>
        <!--<p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>-->
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">Panel Header</div>
            <div class="panel-body"><a href="lessons/Trignometry.php">Trignometry </a></div>

          </div>
          </div>
          </div>
          <div class="col-sm-2">
          </div>
           <div class="col-sm-4">
             <h2>Algebra Lesson</h2>
             <!--<p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>-->
             <div class="panel-group">
               <div class="panel panel-default">
           <div class="panel-heading">Panel Header</div>
            <div class="panel-body"><a href="lessons/algebra.php">Algebra</a></div>
           </div>


        </div>
      </div>
      </div>
</div>
</div>
</div>




<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
