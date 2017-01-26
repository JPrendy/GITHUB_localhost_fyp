<?php
session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include '..\home_header.php';
  }
  else {
      include '..\home_header_dark.php';
  }
  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Maths Quiz </title>
<link rel="stylesheet" href="css/style_quiz.css" type="text/css" />

</head>
<body>

<header>

<div class="container">
  <h1> Maths Quiz</h1>
</div>
</header>
<main>
<div class="container">
<h2> You're Done!</h2>
<p> Congrats! You have completed the test </p>
<p> Final Score:  <?php echo $_SESSION['score']; ?></p>

<?php
$uid =  $_SESSION['userid'];
echo "user id is $uid";
echo "<pre>";
$math_lesson =  $_SESSION['math_lesson'];
echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];
echo "<pre>";
echo "The final score was $score";

$difficulty_level = $_SESSION['difficulty_level'];
echo  "the difficulty_level is $difficulty_level";
date_default_timezone_set('UTC');
echo "The time is " . date("h:i:sa");
//$time = date("h:i:sa");
//echo "$time";
echo "Today is " .  date("Y-m-d H:i:s") . "<br>";
$time = date("Y-m-d H:i:s");
echo "$time";




	$db = mysqli_connect("localhost", "root", "" , "logintest");

$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, sc_time) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$time')";
mysqli_query($db, $sql);


?>


  <div class="panel-body"><a href="back_to_exercises.php">back to exercises </a></div>




</div>
</main>
<footer>
  <div class="container">
   Copyrght & copy whatever
 </div>
  </footer>

</body>
</html>
