<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php
//Check to see if score is set_error_handler

if(!isset($_SESSION['score'])){
$_SESSION['score'] = 0;


}

if ($_POST){
  $number = $_POST['number'];
  $number2 = $_POST['number2'];

$_SESSION['math_lesson'] = $number2;


  $selected_choice = $_POST['choice'];
  $next = $number+1;

$test = "&m=";
$number2_2 = $test . $number2;

 $number3= $next . $number2_2;

  echo $number. '<br>';  //this holds what question you were on
  echo $selected_choice;  //this holds the selected choice you picked


//get total questions;

$query= "SELECT * FROM $number2";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);

$total= $results->num_rows;


//get correct choice




$query = "SELECT * FROM choices where question_number = $number and is_correct=1";


//GET Result

$result = $mysqli->query($query) or die($mysqli-> error.__LINE__);

//GET row
$row = $result->fetch_assoc();

//Set Correct choice
$correct_choice = $row['id'];

//Compare
if($correct_choice == $selected_choice){
//Answer is correct
$_SESSION['score']++;
}

if($number == $total){
   header("Location: final.php");
  exit();
}else{
  header("Location: question.php?n=".$number3);
}


}

 ?>
