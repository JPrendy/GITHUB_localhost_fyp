<?php
 include 'database.php';
session_start();

    include '..\home_header.php';

  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Maths Quiz </title>


</head>
<body>

<header>
</header>


<div class="container-fluid text-center">
  <div class="row content">




  <div class="col-sm-9 text-centre">


<h2> Congrats! You have completed the test </h2>
<p> Final Score:  <?php echo $_SESSION['score']; ?></p>

<?php
$uid =  $_SESSION['userid'];
//echo "user id is $uid";

$math_lesson =  $_SESSION['math_lesson'];
//echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];

echo "You scored $score/10 in  $math_lesson";

$difficulty_level = $_SESSION['difficulty_level'];
//echo  "the difficulty_level is $difficulty_level";
date_default_timezone_set('UTC');
//echo "The time is " . date("h:i:sa");
//$time = date("h:i:sa");
//echo "$time";
//echo "Today is " .  date("Y-m-d H:i:s") . "<br>";
$time = date("Y-m-d H:i:s");

//echo "$time";
//echo "<br>";
//if (isset($_POST['submit'])){
$start_time = $_SESSION['start_time'];
//}

	$db = mysqli_connect("localhost", "root", "" , "logintest");

//$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, sc_time_start, sc_time) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$start_time' ,'$time')";
//$result = mysqli_query($db, $sql);
 //header("Location: finish.php");







$sql2 = "SELECT * FROM quiz_scores where uid= '{$_SESSION['userid']}' ORDER BY sc_time DESC LIMIT 1";
  $result2 = mysqli_query($db, $sql2);
if (!$row = mysqli_fetch_assoc($result2)){

  echo "Your username or password is incorrect!";
      header("Location: final.php?error=real test");


}
   $first_time = $row['sc_time'];
echo $first_time;

?>
<table class="table table-condensed table-bordered table-hover">
   <thead>
     <tr>
       <th>Your Answers</th>
       <th>Correct Answers</th>

     </tr>
   </thead>
<?php
//this is the time you finished
$time1 = new DateTime($first_time );
//this is the time you started the quiz
$time2 = new DateTime($start_time);



$interval =  $time1->diff($time2);
$ok = $interval->format(" %i minutes %s seconds");
echo $ok;

?>


<?php

for ($x = 1; $x <= 7; $x++) {
echo  "<strong>";
?>
<tbody>
    <?php if($_SESSION['your'.$x] == $_SESSION['correct'.$x]){
  ?>  <tr  class="success"><?php
}?>
<?php if($_SESSION['your'.$x] != $_SESSION['correct'.$x]){
?>  <tr  class="danger"><?php
}?>
     <td> <?php echo "<strong>".$_SESSION['your'.$x], "</strong> is the answer you picked"; ?>   </td>
     <td> <?php echo  "<strong>".$_SESSION['correct'.$x],"</strong> is the correct answer"; ?> </td>
     </tr>




<?php
echo "<br>";
}


#  echo "$ok";
?>

<tbody>


</tbody>
</table>


  <div class="panel-body"><a href="back_to_exercises.php">back to exercises </a></div>

<?php
///$query = "SELECT * from dynamic_settings
///WHERE uid ='{$_SESSION['userid']}' order by RAND()";
//ob_start();
$query = "SELECT * from dynamic_settings
WHERE uid ='{$_SESSION['userid']}' ";
$result = mysqli_query($db, $query);
?>

<h2>  Feedback  </h2>

  <?php    while($row = mysqli_fetch_array($result)) {?>
  <form action="feedback.php" method="post">
  <input type="checkbox" name="check_list[]" value="<?php echo $row[1]?>" <?php if ($row[1] == 'text_hint_Y') echo "checked='checked'";?> > Text Hints
  <input type="checkbox" name="check_list[]" value="<?php echo $row[2]?>" <?php if ($row[2] == 'timer_Y') echo "checked='checked'";?>> Timer
  <input type="checkbox" name="check_list[]" value="<?php echo $row[3]?>" <?php if ($row[3] == 'add_questions_Y') echo "checked='checked'";?>> More Questions
  <input type="checkbox" name="check_list[]" value="<?php echo $row[4]?>" <?php if ($row[4] == 'add_answers_Y') echo "checked='checked'";?>> More Possible Answer choices
  <input type="submit"  name="feedback_button" />
  </form>
     <?php }  ?>

  <?php
//  if(!empty($_POST['check_list'])) {
  //    foreach($_POST['check_list'] as $check) {
    //          echo $check; //echoes the value set in the HTML form for each checked checkbox.
                           //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                           //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    //  }
  //}
//	if (isset($_POST['feedback_button'])){

    //include 'feedback.php';

    //ob_end_flush();
  ?>


</div>
</div>
</div>
<br/>
<br/>
<br/>
<a class="twitter-share-button"
href=https://twitter.com/intent/tweet?url=https%3A%2F%2FFinal-Year-Project.com%2F&text=Final+Year+Project+e-learning.&hashtags=e-learning
  data-size="large">
Tweet</a>
<br/>
<br/>

<footer>
  <div class="container-fluid text-center">
   Copyrght & copy whatever
 </div>
  </footer>
</div>

</body>
</html>
