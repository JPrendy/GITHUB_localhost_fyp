<?php

session_start();
if($_SESSION['welcome'] !=2){
    header("Location: home.php");
}
    include 'home_header.php';




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
	<h1>Past Results</h1>
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

<form  class="form-horizontal" method="POST" action="show_results.php">



  <div class="form-group col-xs-8">
    <div class="col-xs-offset-4">
  <label for="sel1">Select A Maths Topic:</label>
  <select class="form-control"  name="maths_lessons" id="sel1">
        <option value="0">...</option>
    <option value="Algebra ">Algebra</option>
    <option value="Trignometry">Trignometry</option>
  </select>
</div>
</div>
  <br><br>

  <div class="form-group col-xs-8">
    <div class="col-xs-offset-4">
  <label for="sel1">Select a Difficulty:</label>
  <select class="form-control"  name=difficulty_level id="sel2">
    <option value="">...</option>
      <option value="-1">-1</option>
    <option value="0">0</option>
    <option value="1">1</option>
      <option value="2">2</option>
        <option value="3">3</option>
  </select>
</div>
</div>



  <br><br>

  <div class="form-group col-xs-8">
    <div class="col-xs-offset-4">
        <label for="sel1">Select your Order:</label>
  <select  class="form-control" name="order">
        <option value="ASC ">...</option>
    <option value="ASC">Newest</option>
    <option value="DESC">Oldest</option>
  </select>
</div>
</div>

  <br><br>

  <div class="form-group col-xs-8">
    <div class="col-xs-offset-4">
<label for="sel1">Select How Many Columns To Return:</label>
<select  class="form-control" name="limit">
  <option value="10">...</option>
  <option value="5">5</option>
  <option value="10">10</option>

</select>
</div>
</div>


</div>
  <br><br>
  <div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-primary btn-s" name="Score_btn"> submit </button>
  </div>
</div>
</form>




</div>
</div>
</div>
</div>

<br>
<br>

<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>



</body>
</html>
