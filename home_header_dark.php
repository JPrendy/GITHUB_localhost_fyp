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

    body{
        background-color: #D3D3D3;
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
           background-color: yellow;
           padding: 10px;
           display: none;
       }

       span:hover + #first {
           display: block;
       }

       .custom {
           width: 180px !important;
       }

       .btn-group{
         margin:10px;
       }

       h1{
         text-align:center;
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
        <!-- create a conditon where if you are calling if from the lessons subfolder it will give you a different link to the home directory-->
        <!--by doing this, it will make I wont need to make a separare php page with pretty much the identical code-->
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, 'lessons/') !==false || strpos($url, 'exercises/') !== false){
        echo  '<li class="active"><a href="../home.php">Home</a></li>';
        }
        else{
        echo '<li class="active"><a href="home.php">Home</a></li>';
      }
        ?>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
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
