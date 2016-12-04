<?php
    include '../home_header.php';
?>




<?php



	$db = mysqli_connect("localhost", "root", "" , "logintest");
$lesson  = "algebra";

echo "$lesson</br>";


  $sql3 = "Select topic from lessons_visited WHERE uid='{$_SESSION['userid']}'";
echo "$sql3<br/>";
//$result2 = mysqli_query($db, $sql3);



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


 </body>
 </html>
