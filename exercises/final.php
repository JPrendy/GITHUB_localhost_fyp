<?php session_start(); ?>
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

//$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level) VALUES ('$uid', '$email', '$uid', '$password')";
//mysqli_query($db, $sql);
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
