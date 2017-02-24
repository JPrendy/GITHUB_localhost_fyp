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
      Column Chart Data

<form  class="form-horizontal" method="POST" action="ColumnChart_test.php">


  <div class="form-group col-xs-8">
    <div class="col-xs-offset-4">
              <label for="sel1">Select How Many Columns To Return:</label>
<select  class="form-control" name="chart">
  <option value="columnchart_material">Column Charts</option>
  <option value="chart_div">chart div</option>
</select>
</div>
</div>



    <div class="form-group col-xs-8">
      <div class="col-xs-offset-4">
                <label for="sel1">Select How Many Columns To Return:</label>
  <select  class="form-control" name="limit">
    <option value="25">..</option>
    <option value="5">5</option>
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="100">100</option>
  </select>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-primary btn-s" name="Score_btn"> submit </button>
</div>
</div>
</form>


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
