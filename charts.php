<?php

session_start();

    include 'home_header.php';


	$db = mysqli_connect("localhost", "root", "" , "logintest");
?>

<!DOCTYPE html>
<html>
<body>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>




<div class="header">
	<h1>Charts</h1>
</div>
<br/>



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

<form  class="form-horizontal" method="POST" action="select_result.php">



  <div class="form-group col-xs-8">


<div class="panel-body"><a href="ColumnChart_test.php">Column </a></div>

<div class="panel-body"><a href="select_result_ajax.php">Ajax results </a></div>


<div class="panel-body"><a href="piechart_test.php">PieChart </a></div>

<div class="panel-body"><a href="difficulty_level.php">difficulty_level </a></div>

<div class="panel-body"><a href="barchart.php">barchart </a></div>


</div>
</div>
</div>

</body>
</html>
