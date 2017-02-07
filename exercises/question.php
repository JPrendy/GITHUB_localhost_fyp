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

 //echo $number;
  //echo $number2;
  $current_test_hint = $_SESSION['text_hint'];
  //echo   $current_test_hint;

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

</head>
<body>

<header>

     <!--<div class="container-fluid text-center">-->
  	  <div class="row content">


      <nav class="col-sm-3">
        <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="200" >
             <li class="active"><a href="#section0">Last topic done</a></li>
             <p>
               <p>
          <li class="active"><a href="lessons.php">Lessons</a></li>
          <li><a href="exercises.php">Exercises</a></li>
          <!--added a javascript function to the hyperlink-->
          <!-- the older version  <li><a href="#" onclick="myFunction()" >Charts</a></li> -->
          <li><a href="#"  id="myFunction" >Charts</a></li>
  		<li><a href="#section4">Change Icon</a></li>
  			<li><a href="settings.php">Change settings</a></li>
        </ul>
      </nav>





      <div class="row">
<div  class="col-sm-8">
  <h1>   <?php echo $number2?> Quiz</h1>



 <div class="current">Question <?php echo  $question['question_number']; ?> / <?php echo $total ?></div>

<p class="question">
<?php    if ($current_test_hint == 'text_hint_Y'){
 echo $question['text_hint'];
 }
else{
 echo $question['text'];
}
 ?>
</p>
<form method="post" action="process.php" >
  <ul class="choices">
    <?php while($row =$choices->fetch_assoc()): ?>  <!--while there is still choice records-->
  <!--  if ($current_test_hint == 'Y'){}-->
  <!--------THIS LINE MAY NOT BE NECESSARY
  <!-- <li><input name="choice" type="radio" value="<?php echo $row['id'];?>"/> <?php  echo $row['text']  ?>  </li> -->

      <div class="btn-group" data-toggle="buttons" class="row">
        <label class="btn btn-primary btn-lg custom">
          <input type="radio" name="choice" id="option1" autocomplete="off" value="<?php echo $row['id'];?>"/>  <?php echo $row['text']?>
        </label>
      </div>
   <?php endwhile; ?>
  </ul>
 <input type="submit" value="Submit"/>
 <input type="hidden" name="number" value="<?php echo $number; ?>"/>
 <input type="hidden" name="number2" value="<?php echo $number2; ?>"/>

</form>

<!--MESSING AROUND WITH PROGRESS BARS-->
<div class="progress">
   <div class="progress-bar progress-bar-success progress-bar-striped"" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $number?>0%">
     <?php echo $number?>0%
   </div>
 </div>



</div>
</div>
</div>



<footer>
  <div class="container">
   Copyrght & copy whatever
 </div>
  </footer>

</body>
</html>
