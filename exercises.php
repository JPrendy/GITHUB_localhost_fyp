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





    <div class="col-sm-9 text-centre">
      <h1>Exercises</h1>





    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-sm-1">
        </div>
          <div class="col-sm-4">
        <h2>Trignometry</h2>
    <!--    <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>-->
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">Panel Header</div>
            <!--make a test scenario where the user has to done the lesson before they are able to do this topic-->
            <div class="panel-body"><a href="exercises/question.php?n=1&m=Trignometry">Trignometry Quiz </a></div>

          </div>
          </div>
          </div>
            <div class="col-sm-2">
            </div>

           <div class="col-sm-4">
             <h2>Algebra</h2>
            <!-- <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>-->
             <div class="panel-group">
               <div class="panel panel-default">
           <div class="panel-heading">Text Hints: On</div>
            <div class="panel-heading">Difficulty Level:    <b><?php echo $_SESSION['difficulty_level']?></b></div>
                <div class="panel-heading">10 Questions</div>
            <div class="panel-body"><a href="exercises/question.php?n=1&m=Algebra">Algebra Quiz</a></div>
           </div>


        </div>
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
