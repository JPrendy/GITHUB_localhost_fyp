<?php include 'database.php'; ?>
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
<?php
   //Set question Number
 $number = (int) $_GET['n'];  //gets the number at the top of the url we
  $number2 = (string) $_GET['m'];  //gets the number at the top of the url we


  $before_choice = "_choices";
  $choices =  $number2 . $before_choice;
  $_SESSION['choices'] = $choices;

 echo $number;
  echo $number2;
 //currently set it as n=1

//Get the question
//might have to do separate files and tables for each subjects
//$query = "SELECT * from questions
//WHERE question_number =$number";
$query= "SELECT * FROM $number2";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);

$total= $results->num_rows;



$query = "SELECT * from $number2
WHERE question_number =$number";


//Get the resutlt from the query
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

///////////////////////////////////////
///////////////////////////////////////
//Get the choices
//might have to do separate files and tables for each subjects
$query = "SELECT * from $choices
WHERE question_number =$number order by RAND()";


/////////////////////////////ORDER BY RAND() BRINGS THE ROWS RANDOMLY

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
 <div class="current">Question <?php echo  $question['question_number']; ?> of <?php echo $total ?></div>

<p class="question">
<?php  echo $question['text'];?>
</p>
<form method="post" action="process.php">
  <ul class="choices">
    <?php while($row =$choices->fetch_assoc()): ?>  <!--while there is still choice records-->
  <!-- <li><input name="choice" type="radio" value="<?php echo $row['id'];?>"/> <?php echo $row['text']  ?>  </li> -->

      <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary btn-lg">
          <input type="radio" name="choice" id="option1" autocomplete="off" value="<?php echo $row['id'];?>"/>  <?php echo $row['text']?>
        </label>
      </div>
   <?php endwhile; ?>
  </ul>
 <input type="submit" value="Submit"/>
 <input type="hidden" name="number" value="<?php echo $number; ?>"/>
 <input type="hidden" name="number2" value="<?php echo $number2; ?>"/>

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
