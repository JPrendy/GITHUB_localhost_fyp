<?php
 include 'database.php';
session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include '..\home_header.php';
  }
  else {
      include '..\home_header_dark.php';
  }
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
<h2> You're Done!</h2>
<p> Congrats! You have completed the test </p>
<p> Final Score:  <?php echo $_SESSION['score']; ?></p>

<?php
$uid =  $_SESSION['userid'];
echo "user id is $uid";
echo "<pre>";
$math_lesson =  $_SESSION['math_lesson'];
echo "the math lesson is $math_lesson";
$score = $_SESSION['score'];
echo "<pre>";
echo "The final score was $score";

$difficulty_level = $_SESSION['difficulty_level'];
echo  "the difficulty_level is $difficulty_level";
date_default_timezone_set('UTC');
echo "The time is " . date("h:i:sa");
//$time = date("h:i:sa");
//echo "$time";
echo "Today is " .  date("Y-m-d H:i:s") . "<br>";
$time = date("Y-m-d H:i:s");
echo "$time";
echo "<br>";



	$db = mysqli_connect("localhost", "root", "" , "logintest");

$sql = "insert into quiz_scores(uid, math_lesson, score, difficulty_level, sc_time) VALUES ('$uid', '$math_lesson', '$score', '$difficulty_level', '$time')";
mysqli_query($db, $sql);



#  $ok = $_SESSION["lesson2"];

for ($x = 1; $x <= 2; $x++) {
echo $_SESSION['lesson'.$x]," is the answer you picked";
echo "<br>";
}

echo "<br>";

for ($x = 1; $x <= 2; $x++) {
echo  "<strong>";
echo $_SESSION['your'.$x], "</strong> is the answer you picked";

echo "<br>";
}

echo "<br>";

for ($x = 1; $x <= 2; $x++) {
echo  "<strong>";
echo $_SESSION['correct'.$x],"</strong> is the correct answer";
echo "<br>";
}


#  echo "$ok";

?>


  <div class="panel-body"><a href="back_to_exercises.php">back to exercises </a></div>


<?php
///$query = "SELECT * from dynamic_settings
///WHERE uid ='{$_SESSION['userid']}' order by RAND()";
$query = "SELECT * from dynamic_settings
WHERE uid ='{$_SESSION['userid']}' ";
echo $query;
$result = mysqli_query($db, $query);



?>




<h2>  Feedback  </h2>

  <?php    while($row = mysqli_fetch_array($result)) {?>
  <form action="final.php" method="post">
  <input type="checkbox" name="check_list[]" value="<?php $row[2]?>" <?php if ($row[2] == 'text_hint_Y') echo "checked='checked'";?> > Text Hints
  <input type="checkbox" name="check_list[]" value="value 2">
  <input type="checkbox" name="check_list[]" value="value 3">
  <input type="checkbox" name="check_list[]" value="value 4">
  <input type="submit" />
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

    $aDoor = $_POST['check_list'];
    if(empty($aDoor))
    {
      echo("You didn't select any buildings.");
    }
    else
    {
      $N = count($aDoor);
      $test_text_hint = 0;
      echo("You selected $N door(s): ");
      for($i=0; $i < $N; $i++)
      {
        echo($aDoor[$i] . " ");
        if($aDoor[$i] ==  'text_hint_N'){
          //update

            $test_text_hint =1;
            $sql2 = "update dynamic_settings set text_hint='text_hint_Y' where uid='{$_SESSION['userid']}'";
          echo "$sql2";

          if ($db->query($sql2) === TRUE) {
                echo "<br></br>";
                echo "Record Updated successfully";

    } else {
        echo "Error deleting record: " . $db->error;
    }
        }
        //THIS WILL SOLVE THE FOR LOOP METHOD WHERE MORE THAN ONE VALUE IS SELECTED
        if($test_text_hint != 1){
          $sql2 = "update dynamic_settings set text_hint='text_hint_N' where uid='{$_SESSION['userid']}'";
        echo "$sql2";
        if ($db->query($sql2) === TRUE) {
              echo "<br></br>";
  } else {
      echo "Error deleting record: " . $db->error;
  }
        }
      }
//THIS WILL UPDATE THE SESSION FOR TEXT_HINT SO THAT IT WILL CHANGE IF THE CHECKBOX IS NOT SELECTED OR NOT
///////////THIS REQUIRED USE OF A SELECT STATEMENT WITHOUT IT A BOOLEAN AREA OCCURS
$sql_session = "SELECT * FROM dynamic_settings  where uid='{$_SESSION['userid']}'";
$result_session = mysqli_query($db, $sql_session);
$row_session = mysqli_fetch_assoc($result_session);
$_SESSION['text_hint'] =  $row_session['text_hint'];
    }

  ?>



</div>
</main>
<footer>
  <div class="container">
   Copyrght & copy whatever
 </div>
  </footer>

</body>
</html>
