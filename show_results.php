<?php

session_start();

    include 'home_header.php';
$db = mysqli_connect("localhost", "root", "" , "logintest");

//fetch table rows from mysql db
//$sql = "select * from users";  //in my case it would be users
//$result = mysqli_query($connection, $sql) or die("Error in Selecting" . mysqli_error($connection));

if ( isset($_POST['Score_btn']) ) {

$maths_lesson = mysql_real_escape_string($_POST['maths_lessons']);
$difficulty_level = mysql_real_escape_string($_POST['difficulty_level']);
$order = mysql_real_escape_string($_POST['order']);
$limit = mysql_real_escape_string($_POST['limit']);
//echo "$maths_lesson";

if ($maths_lesson == "0") {
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level $difficulty_level and math_lesson = 'Algebra' OR math_lesson ='Trignometry' ORDER BY sc_time $order LIMIT $limit";
}
else{
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level $difficulty_level and math_lesson = '$maths_lesson' ORDER BY sc_time $order LIMIT $limit";
}
//echo "$sql";
$result = mysqli_query($db, $sql);

?>
<style>


table, td, th, tr, thead {
    border: 1px solid black;
    text-align: center;
    padding: 5px;

}

th {text-align: left;}
</style>

<br>
  <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th>Math Lesson</th>
        <th>Score</th>
        <th>Difficulty</th>
            <th>Date</th>
    </tr>
  </thead><?php

//to do this we need fetch array not just a row because we are calling multipe rows
while($row = mysqli_fetch_array($result)){
//this displays all the information in the rows

?>

<tbody>
<?php if($row[3] >=6) { ?>
<tr class="success">
<?php } else
{?>

<tr class="danger">
<?php } ?>
  <td>
<?php echo ($row[2]);?>

</td>
<td>
<?php echo ($row[3]);?>
</td>
<td>
<?php echo ($row[4]);?>
</td>
<td>
<?php echo ($row[6]);?>
</td>


</tr>



</tbody>
<?php

//this will link to you another page


}
echo "</table>\n";
}
?>
  </div>
  <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>
