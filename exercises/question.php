<?php include 'database.php'; ?>
<?php
   //Set question Number
 $number = (int) $_GET['n'];  //gets the number at the top of the url we
 //currently set it as n=1

//Get the question
//might have to do separate files and tables for each subjects
$query = "SELECT * from questions
WHERE question_number =$number";


//Get the resutlt from the query
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

///////////////////////////////////////
///////////////////////////////////////
//Get the choices
//might have to do separate files and tables for each subjects
$query = "SELECT * from choices
WHERE question_number =$number";


//Get the resutlt from the query
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);






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
 <div class="current">Question 1 of 5</div>

<p class="question">
<?php  echo $question['text'];?>
</p>
<form method="post" action="process.php">
  <ul class="choices">
    <?php while($row =$choices->fetch_assoc()): ?>  <!--while there is still choice records-->
      <li><input name="choice" type="radio" value="<?php echo $row['id'];?>"/> <?php echo $row['text']?> </li>

   <?php endwhile; ?>
  </ul>
 <input type="submit" value="Submit"/>

</form>
</div>


</main>

<footer>
  <div class="container">
   Copyrght & copy whatever
 </div>
  </footer>

</body>
</html>
