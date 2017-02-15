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



 #first{
   color: #000000;
    background-color: lightgrey;
   padding: 10px;
   display: none;
   border: 2px solid red;
   border-radius: 10px;
   margin-left:180px;
   margin-right:180px;
    }



    span:hover + #first {
        display: block;
    }

    .custom {
        width: 160px !important;
    }

    .btn-group{
      margin:5px;
    }

    h1{
      text-align:center;
    }

    .question{
      text-align: center;
             font-size: 115%;
    }


    .panel-group{
      text-align: center;
    }





  </style>
<?php  if(  $_SESSION['theme'] == 'Light'){
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
        <a class="navbar-brand" href="#">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">


          <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){
        echo  '<li class="active"><a href="../home.php">Home</a></li>';
        }
        else{
        echo '<li class="active"><a href="home.php">Home</a></li>';
      }
        ?>
              <li> <a  href="#"  class=" hidden-lg hidden-sm hidden-md">Lessons</a></li>
              <li> <a  href="#"  class=" hidden-lg hidden-sm hidden-md">Exercises</a></li>
                  <li> <a  href="#"  class=" hidden-lg hidden-sm hidden-md">Lessons</a></li>
                      <li> <a  href="#"  class=" hidden-lg hidden-sm hidden-md">Lessons</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

       <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">  <?php    echo $_SESSION['userid'],"'s account"; ?>







       <span class="caret"></span></a>
       <ul class="dropdown-menu">
         <?php
         $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){
         echo  '<li><a href="../settings.php" class="btn btn-info btn-md">
           <span class="glyphicon glyphicon-cog"></span> Settings
         </a></li>';
         }
         else{
         echo  '<li><a href="settings.php" class="btn btn-info btn-md">
           <span class="glyphicon glyphicon-cog"></span> Settings
         </a></li>';
       }
         ?>


          <li class="divider"></li>
          <?php
          $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){
          echo  '<li><a href="#"><form action="../includes/logout.inc.php">
         		 <button class="btn btn-success btn-md">LOG OUT</button>
         		 </form></a></li>';
          }
          else{
          echo   '<li><a href="#"><form action="includes/logout.inc.php">
         		 <button class="btn btn-success btn-md">LOG OUT</button>
         		 </form></a></li>';
        }
          ?>
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





    <li class="active hidden-xs"><a href="lessons.php">Lessons</a></li>




  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li><a href="#"  id="myFunction">Exercises</a></li>

     <?php } else { ?>
    <li class="hidden-xs"><a href="../exercises.php">Exercises</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li><a href="#"  id="myFunction">Exercises</a></li>

      <?php } else { ?>
     <li class="hidden-xs"><a href="exercises.php">Exercises</a></li>
        <?php } ?>
  <?php } ?>


  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li><a href="#"  id="myFunction2">Charts</a></li>

     <?php } else { ?>
    <li class="hidden-xs"><a href="../select_result.php">Charts</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li><a href="#"  id="myFunction2">Charts</a></li>

      <?php } else { ?>
     <li class="hidden-xs"><a href="select_result.php">Charts</a></li>
        <?php } ?>
  <?php } ?>



  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li><a href="#"  id="myFunction3">Change Icons</a></li>

     <?php } else { ?>
    <li class="hidden-xs"><a href="../change_icon.php">Change Icons</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li><a href="#"  id="myFunction3">Change Icons</a></li>

      <?php } else { ?>
     <li class="hidden-xs"><a href="change_icon.php">Change Icons</a></li>
        <?php } ?>
  <?php } ?>


  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li><a href="#"  id="myFunction4">Settings</a></li>

     <?php } else { ?>
    <li class="hidden-xs"><a href="../settings.php">Settings</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li><a href="#"  id="myFunction4">Settings</a></li>

      <?php } else { ?>
     <li class="hidden-xs"><a href="settings.php">Settings</a></li>
        <?php } ?>
  <?php } ?>


  </ul>
</nav>
