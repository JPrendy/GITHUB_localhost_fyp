
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
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
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

     <li class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#">  <?php   session_start(); echo $_SESSION['userid'],"'s account"; ?>
       <span class="caret"></span></a>
       <ul class="dropdown-menu">
         <li><a href="settings.php" class="btn btn-info btn-md">
          <span class="glyphicon glyphicon-cog"></span> Settings
        </a></li>

          <li class="divider"></li>
         <li><a href="#"><form action='includes/logout.inc.php'>
     		 <button class='btn btn-success btn-md'>LOG OUT</button>
     		 </form></a></li>
       </ul>

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
      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="200" >

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




        <li class="active"><a href="lessons.php">Lessons</a></li>
        <?php     if($_SESSION['welcome'] != 2){?>
          <li><a href="#"  id="myFunction">Exercises</a></li>

         <?php } else { ?>
        <li><a href="exercises.php">Exercises</a></li>

           <?php } ?>
        <!--added a javascript function to the hyperlink-->
        <!-- the older version  <li><a href="#" onclick="myFunction()" >Charts</a></li> -->
      <?php     if($_SESSION['welcome'] != 2){?>
        <li><a href="#"  id="myFunction2">Charts</a></li>

       <?php } else { ?>
            <li><a href="piechart_test.php">Charts</a></li>

         <?php } ?>

         <?php     if($_SESSION['welcome'] != 2){?>
           <li><a href="#"  id="myFunction3">Change Icon</a></li>

          <?php } else { ?>
            		<li><a href="change_icon.php">Change Icon</a></li>

            <?php } ?>
            <?php     if($_SESSION['welcome'] != 2){?>

			<li><a href="#" id="myFunction4">Change settings</a></li>
      <?php } else { ?>

      <li><a href="settings.php">Change settings</a></li>

    <?php } ?>
      </ul>
    </nav>

    <div class="col-sm-9 text-left">
      <h1>Welcome</h1>

      <?php


      if($_SESSION['welcome'] != 2){?>
      <div class="alert alert-danger alert-dismissable">
   <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
   <strong>Welcome!</strong> This is the first time you are using the e-learning application, please click on the lessons heading.
 </div>
 <?php } ?>




<div id="myAlert" class="alert alert-warning collapse alert-dismissable">
<a href="#" id="linkClose" class="close"  aria-label="close">×</a> <!--important to remove the data-dismiss alert-->
<strong>Warning!</strong> You are only allowed to go to the lessons headings.
</div>

      <?php

      //session_start();
      if($_SESSION['welcome'] != 2){

        echo "Welcome first user";

      }
      else{
        //echo $_SESSION['test'];
        echo "welcome back ".$_SESSION['userid'];
    }

      ?>
      <p>Welcom to my e-learning application. The concept behind my application is to help how you acquire and learn new knowledge. I hope that by using this Web Application you will notice will improvement on your knowledge on the topics I touch on im my application  </p>
      <hr>
      <h3>Test</h3>

    </div>

    </div>
  </div>
</div>

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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
