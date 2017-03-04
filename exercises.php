<?php
session_start();

    include 'home_header.php';

    if( $_SESSION['text_hint'] == 'text_hint_N'){
       $text_hint= "Off";
    }
    if( $_SESSION['text_hint'] == 'text_hint_Y'){
       $text_hint = "On";
    }

    if( $_SESSION['more_answers'] == 'add_answers_N'){
       $answer= "Off";
    }
    if( $_SESSION['more_answers'] == 'add_answers_Y'){
       $answer = "On";
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





    <div class="col-sm-9 text-centre">
      <h1>Exercises</h1>

<?php      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if (strpos($url, 'error=session') !== false){
      //$ok= "Fill out all the fields!";
    ?>
    <div class="alert alert-success alert-dismissable">
    <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Update</strong> You can now access the rest of the web application. Feel free to navigate around.
    </div>
    <?php

    }
?>


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
            <div class="panel-body"><button class='btn btn-default btn-md'><a href="exercises/question.php?n=1&m=Trignometry">Trignometry Quiz </a></button></div>

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
           <div class="panel-heading">Text Hints: <b><?php echo $text_hint?></b></div>
           <div class="panel-heading">More Answer Choices: <b><?php echo $answer?></b></div>
            <div class="panel-heading">Difficulty Level:    <b><?php echo $_SESSION['difficulty_level']?></b></div>
                <div class="panel-heading">10 Questions</div>
            <div class="panel-body"><button class='btn btn-default btn-md'><a href="exercises/question.php?n=1&m=Algebra">Algebra Quiz</a></button></div>
           </div>


        </div>
      </div>
      </div>

    </div>
        </div>
            </div>
</div>
</div>




<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>

</body>
</html>
