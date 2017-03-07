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

      <?php
       $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          if (strpos($url, 'error=session') !== false){
            //$ok= "Fill out all the fields!";
          ?>
          <div class="alert alert-success alert-dismissable">
          <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Update</strong> You can now access the rest of the web application. Feel free to navigate around.
          </div>


    <?php      }?>


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
            <div class="panel-heading">Topic: <b>#</b></div>
            <div class="panel-heading">Topic: <b>#</b></div>
            <div class="panel-heading">Topic: <b>#</b></div>
            <div class="panel-heading">Topic: <b>#</b></div>

            <div class="panel-body"><button class='btn btn-warning btn-md'><a href="#">COMING SOON </a></button></div>

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
                 <div class="panel-heading">Topic: <b> Introduction to Algebra</b></div>
                 <div class="panel-heading">Topic: <b>Common Factors</b></div>
                 <div class="panel-heading">Topic: <b>Quadratic Factors</b></div>
                 <div class="panel-heading">Topic: <b> Multiply Binomials by Polynomals</b></div>

            <div class="panel-body"><button class='btn btn-default btn-md'><a href="lessons/algebra.php">Algebra</a></button></div>
           </div>


        </div>
      </div>
      </div>
</div>
</div>
</div>


<br>
<br>


<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>

</body>
</html>
