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
echo "$maths_lesson";

$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' and math_lesson = '$maths_lesson'";
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
echo "</td><td>";


//this will link to you another page


}
echo "</table>\n";
}

?>


<!DOCTYPE html>
<html>
<body>

<p>Select your maths category.</p>

<form method="POST" action="select_result.php">
  <select name="maths_lessons">
    <option value="Algebra">Algebra</option>
    <option value="Trignometry">Trignometry</option>
  </select>
  <br><br>

    <button type="submit" class="btn btn-primary btn-s" name="Score_btn"> submit </button>
</form>

</body>
</html>
