<?php
session_start();
$db = mysqli_connect("localhost", "root", "" , "logintest");
if (empty($_POST["feedback_button"])) {
    echo "Yes, mail is set";
}else{
$aDoor = $_POST['check_list'];
if(empty($aDoor))
{
  echo("You didn't select any buildings.");
      $test_text_hint = 0;
      $sql2 = "update dynamic_settings set text_hint='text_hint_N' where uid='{$_SESSION['userid']}'";
  //  echo "$sql2";
    if ($db->query($sql2) === TRUE) {
          //echo "<br></br>";
} else {
  echo "Error deleting record: " . $db->error;
}
}
else
{
  $N = count($aDoor);
  $test_text_hint = 0;
//  echo("You selected $N door(s): ");
  for($i=0; $i < $N; $i++)
  {
  //  echo($aDoor[$i] . " ");
    if(($aDoor[$i] == 'text_hint_N') || ($aDoor[$i] =='text_hint_Y')){
      //update

        $test_text_hint =1;
        $sql2 = "update dynamic_settings set text_hint='text_hint_Y' where uid='{$_SESSION['userid']}'";
    //  echo "$sql2";

      if ($db->query($sql2) === TRUE) {
          //  echo "<br></br>";
    //        echo "Record Updated successfully";

} else {
    echo "Error deleting record: " . $db->error;
}
    }
    //THIS WILL SOLVE THE FOR LOOP METHOD WHERE MORE THAN ONE VALUE IS SELECTED
    if($test_text_hint != 1){
      $sql2 = "update dynamic_settings set text_hint='text_hint_N' where uid='{$_SESSION['userid']}'";
  //  echo "$sql2";
    if ($db->query($sql2) === TRUE) {
        //  echo "<br></br>";
} else {
  echo "Error deleting record: " . $db->error;
}
    }
  }
//THIS WILL UPDATE THE SESSION FOR TEXT_HINT SO THAT IT WILL CHANGE IF THE CHECKBOX IS NOT SELECTED OR NOT
///////////THIS REQUIRED USE OF A SELECT STATEMENT WITHOUT IT A BOOLEAN AREA OCCURS
}


$aDoor = $_POST['check_list'];
if(empty($aDoor))
{
echo("You didn't select any buildings.");
  $test_text_hint = 0;
  $sql2 = "update dynamic_settings set timer='timer_N' where uid='{$_SESSION['userid']}'";
//echo "$sql2";
if ($db->query($sql2) === TRUE) {
      //echo "<br></br>";
} else {
echo "Error deleting record: " . $db->error;
}
}
else
{
$N = count($aDoor);
$test_text_hint = 0;
//echo("You selected $N door(s): ");
for($i=0; $i < $N; $i++)
{
//echo($aDoor[$i] . " ");
if(($aDoor[$i] == 'timer_N') || ($aDoor[$i] =='timer_Y')){
//update

$test_text_hint =1;
$sql2 = "update dynamic_settings set timer='timer_Y' where uid='{$_SESSION['userid']}'";
//echo "$sql2";

if ($db->query($sql2) === TRUE) {
    //echo "<br></br>";
    //echo "Record Updated successfully";

} else {
echo "Error deleting record: " . $db->error;
}
}
//THIS WILL SOLVE THE FOR LOOP METHOD WHERE MORE THAN ONE VALUE IS SELECTED
if($test_text_hint != 1){
$sql2 = "update dynamic_settings set timer='timer_N' where uid='{$_SESSION['userid']}'";
//echo "$sql2";
if ($db->query($sql2) === TRUE) {
  //echo "<br></br>";
} else {
echo "Error deleting record: " . $db->error;
}
}

//THIS WILL UPDATE THE SESSION FOR TEXT_HINT SO THAT IT WILL CHANGE IF THE CHECKBOX IS NOT SELECTED OR NOT
///////////THIS REQUIRED USE OF A SELECT STATEMENT WITHOUT IT A BOOLEAN AREA OCCURS
}}



$aDoor = $_POST['check_list'];
if(empty($aDoor))
{
echo("You didn't select any buildings.");
  $test_text_hint = 0;
  $sql2 = "update dynamic_settings set more_questions='add_questions_N' where uid='{$_SESSION['userid']}'";
//echo "$sql2";
if ($db->query($sql2) === TRUE) {
      //echo "<br></br>";
} else {
echo "Error deleting record: " . $db->error;
}
}
else
{
$N = count($aDoor);
$test_text_hint = 0;
//echo("You selected $N door(s): ");
for($i=0; $i < $N; $i++)
{
//echo($aDoor[$i] . " ");
if(($aDoor[$i] == 'add_questions_N') || ($aDoor[$i] =='add_questions_Y')){
//update

$test_text_hint =1;
$sql2 = "update dynamic_settings set more_questions='add_questions_Y' where uid='{$_SESSION['userid']}'";
//echo "$sql2";

if ($db->query($sql2) === TRUE) {
    //echo "<br></br>";
  //  echo "Record Updated successfully";

} else {
echo "Error deleting record: " . $db->error;
}
}
//THIS WILL SOLVE THE FOR LOOP METHOD WHERE MORE THAN ONE VALUE IS SELECTED
if($test_text_hint != 1){
$sql2 = "update dynamic_settings set more_questions='add_questions_N' where uid='{$_SESSION['userid']}'";
//echo "$sql2";
if ($db->query($sql2) === TRUE) {
  //echo "<br></br>";
} else {
echo "Error deleting record: " . $db->error;
}
}

//THIS WILL UPDATE THE SESSION FOR TEXT_HINT SO THAT IT WILL CHANGE IF THE CHECKBOX IS NOT SELECTED OR NOT
///////////THIS REQUIRED USE OF A SELECT STATEMENT WITHOUT IT A BOOLEAN AREA OCCURS
}}



$aDoor = $_POST['check_list'];
if(empty($aDoor))
{
echo("You didn't select any buildings.");
  $test_text_hint = 0;
  $sql2 = "update dynamic_settings set more_answers='add_answers_N' where uid='{$_SESSION['userid']}'";
//echo "$sql2";
if ($db->query($sql2) === TRUE) {
      //echo "<br></br>";
} else {
echo "Error deleting record: " . $db->error;
}
}
else
{
$N = count($aDoor);
$test_text_hint = 0;
//echo("You selected $N door(s): ");
for($i=0; $i < $N; $i++)
{
//echo($aDoor[$i] . " ");
if(($aDoor[$i] == 'add_answers_N') || ($aDoor[$i] =='add_answers_Y')){
//update

$test_text_hint =1;
$sql2 = "update dynamic_settings set more_answers='add_answers_Y' where uid='{$_SESSION['userid']}'";
//echo "$sql2";

if ($db->query($sql2) === TRUE) {
    //echo "<br></br>";
  //  echo "Record Updated successfully";

} else {
echo "Error deleting record: " . $db->error;
}
}
//THIS WILL SOLVE THE FOR LOOP METHOD WHERE MORE THAN ONE VALUE IS SELECTED
if($test_text_hint != 1){
$sql2 = "update dynamic_settings set more_answers='add_answers_N' where uid='{$_SESSION['userid']}'";
//echo "$sql2";
if ($db->query($sql2) === TRUE) {
  echo "<br></br>";
} else {
echo "Error deleting record: " . $db->error;
}
}

//THIS WILL UPDATE THE SESSION FOR TEXT_HINT SO THAT IT WILL CHANGE IF THE CHECKBOX IS NOT SELECTED OR NOT
///////////THIS REQUIRED USE OF A SELECT STATEMENT WITHOUT IT A BOOLEAN AREA OCCURS
}}








}
$sql_session = "SELECT * FROM dynamic_settings  where uid='{$_SESSION['userid']}'";
$result_session = mysqli_query($db, $sql_session);
$row_session = mysqli_fetch_assoc($result_session);
$_SESSION['text_hint'] =  $row_session['text_hint'];
$_SESSION['timer'] =  $row_session['timer'];
$_SESSION['question'] =  $row_session['more_questions'];
$_SESSION['more_answers'] =  $row_session['more_answers'];
  header("Location: ../exercises/final.php")
//}
?>
