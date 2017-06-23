<?php include 'database.php'; ?>
<?php session_start(); ?>

<?php
//Check to see if score is set_error_handler

if(!isset($_SESSION['score'])){
$_SESSION['score'] = 0;


}

if ($_POST){


  $number = $_POST['number']; //this gets the number of the question
  $number2 = $_POST['number2']; //this get the maths lesson
  $math_section = $_POST['test']; //this get the maths lesson


$_SESSION['math_lesson'] = $number2;


  $selected_choice = $_POST['choice']; //this gets the user posted result

  if (empty("$selected_choice")){ //this is checking $username
      $selected_choice = 0;
  }

#if(  $number ==1){
  #$_SESSION['lesson'.$number] =   $selected_choice;
#  $_SESSION['lesson2'] =   $selected_choice;
#}
  $_SESSION['lesson'.$number] =   $selected_choice;


  $next = $number+1;


$test = "&m=";
$number2_2 = $test . $number2;

 $number3= $next . $number2_2;

  echo $number. '<br>';  //this holds what question you were on
  echo $selected_choice;  //this holds the selected choice you picked


//get total questions;

$query= "SELECT * FROM $number2";
$results = $db->query($query) or die($mysqli->error.__LINE__);

$total= $results->num_rows;


//get correct choice

//THIS GETS THE SESSION 'CHOICES' WHICH STORES WHAT MATH SUBJECT WE ARE LOOKING FOR
$choices =  $_SESSION['choices'];
//FOR EXAMPLE CHOICES COULD HOLD EITHER 'ALGEBRA_CHOICES' OR 'TRIGNOMETRY CHOICES' IT DEPENDS ON WHAT EXERCISE YOU PICKED

$dif = $_SESSION['difficulty_level'];



$query = "SELECT * FROM   $choices where question_number = $number and is_correct=1 and difficulty_level=$dif";
$query2 = "SELECT * FROM  $choices where question_number = $number and id=$selected_choice  and difficulty_level=$dif";

//GET Result

$result = $db->query($query) or die($mysqli-> error.__LINE__);
$result2 = $db->query($query2) or die($mysqli-> error.__LINE__);
//GET row
$row = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();

//Set Correct choice
$correct_choice = $row['id'];

//////THIS WILL GET THE CORRECT ANSWER AND DISPLAY IT
$correct_choice_text = $row['text'];



$selected_choice_text = $row2['text'];
echo "ok ";

if ($selected_choice_text == null)
{
  $selected_choice_text = "blank";
  $_SESSION['blank']++;
}
echo $selected_choice_text;

$_SESSION['correct'.$number] =   $correct_choice_text;
$_SESSION['your'.$number] =   $selected_choice_text;


//Compare
if($correct_choice == $selected_choice){
//Answer is correct
$_SESSION['score']++;
if($math_section == 1){
  $_SESSION['math_section_1']++;
}
if($math_section == 2){
  $_SESSION['math_section_2']++;
}
if($math_section == 3){
  $_SESSION['math_section_3']++;
}
if($math_section == 4){
  $_SESSION['math_section_4']++;
}

}

if($number == $total){
   header("Location: final.php");
  exit();
}
//WORKING TO FIX THAT ERROR
if($number3 > 10){
   header("Location: final.php");
  exit();
}
else{
  header("Location: question.php?n=".$number3);
}


}

 ?>
