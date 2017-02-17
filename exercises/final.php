<?php
 include 'database.php';
session_start();

  

  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Maths Quiz </title>


</head>
<body>

<header>
</header>


<div class="container-fluid text-center">
  <div class="row content">




  <div class="col-sm-9 text-centre">


<h2> Congrats! You have completed the test </h2>
<p> Final Score:  <?php echo $_SESSION['score']; ?></p>

<?php
$uid =  $_SESSION['userid'];
$one = 1;
//echo "user id is $uid";

$math_lesson =  $_SESSION['math_lesson'];
//echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];

echo "You scored $score/10 in  $math_lesson";

$difficulty_level = $_SESSION['difficulty_level'];
//echo  "the difficulty_level is $difficulty_level";
date_default_timezone_set('UTC');
//echo "The time is " . date("h:i:sa");
//$time = date("h:i:sa");
//echo "$time";
//echo "Today is " .  date("Y-m-d H:i:s") . "<br>";
$time = date("Y-m-d H:i:s");

//echo "$time";
//echo "<br>";
//if (isset($_POST['submit'])){
$start_time = $_SESSION['start_time'];
//}

	$db = mysqli_connect("localhost", "root", "" , "logintest");

$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, sc_time_start, sc_time) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$start_time' ,'$time')";
$result = mysqli_query($db, $sql);


if($one = 1){
 header("Location: finish.php");
  exit();
}






?>


</body>
</html>
