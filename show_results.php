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

$_SESSION['math_lesson2'] = 	$maths_lesson;
$_SESSION['difficulty_level2'] = 	$difficulty_level;
$_SESSION['order'] = 	$order;
//echo "$maths_lesson";
}

$per_page=10;
if (isset($_GET["page"])) {

$page = $_GET["page"];

}

else {

$page=1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit

if ($_SESSION['math_lesson2']  == "0") {
  if($_SESSION['difficulty_level2']  == ""){
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level {$_SESSION['difficulty_level2']} and math_lesson = 'Algebra' OR math_lesson ='Trignometry' ORDER BY sc_time {$_SESSION['order']} LIMIT $start_from, $per_page ";
}
else{
  $sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level = '{$_SESSION['difficulty_level2']}' and math_lesson = 'Algebra' OR math_lesson ='Trignometry' ORDER BY sc_time {$_SESSION['order']} LIMIT $start_from, $per_page ";
}
}
else{
    if($_SESSION['difficulty_level2']  == ""){
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level  {$_SESSION['difficulty_level2']} and math_lesson = '{$_SESSION['math_lesson2']}' ORDER BY sc_time {$_SESSION['order']} LIMIT $start_from, $per_page ";
}
else{
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level = '{$_SESSION['difficulty_level2']}' and math_lesson = '{$_SESSION['math_lesson2']}' ORDER BY sc_time {$_SESSION['order']} LIMIT $start_from, $per_page";
}
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


<h2> Results </h2>

  <div class="table-responsive">
<table class="table table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th><h5><strong>Math Lesson</strong></h5></th>
        <th><h5><strong>Score</strong></h5></th>
        <th><h5><strong>Left Blank</strong></h5></th>
        <th><h5><strong>Difficulty</strong></h5></th>
            <th><h5><strong>Date</strong></h5></th>
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
<?php echo ($row[5]);?>
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




if ($_SESSION['math_lesson2']  == "0") {
  if($_SESSION['difficulty_level2']  == ""){
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level {$_SESSION['difficulty_level2']} and math_lesson = 'Algebra' OR math_lesson ='Trignometry' ORDER BY sc_time {$_SESSION['order']} ";
//echo $sql;
}
else{
  $sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level = '{$_SESSION['difficulty_level2']}' and math_lesson = 'Algebra' OR math_lesson ='Trignometry' ORDER BY sc_time {$_SESSION['order']} ";
//echo $sql;
}
}
else{
    if($_SESSION['difficulty_level2']  == ""){
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level  {$_SESSION['difficulty_level2']} and math_lesson = '{$_SESSION['math_lesson2']}' ORDER BY sc_time {$_SESSION['order']} ";
}
else{
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' AND difficulty_level = '{$_SESSION['difficulty_level2']}' and math_lesson = '{$_SESSION['math_lesson2']}' ORDER BY sc_time {$_SESSION['order']} ";
}
}
$result = mysqli_query($db, $sql);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo "<center><button class='btn btn-default btn-md'> <a href='show_results.php?page=1'>".'First Page'."</a></button> ";

for ($i=1; $i<=$total_pages; $i++) {

echo "<a id=length href='show_results.php?page=".$i."'>".$i."</a> ";
};
// Going to last page
echo "<button class='btn btn-default btn-md'> <a href='show_results.php?page=$total_pages'>".'Last Page'."</a></center></button ";




?>






</div>
  </div>
</div>
</div>



<br>
<br>
<br>
<br>



<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>
