
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    button{
        color: white;
    }

    li{
      color:white;
    }

    a:link {
      color: black;
       text-decoration: none;
   }

 #length{
   padding: 3px;
 }

   a {
     color: black;
      text-decoration: none;
  }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    body{
    font-family: 'Roboto Slab', serif;
}
    li.panel {
      margin-bottom: 5px;
    /*  background-color: #428bca; */

    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: black;
      color: white;
      padding: 15px;
          margin-top: 10px;
    }

    h1{
      text-align:center;
    }

    h2{
      text-align:center;
    }

    h4{
      text-align:center;
    }

    h5{
      text-align:center;
    }




    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }




  </style>


  <?php
  session_start();
    if(  $_SESSION['theme'] == 'Light'){
      ?><style>

      body{
          background-color: #;
      }
     </style><?php
   }
   if(  $_SESSION['theme'] == 'Grey'){
   ?> <style>  body{
         background-color: #D3D3D3;
     }</style><?php
   }
   if(  $_SESSION['theme'] == 'Dark'){
   ?> <style>  body{
         background-color: #898989;
     }</style><?php
   }
   if(  $_SESSION['theme'] == 'Glow'){
     ?><style>

     body{
         background-color:    #f7eef7;
     }
    </style><?php
  }

if($_SESSION['userid'] ==null){
    header("Location: index.php");
}

      ?>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active" <a href="home.php"><span class="glyphicon glyphicon-home  "></span>  e-learning</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="home.php">Home</a></li>-->
            <li> <a  href="lessons.php"  class=" hidden-lg hidden-sm hidden-md">Lessons</a></li>
            <li> <a  href="exercises.php"  class=" hidden-lg hidden-sm hidden-md">Exercises</a></li>

                    <li> <a  href="select_result.php"  class=" hidden-lg hidden-sm hidden-md">Results</a></li>
                      <li> <a  href="charts.php"  class=" hidden-lg hidden-sm hidden-md">Charts</a></li>
                          <li> <a  href="change_icon.php"  class=" hidden-lg hidden-sm hidden-md">Change Icon</a></li>
                        <li> <a  href="settings.php"  class=" hidden-lg hidden-sm hidden-md">Settings</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

<?php
$icon = $_SESSION['icon'];
if($icon == 1){?>
 <li><img src="images/test.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>
<?php } if($icon == 2) { ?>

  <li>    <img src="images/background2.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

  <?php } if($icon == 3) { ?>

    <li>    <img src="images/background3.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

    <?php } if($icon == 4) { ?>

      <li>    <img src="images/background4.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

      <?php } ?>


     <li class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#">     <?php  echo $_SESSION['userid'],"'s account"; ?>
       <span class="caret"></span></a>
       <ul class="dropdown-menu">
         <li><a href="settings.php"
          <span class="glyphicon glyphicon-cog"></span> Settings
        </a></li>

          <li class="divider"></li>
         <li><a href="#"><form action='includes/logout.inc.php'>
     		 <button class='btn btn-success btn-md'>LOG OUT</button>
     		 </form></a></li>
       </ul>
</li>
    </div>
  </div>
</nav>

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
      <ul class="nav nav-pills nav-stacked"  data-offset-top="300" >

        <?php
           $ok = $_SESSION['lesson'];
          // echo $ok;
           $one = "lessons/$ok.php";
           //echo $one;
         ?>
         <?php  if($_SESSION['lesson'] != ''){?>


              <li class="active"><?php echo "<a href=$one>Last topic visited: $ok</a>"; ?></li>
           <p>
             <p>
 <?php } ?>




        <li class=" panel hidden-xs active"><a href="lessons.php">Lessons</a></li>
        <?php     if($_SESSION['welcome'] != 2){?>
          <li class="panel hidden-xs active"><a href="#"  id="myFunction">Exercises</a></li>

         <?php } else { ?>
        <li class="panel hidden-xs active"><a href="exercises.php">Exercises</a></li>

           <?php } ?>
        <!--added a javascript function to the hyperlink-->
        <!-- the older version  <li><a href="#" onclick="myFunction()" >Charts</a></li> -->
      <?php     if($_SESSION['welcome'] != 2){?>
        <li  class="panel hidden-xs  active"><a href="#"  id="myFunction2">Results</a></li>

       <?php } else { ?>
            <!--<li><a href="piechart_test.php">Charts</a></li>-->
            <li  class="panel hidden-xs  active"><a href="select_result.php">Results</a></li>


         <?php } ?>


         <?php     if($_SESSION['welcome'] != 2){?>
           <li  class="panel hidden-xs  active"><a href="#"  id="myFunction2">Charts</a></li>

          <?php } else { ?>
               <!--<li><a href="piechart_test.php">Charts</a></li>-->
               <li  class="panel hidden-xs  active"><a href="charts.php">Charts</a></li>


            <?php } ?>



         <?php     if($_SESSION['welcome'] != 2){?>
           <li class="panel hidden-xs  active"><a href="#"  id="myFunction3">Change Icon</a></li>

          <?php } else { ?>
            		<li class="panel hidden-xs  active"><a href="change_icon.php">Change Icon</a></li>

            <?php } ?>
            <?php     if($_SESSION['welcome'] != 2){?>

			<li class="panel hidden-xs  active"><a href="#" id="myFunction4">Settings</a></li>
      <?php } else { ?>

      <li class="panel hidden-xs  active"><a href="settings.php">Settings</a></li>

    <?php } ?>
      </ul>
    </nav>

    <div class="col-sm-9 text-left">
      <h1>e-learning</h1>

      <?php


      if($_SESSION['welcome'] != 2){?>
      <div class="alert alert-danger alert-dismissable">
   <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
   <strong>Welcome!</strong> This is the first time you are using my e-learning application, please click on the lessons heading to continue.
 </div>
 <?php } ?>




<div id="myAlert" class="alert alert-warning collapse alert-dismissable">
<a href="#" id="linkClose" class="close"  aria-label="close">×</a> <!--important to remove the data-dismiss alert-->
<strong>Warning!</strong> You are only allowed to go to the lessons heading during the tutorial period.
</div>

      <?php

      //session_start();
      if($_SESSION['welcome'] != 2){

        echo "Welcome to my e-learning application user ";  ?> <b><?php echo $_SESSION['userid']; ?></b>

      <?php }
      else{
        //echo $_SESSION['test'];
        echo "Welcome back "; ?> <b><?php echo $_SESSION['userid']; ?></b>
  <?php  } ?>

<?php
     echo "<br>";
      echo "Your current difficulty level is ";?><b><?php echo $_SESSION['difficulty_level']; ?></b><?php
      echo "<br>";
        $english_format_number = number_format($_SESSION['average_score'], 2, '.', '');
            echo "Your current average score is ";?><b><?php echo $english_format_number; ?></b><?php
      echo "<br>";
          echo "<br>";
      ?>

      <p>Welcome to my e-learning application. The concept behind my application is to help how you acquire and learn new knowledge. I hope that by using this Web Application you will notice an improvement on your knowledge on the math topics I cover in my application. Please look at the <b>lessons</b>
         tab and the feedback provided after each exercise to see where you could improve.  </p>

      <hr>

      <?php  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      if (strpos($url, 'error=removeuser') !== false){
        //$ok= "Fill out all the fields!";
      ?>


      <div class="alert alert-danger alert-dismissable">
      <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
      <strong>Notice!</strong> The user has been removed.
      </div>
      <?php

    } ?>


      <?php  include 'show_friend.php'; ?>


          <div class="form-group col-sm-12">
      <h3>Test</h3>
      <p>Furthmore, there are sections in the e-learning application that allows you to monitor your past results making it easy to see where you could improve. </p>

</div>









  <div class="form-group col-sm-12">
      <div class="bs-example">
          <div id="myCarousel" class="carousel slide"  style="width: 400px;  margin: 0 auto" data-ride="carousel">
              <!-- Carousel indicators -->
              <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for carousel items -->
              <div class="carousel-inner">
                  <div class="item active">

                      <img src="images/add_a_friend_6.png" alt="First Slide">
                      <div class="carousel-caption">
                        <h4 > Add a Friend </h4>
                        <p id=carousel>You can add a friend by adding them in the settings section.</p>
    </div>


                  </div>
                  <div class="item">
                    <!--<h2>...</h2>
                    <p>10000000000000</p>-->
                      <img src="images/charts.png" alt="Second Slide">
                        <div class="carousel-caption">
                      <h3>Charts</h3>
                      <p>See your results displayed as charts in the Charts Section.</p>
                    </div>
                  </div>
                  <div class="item">
                      <img src="images/test.jpg" alt="Third Slide">
                        <div class="carousel-caption">
                      <h3>Chania</h3>
                      <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                    </div>
                  </div>
              </div>
              <!-- Carousel controls -->
              <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a class="carousel-control right" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
          </div>
      </div>
</div>



    </div>
    </div>
  </div>


<br>
<script>
//function myFunction() {
  //  alert("Hello! I am an alert box!");

//set an id so when this pressed changed a value id then implement a switch for that
//}

$(document).ready(function(){
  $('#myFunction').click(function(){
     $('#myAlert').show('fade');
  });


$('#linkClose').click(function (){
  $('#myAlert').hide('fade');
});
});




$(document).ready(function(){
  $('#myFunction2').click(function(){
     $('#myAlert').show('fade');
  });


$('#linkClose').click(function (){
});
$('#myAlert').hide('fade');
});


$(document).ready(function(){
  $('#myFunction3').click(function(){
     $('#myAlert').show('fade');
  });


$('#linkClose').click(function (){
});
$('#myAlert').hide('fade');
});








$(document).ready(function(){

  $('#myFunction4').click(function(){
     $('#myAlert').show('fade');
   });


$('#linkClose').click(function (){
});
$('#myAlert').hide('fade');
});

</script>


<footer class="container-fluid text-center " id="foot01">

</footer>
	<script src="year.js"></script>

</body>
</html>
