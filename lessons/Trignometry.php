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
$lesson  = "Trignometry";

echo $lesson;


$sql2 = "update lessons set lesson_type='$lesson' where uid='{$_SESSION['userid']}'";
echo "$sql2";

if ($db->query($sql2) === TRUE) {
    echo "<br></br>";
    echo "Record Updated successfully";
}
else {
    echo "Error deleting record: " . $db->error;
}

$_SESSION['lesson'] = $lesson;


 ?>
 <div class="col-sm-9 text-left">

  <button type="button" name="button">video</button>
   <button type="button" name="button">text</button>
 <br>
 <br>

 Here we will go through the content of our topic
Trignometry


 <a href="..\exercises\quiz.php"> here to test trignometry </a>
 </div>

 </body>
 </html>