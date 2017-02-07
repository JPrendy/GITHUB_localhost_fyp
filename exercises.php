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
  <!--<div class="row content">

    <div class="col-sm-2 sidenav" >
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
	  <div class="well">
        <p>ADS</p>
		</div>
      <p><a href="#">Link</a></p>
    </div>-->


	  <div class="row content">


    <nav class="col-sm-3">
      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="200" >
           <li class="active"><a href="#section0">Last topic done</a></li>
           <p>
             <p>
        <li class="active"><a href="lessons.php">Lessons</a></li>
        <li><a href="exercises.php">Exercises</a></li>
        <!--added a javascript function to the hyperlink-->
        <!-- the older version  <li><a href="#" onclick="myFunction()" >Charts</a></li> -->
        <li><a href="#"  id="myFunction" >Charts</a></li>
		<li><a href="#section4">Change Icon</a></li>
			<li><a href="settings.php">Change settings</a></li>
      </ul>
    </nav>

    <div class="col-sm-9 text-left">
      <h1>Exercises</h1>





    <!-- <div class="container"> -->
      <div class="row">
          <div class="col-sm-4">
        <h2>Panel Group</h2>
        <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">Panel Header</div>
            <!--make a test scenario where the user has to done the lesson before they are able to do this topic-->
            <div class="panel-body"><a href="exercises/question.php?n=1&m=Trignometry">Trignometry Quiz </a></div>

          </div>
          </div>
          </div>
           <div class="col-sm-4">
             <h2>Panel Group</h2>
             <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>
             <div class="panel-group">
               <div class="panel panel-default">
           <div class="panel-heading">Panel Header</div>
            <div class="panel-body"><a href="exercises/question.php?n=1&m=Algebra">Algebra Quiz</a></div>
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
