<?php

session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include 'home_header.php';
  }
  else {
      include 'home_header_dark.php';
  }


	$db = mysqli_connect("localhost", "root", "" , "logintest");

//fetch table rows from mysql db
//$sql = "select * from users";  //in my case it would be users
//$result = mysqli_query($connection, $sql) or die("Error in Selecting" . mysqli_error($connection));

if ( isset($_POST['Score_btn']) ) {

$maths_lesson = mysql_real_escape_string($_POST['maths_lessons']);
$difficulty_level = mysql_real_escape_string($_POST['difficulty_level']);
$order = mysql_real_escape_string($_POST['order']);
$limit = mysql_real_escape_string($_POST['limit']);
echo "$maths_lesson";

if ($order=="") {
  $order="desc";
}

$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level = '$difficulty_level' and math_lesson = '$maths_lesson' ORDER BY id $order LIMIT $limit";
echo "$sql";
	$result = mysqli_query($db, $sql);

echo "<table>";

//to do this we need fetch array not just a row because we are calling multipe rows
while($row = mysqli_fetch_array($result)){
//this displays all the information in the rows
echo "<tr><td>";
echo($row[0]);
echo "</td><td>";
echo($row[1]);
echo "</td><td>";
echo($row[2]);
echo "</td><td>";
echo($row[3]);
echo "</td><td>";
echo($row[4]);
echo "</td><td>";
echo($row[5]);



//this will link to you another page


}
echo "</table>\n";
}

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
<p>Select your maths category.</p>

<form  method="POST" action="select_result.php">



  <div class="form-group">
    <div class="col-xs-2">
  <label for="sel1">Select list (select one):</label>
  <select class="form-control"  name="maths_lessons" id="sel1">
    <option value="Algebra">Algebra</option>
    <option value="Trignometry">Trignometry</option>
  </select>
</div>
</div>
  <br><br>


  <select name="difficulty_level">
    <option value="0">0</option>
    <option value="1">1</option>
  </select>
  <br><br>


  <select name="order">
    <option value="ASC">Newest</option>
    <option value="DESC">Oldest</option>
  </select>
  <br><br>

  <select name="limit">
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="100">100</option>
  </select>
  <br><br>


    <button type="submit" class="btn btn-primary btn-s" name="Score_btn"> submit </button>
</form>





<div class="panel-body"><a href="ColumnChart_test.php">Column </a></div>

<div class="panel-body"><a href="select_result_ajax.php">Ajax results </a></div>


<div class="panel-body"><a href="piechart_test.php">PieChart </a></div>

<div class="panel-body"><a href="difficulty_level.php">difficulty_level </a></div>

<div class="panel-body"><a href="barchart.php">barchart </a></div>


</body>
</html>
