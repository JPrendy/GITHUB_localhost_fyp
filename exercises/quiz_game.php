<?php include 'database.php'; ?>
<?php
//get the total number of questions

$query = "SELECT * FROM questions";
//GET Results
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows;
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

</header>
<main>
<div class="container">
<h2> Test Your PHP knowledge</h2>
<p> This is a multiple choice quiz to test your knowledge of PHP</p>
<ul>
<li><strong> Number of Questions: </strong><?php echo $total;   ?></li>
<li><strong> Type: </strong>Multiple Choices</li>
<li><strong> Estimated Time: </strong>4 Minutes</li>
</ul>

<a href="question.php?n=1" class="start"> Start Quiz</a> <!--this will retrieve the first question with ?n=1-->

</main>
</div>
</main>

<footer>
  <div class="container">
   Copyrght & copy whatever
  </footer>

</body>
</html>
