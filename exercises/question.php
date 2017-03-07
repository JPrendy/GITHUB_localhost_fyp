<?php include 'database.php'; ?>
<?php
session_start();

    include '..\home_header_question.php';

  ?>
<?php
   //Set question Number
 $number = (int) $_GET['n'];  //gets the number at the top of the url we
  $number2 = (string) $_GET['m'];  //gets the number at the top of the url we


if ($number == 1){
  date_default_timezone_set('UTC');
  $start_time = date("Y-m-d H:i:s");
 $_SESSION['start_time'] =   $start_time;


}

  $before_choice = "_choices";
  $choices =  $number2 . $before_choice;
  $_SESSION['choices'] = $choices;

 //echo $number;
  //echo $number2;
  $current_test_hint = $_SESSION['text_hint'];
    $current_answers = $_SESSION['more_answers'];

    echo $current_answers;
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
if($current_answers == 'add_answers_Y'){
$query = "SELECT * from $choices
WHERE question_number =$number order by RAND()";
}
else{
  $query = "SELECT * from $choices
  WHERE question_number =$number and extra_q_choice = 0 order by RAND()";

}

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
<script>
function goBack() {
    window.history.back()
}
</script>
<body>




     <div class="container-fluid text-center">
  	  <div class="row content">







    <!--  <div class="row ">-->
<div  class="col-sm-8">
  <h1>   <?php echo $number2?> Quiz</h1>



 <div class="current"><b>Question <?php echo  $question['question_number']; ?> / <?php echo "$total." ?></b></div>

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
             <?php $test  = $row['math_section']; ?>
        </label>
      </div>
   <?php endwhile; ?>
  </ul>
  <div class="col-sm-offset-9">
  <?php
  if( $number != 1){
?> <button type="submit" class="btn btn-danger btn-s "   id="back" value="Back" onclick="goBack()">  Back </button><?php
}
?>

 <button type="submit" class="btn btn-primary btn-s" id="next" name="submit">  Next</button>
 <input type="hidden" name="number" value="<?php echo $number; ?>"/>
 <input type="hidden" name="number2" value="<?php echo $number2; ?>"/>
  <input type="hidden" name="test" value="<?php echo $test ?>"/>
</div>
</form>

<!--MESSING AROUND WITH PROGRESS BARS-->
<br/>
<div class="progress">
   <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $number?>0%">
     <?php echo $number?>0%
   </div>
 </div>

   <?php echo $test?>

</div>
</div>
</div>
<!--</div>-->


<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="../year.js"></script>

</body>
</html>
