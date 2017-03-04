<?php

session_start();
if($_SESSION['welcome'] !=2){
    header("Location: home.php");
}
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


<form  class="form-horizontal" method="POST" action="ColumnChart_test.php">


  <div class="form-group col-xs-8">
    <div class="col-xs-offset-4">
              <label for="sel1">Select the type of chart you want to display your data:</label>
<select  class="form-control" name="chart">
    <option value="ColumnChart">...</option>
  <option value="ColumnChart">Column Charts</option>
    <option value="BarChart">BarCharts</option>
  <option value="PieChart">PieChart</option>
  <option value="LineChart">LineCharts</option>
<option value="ScatterChart">ScatterChart</option>
</select>
</div>
</div>

<div class="form-group col-xs-8">
  <div class="col-xs-offset-4">
            <label for="sel1">Select what you want to show the x-axis:</label>
<select  class="form-control" name="type">
  <option value="math_lesson">...</option>
  <option value="math_lesson">math lesson</option>
<option value="sc_time">date</option>

</select>
</div>
</div>

<div class="form-group col-xs-8">
  <div class="col-xs-offset-4">
<label for="sel1">Select your Order:</label>
<select  class="form-control" name="order">
<option value="ASC">...</option>
<option value="ASC">ascending</option>
<option value="DESC">descending</option>
</select>
</div>
</div>

    <div class="form-group col-xs-8">
      <div class="col-xs-offset-4">
<label for="sel1">Select How Many Columns To Return:</label>
  <select  class="form-control" name="limit">
    <option value="25">...</option>
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


<div class="panel-body"><a href="difficulty_level.php">difficulty_level </a></div>


<br>

<!--
------------------------->



<!--
<div class="panel-body"><a href="ColumnChart_test.php">Column </a></div>

<div class="panel-body"><a href="select_result_ajax.php">Ajax results </a></div>


<div class="panel-body"><a href="piechart_test.php">PieChart </a></div>



<div class="panel-body"><a href="barchart.php">barchart </a></div>-->


</div>
</div>
</div>

<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>

</body>
</html>
