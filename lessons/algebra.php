

<?php
session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include '../home_header.php';
  }
  else {
      include '../home_header_dark.php';
  }
?>



<?php



	$db = mysqli_connect("localhost", "root", "" , "logintest");
$lesson  = "algebra";

echo "$lesson</br>";

//It is important to have SELECT in uppercase or won't work
  $sql3 = "SELECT topic_visited from lessons_visited WHERE uid='{$_SESSION['userid']}'";

//make sure right user is logged in with a value from topic_visited
echo "$sql3<br/>";
$result = mysqli_query($db, $sql3);
$row = mysqli_fetch_array($result);
echo $row['topic_visited'];
$increment = $row['topic_visited'];
$increment += 1;
echo "$increment";








$update_l = "UPDATE lessons_visited set topic_visited='$increment' where uid='{$_SESSION['userid']}'";

$sql2 = "UPDATE lessons set lesson_type='$lesson' where uid='{$_SESSION['userid']}'";
echo "$sql2";

if ($db->query($sql2) === TRUE) {
    echo "<br></br>";
    echo "Record Updated successfully";
}
else {
    echo "Error deleting record: " . $db->error;
}

if ($db->query($update_l) === TRUE) {
    echo "<br></br>";
    echo "Record Updated successfully";
}
else {
    echo "Error deleting record: " . $db->error;
}

$_SESSION['lesson'] = $lesson;

 ?>

<br>
<div class="col-sm-9 text-left">

 <button type="button" name="button">video</button>
  <button type="button" name="button">text</button>
<br>
<br>

Here we will go through the content of our topic
Algebra


<a href="..\exercises\quiz.php"> here to test algebra </a>
</div>


 </body>
 </html>
