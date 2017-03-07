<?php
 include 'database.php';
session_start();
if($_SESSION['blank'] ==null){
  header("Location: ../home.php");
}

    include '..\home_header_final.php';


  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> Maths Quiz </title>


</head>
<body>




<div class="container-fluid text-center">
  <div class="row content">

  <div class="col-sm-9 text-centre">
<?php $math_lesson =  $_SESSION['math_lesson'];?>

<h3> Congratulations! You have completed the <?php echo  $math_lesson; ?> test. </h3>
<h3> Your Final Score is: <b> <?php echo $_SESSION['score']; ?>/10</b></h3>

<?php
$uid =  $_SESSION['userid'];
//echo "user id is $uid";
//echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];

//echo "You scored $score/10 in  $math_lesson";

$difficulty_level = $_SESSION['difficulty_level'];
//echo  "the difficulty_level is $difficulty_level";

//echo "$time";
//echo "<br>";
//if (isset($_POST['submit'])){
//}

	$db = mysqli_connect("localhost", "root", "" , "logintest");

//$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, sc_time_start, sc_time) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$start_time' ,'$time')";
//$result = mysqli_query($db, $sql);
 //header("Location: finish.php");







$sql2 = "SELECT * FROM quiz_scores where uid= '{$_SESSION['userid']}' ORDER BY sc_time DESC LIMIT 1";
  $result2 = mysqli_query($db, $sql2);
if (!$row = mysqli_fetch_assoc($result2)){


      header("Location: final.php?error=real test");


}
   $first_time = $row['sc_time'];
    $start_time = $row['sc_time_start'];
//echo $first_time;

?>

<?php
/*echo "<br>";
echo   $_SESSION['math_section_1'];
echo "<br>";
echo   $_SESSION['math_section_2'];
echo "<br>";
echo   $_SESSION['math_section_3'];
echo "<br>";
echo   $_SESSION['math_section_4'];*/

//this is the time you finished
$time1 = new DateTime($first_time );
//this is the time you started the quiz
$time2 = new DateTime($start_time);



$interval =  $time1->diff($time2);
$ok = $interval->format(" %i minutes %s seconds");
?>
<h4> You spent in total <strong><?php echo $ok; ?></strong> doing the quiz.</h4>

<?php
if( $_SESSION['score'] <=4){
?>  <div class="alert alert-success alert-dismissable">
  <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Notice!</strong> Based on your score we recommend you go back to <a href="back_to_exercises.php?update=dynamic"> Algebra lesson </a>.
  </div>
  <?php
}
if( $_SESSION['score'] >=7){
?>  <div class="alert alert-success alert-dismissable">
  <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Notice!</strong> Based on your score we recommend you change some of the user settings
  </div>
  <?php
}

?>





<?php
$query = "SELECT * from dynamic_settings
WHERE uid ='{$_SESSION['userid']}' ";
$result = mysqli_query($db, $query);
?>

<br>


  <?php    while($row = mysqli_fetch_array($result)) {?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h4>Personalise your user settings</h4></div>
  <form action="feedback.php" method="post">
   <div class="checkbox"><input type="checkbox" name="check_list[]" value="<?php echo $row[1]?>" <?php if ($row[1] == 'text_hint_Y') echo "checked='checked'";?> > Enable Text Hints</div>
 <div class="checkbox">  <input type="checkbox" name="check_list[]" value="<?php echo $row[3]?>" <?php if ($row[3] == 'add_questions_Y') echo "checked='checked'";?>> More Questions</div>
 <div class="checkbox">  <input type="checkbox" name="check_list[]" value="<?php echo $row[4]?>" <?php if ($row[4] == 'add_answers_Y') echo "checked='checked'";?>> More Possible Answer choices</div>
<!--  <input type="submit"  name="feedback_button">-->
  <button type="submit" class="btn btn-primary btn-s" name="feedback_button"> SUBMIT </button>
  </form>
</div>

     <?php }


     $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   if (strpos($url, 'notice=update') !== false){
     //$ok= "Fill out all the fields!";
   ?>
   <div class="alert alert-success alert-dismissable">
   <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
   <strong>Update!</strong> You have changed your user settings.
   </div>
   <?php

   }
?>




     <table class="table table-condensed table-bordered table-hover">
        <thead>
          <tr>

              <th><h5><strong>Your Answers</strong></h5></th>
               <th><h5><strong>Correct Answers</strong></h5></th>

          </tr>
        </thead>
<?php

for ($x = 1; $x <= 10; $x++) {
echo  "<strong>";
?>
<tbody>
    <?php if($_SESSION['your'.$x] == $_SESSION['correct'.$x]){
  ?>  <tr  class="success"><?php
}?>
<?php if($_SESSION['your'.$x] != $_SESSION['correct'.$x]){
?>  <tr  class="danger"><?php
}?>

     <td> <?php echo "<strong>".$_SESSION['your'.$x], "</strong> is the answer you picked"; ?> </td>



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


  <div class="panel-body"><a href="back_to_exercises.php?update=back">back to exercises </a></div>








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
  <div class="container-fluid text-center" id="foot01">

 </div>
  </footer>


  <script src="../year.js"></script>
</div>

</body>
</html>
