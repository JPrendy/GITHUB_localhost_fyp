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

    li.panel {
      margin-bottom: 5px;
    /*  background-color: #428bca; */

    }
    body{
    font-family: 'Roboto Slab', serif;
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
      background-color: black;
      color: white;
      margin-top: 10px;
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

    h4{
      text-align:center;
    }

    h5{
      text-align:center;
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

#left{
  text-align: left;
}

 #first{
   color: #000000;
    background-color: lightgrey;
   padding: 10px;
   display: none;
   border: 2px solid red;
   border-radius: 10px;
   /*margin-left:180px;
   margin-right:180px;*/
    }

    #length{
      padding: 3px;
    }

      a {
        color: black;
         text-decoration: none;
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

    h2{
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
<?php
if($_SESSION['userid'] ==null){
    header("Location: index.php");
}



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




          <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){
        echo  '<a class="navbar-brand active" <a href="../home.php">  <span class="glyphicon glyphicon-home  "></span>   e-learning</a>';
        }
        else{
        echo '<a class="navbar-brand active" <a href="home.php">  <span class="glyphicon glyphicon-home  "></span>   e-learning</a>';
      }
        ?>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">

              <?php   $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                 if (strpos($url, 'lessons/') !==false ||  strpos($url, 'exercises/') !== false){?>
          <li> <a  href="../lessons.php"  class=" hidden-lg hidden-sm hidden-md">Lessons</a></li>
              <li> <a  href="../exercises.php"  class=" hidden-lg hidden-sm hidden-md">Exercises</a></li>
              <li> <a  href="../select_result.php"  class=" hidden-lg hidden-sm hidden-md">Results</a></li>
                         <li> <a  href="../charts.php"  class=" hidden-lg hidden-sm hidden-md">Charts</a></li>
                             <li> <a  href="../change_icon.php"  class=" hidden-lg hidden-sm hidden-md">Change Icon</a></li>
                           <li> <a  href="../settings.php"  class=" hidden-lg hidden-sm hidden-md">Settings</a></li>

        <?php } else { ?>
          <li> <a  href="lessons.php"  class=" hidden-lg hidden-sm hidden-md">Lessons</a></li>

          <li> <a  href="exercises.php"  class=" hidden-lg hidden-sm hidden-md">Exercises</a></li>
         <li> <a  href="select_result.php"  class=" hidden-lg hidden-sm hidden-md">Results</a></li>
                    <li> <a  href="charts.php"  class=" hidden-lg hidden-sm hidden-md">Charts</a></li>
                        <li> <a  href="change_icon.php"  class=" hidden-lg hidden-sm hidden-md">Change Icon</a></li>
                      <li> <a  href="settings.php"  class=" hidden-lg hidden-sm hidden-md">Settings</a></li>
                          <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">

          <?php   $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
             if (strpos($url, 'lessons/') !==false ||  strpos($url, 'exercises/') !== false){?>
              <?php $icon = $_SESSION['icon'];
               if($icon == 1){?>
                <li><img src="../images/test.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>
               <?php } if($icon == 2) { ?>

                 <li>    <img src="../images/background2.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

                 <?php } if($icon == 3) { ?>

                   <li>    <img src="../images/background3.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

                   <?php } if($icon == 4) { ?>

                     <li>    <img src="../images/background4.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

                     <?php } ?>

    <?php } else { ?>

      <?php $icon = $_SESSION['icon'];
       if($icon == 1){?>
        <li><img src="images/test.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>
       <?php } if($icon == 2) { ?>

         <li>    <img src="images/background2.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

         <?php } if($icon == 3) { ?>

           <li>    <img src="images/background3.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

           <?php } if($icon == 4) { ?>

             <li>    <img src="images/background4.jpg" class="hidden-xs img-rounded" alt="Cinque Terre" width="50" height="50"> </li>

             <?php } ?>

                      <?php } ?>




       <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">  <?php    echo $_SESSION['userid'],"'s account"; ?>







       <span class="caret"></span></a>
       <ul class="dropdown-menu">
         <?php
         $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){
         echo  '<li><a href="../settings.php">
           <span class="glyphicon glyphicon-cog"></span> Settings
         </a></li>';
         }
         else{
         echo  '<li><a href="settings.php">
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
       $on =  "$ok.php";
       $one1 = "../$ok.php";
       //echo $one;
     ?>
     <?php  if($_SESSION['lesson'] != ''){

       $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

       if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){?>

              <li class="active"><?php echo "<a href=$on>Last topic visited: $ok</a>"; ?></li>
              <p>
                <p>
    <?php   }


       else{?>
                        <li class="active"><?php echo "<a href=$one>Last topic visited: $ok</a>"; ?></li>
                        <p>
                          <p>
    <?php }
       ?>



<?php } ?>



<?php
      $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
{?>

    <li class="panel hidden-xs  active"><a href="../lessons.php">Lessons</a></li>

<?php } else{?>
   <li class="panel hidden-xs  active"><a href="lessons.php">Lessons</a></li>

<?php }?>



  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li class="panel hidden-xs  active"><a href="#"  id="myFunction">Exercises</a></li>

     <?php } else { ?>
    <li class="panel hidden-xs  active"><a href="../exercises.php">Exercises</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li class="panel hidden-xs  active"><a href="#"  id="myFunction">Exercises</a></li>

      <?php } else { ?>
     <li class="panel hidden-xs  active"><a href="exercises.php">Exercises</a></li>
        <?php } ?>
  <?php } ?>


  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li class="panel hidden-xs  active"><a href="#"  id="myFunction2">Results</a></li>

     <?php } else { ?>
    <li class="panel hidden-xs  active"><a href="../select_result.php">Results</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li class="panel hidden-xs  active"><a href="#"  id="myFunction2">Results</a></li>

      <?php } else { ?>
     <li class="panel hidden-xs  active"><a href="select_result.php">Results</a></li>
        <?php } ?>
  <?php } ?>




  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li class="panel hidden-xs  active"><a href="#"  id="myFunction2">Charts</a></li>

     <?php } else { ?>
    <li class="panel hidden-xs  active"><a href="../charts.php">Charts</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li class="panel hidden-xs  active"><a href="#"  id="myFunction2">Charts</a></li>

      <?php } else { ?>
     <li class="panel hidden-xs  active"><a href="charts.php">Charts</a></li>
        <?php } ?>
  <?php }
  ?>












  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li class="panel hidden-xs  active"><a href="#"  id="myFunction3">Change Icon</a></li>

     <?php } else { ?>
    <li class="panel hidden-xs  active"><a href="../change_icon.php">Change Icon</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li class="panel hidden-xs  active"><a href="#"  id="myFunction3">Change Icon</a></li>

      <?php } else { ?>
     <li class="panel hidden-xs  active"><a href="change_icon.php">Change Icon</a></li>
        <?php } ?>
  <?php } ?>


  <?php
        $url2 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

      if (strpos($url2, 'lessons/') !==false || strpos($url2, 'exercises/') !== false)
      {?>
  <?php  if($_SESSION['welcome'] != 2){?>
      <li class="panel hidden-xs  active"><a href="#"  id="myFunction4">Settings</a></li>

     <?php } else { ?>
    <li class="panel hidden-xs  active"><a href="../settings.php">Settings</a></li>
       <?php }
     }
    else
   {?>
    <?php if($_SESSION['welcome'] != 2){?>
       <li class="panel hidden-xs  active"><a href="#"  id="myFunction4">Settings</a></li>

      <?php } else { ?>
     <li class="panel hidden-xs  active"><a href="settings.php">Settings</a></li>
        <?php } ?>
  <?php } ?>


  </ul>
</nav>
