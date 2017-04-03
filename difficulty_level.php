<?php

   session_start();

$db = mysqli_connect("localhost", "root","", "logintest");


if (!$db) {
	die("Connection failed: ". mysqli_connect_error());

}




  $sql = "SELECT SUM(score) as TEST, SUM(blank) as ALL_BLANK,  SUM(time_completed) as TIMECOMPLETED, COUNT(math_lesson) as MATH FROM quiz_scores WHERE uid='{$_SESSION['userid']}'";
	$result = mysqli_query($db, $sql);



  		if (!$row = mysqli_fetch_assoc($result)){

  		  echo "Your username or password is incorrect!";
            header("Location: ../home.php?error=real test");


  		}


      $sc = "SELECT *  From
(select * from quiz_scores where  uid = '{$_SESSION['userid']}' ORDER BY sc_time  DESC LIMIT 2) AS name
ORDER BY sc_time LIMIT 1";

   $sc2 = "SELECT * FROM quiz_scores where  uid = '{$_SESSION['userid']}' order by sc_time DESC LIMIT 1";
    	$score_result = mysqli_query($db, $sc);
      $score_result2 = mysqli_query($db, $sc2);
      if (!$row2 = mysqli_fetch_array($score_result)){

   		  echo "Your username or password is incorrect!";
             header("Location: ../home.php?error=real test");


   		}
      if (!$row3 = mysqli_fetch_array($score_result2)){

        echo "Your username or password is incorrect!";
             header("Location: ../home.php?error=real test");


      }



  $sum = $row['TEST'];
  $blank = $row['ALL_BLANK'];
  $count = $row['MATH'];
  $timeco = $row['TIMECOMPLETED'];

  echo "the total blank equals ........ $blank";

if($row2[6] != null){
  $time1 =  new DateTime($row2[7]);
}

  $time2 =  new DateTime($row3[7]);
//$ok = "SELECT TIMEDIFF('$time2', '$time1')";
  //$ok2= mysqli_query($db, $ok);
  //if (!$row4 = mysqli_fetch_assoc($ok)){

    //echo "Your username or password is incorrect!";
      //   header("Location: ../home.php?error=real test");


  //}

//$test = $row4[0];

//$interval = date_diff($time1, $time2);
//echo $interval->format('%R%a days');


//  echo $time1;
  //echo "</br>";
  //echo $time2;
  //echo"</br>";
  //echo $ok;

  $interval =  $time2->diff($time1);


  $ok = $interval->format(" %i minutes %s seconds");
$test =  $interval->format(" 2 minutes 0 seconds");

echo $test;

  if($ok > 1.0)
  {
      echo "<br>";
    echo "yes";
  }

  echo "<br>";
echo "the time between the last two quizzes were ".$ok;

echo "<br>";


  echo "the user has a total sum score of $sum";
  echo "<br>";
    echo "<br>";
  //so this will bring the current users complete score
  //NEXT WE HAVE TO GET THE NUMBER OF QUIZES

  echo "in over $count tests";

  $average = $sum/$count;
  $average_blank = $blank/$count;
  $average_time =   $timeco/$count;

echo "<br>";
  echo "the blank is $average_blank";


  echo "<br>";
    echo "<br>";
  echo "The user's average score is $average" ;
  $_SESSION['average_score'] =   $average;
    $update = "UPDATE  users  SET average_score =   $average, average_blank =   $average_blank, average_time = $average_time WHERE uid='{$_SESSION['userid']}'";
          $success = mysqli_query($db, $update);
  //this retrieves the users average score with this knowledge, the difficulty_levels will either go down or up
  //depending on this average.
//$float_average = floatval($average);
  //echo "The user's gloat average score is $float_average" ;
//will need to get the current dynamic_level in order to uodate it

  $sql_user = "SELECT * FROM users WHERE uid='{$_SESSION['userid']}'";
	$result_users = mysqli_query($db, $sql_user);



  		if (!$row = mysqli_fetch_assoc($result_users)){

  		  echo "Your username or password is incorrect!";
            header("Location: ../index.php?error=real test");


  		}

  $dynamic_level = $row['difficulty_level'];

echo "<br>";
echo "<br>";
echo "this is before the difficulty_level was changed ".$dynamic_level;



 if($ok < 0.0)
  {
    $dynamic_level = 1;
    echo "default";
    $update_sql_user = "UPDATE  users  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
  //  $update_sql_user2 = "UPDATE  quiz_scores  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
      $result_update_users = mysqli_query($db, $update_sql_user);
  }




//THIS CHECKS TO SEE IF THE TIME YOU DID THE LAST TWO TESTS WERE GREATER THAN TWO MINUTES BEFORE THE dynamic_level
//IS IMPLEMENTED
//if($ok >= $interval->format("2 minutes 0 seconds"))
if($ok >= 1.0)
{
if(($average >= 7.0) && ($dynamic_level <= 2 )){
  $dynamic_level +=1;
  //  $sql = "Update  WHERE uid='{$_SESSION['userid']}'";
    $update_sql_user = "UPDATE  users  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
        $update_average_user = "UPDATE  users  SET greatnest = 'Y' WHERE uid='{$_SESSION['userid']}'";




$query = "SELECT * from users where uid='{$_SESSION['userid']}'";
echo $query;
$results = mysqli_query($db, $query);

if (!$row = mysqli_fetch_assoc($results)){

  echo "Your username or password is incorrect!";
      header("Location: ../home.php?error=empty2");


}
$_SESSION['greatnest'] = $row['greatnest'];
echo  $_SESSION['greatnest'];



  //  $update_sql_user2 = "UPDATE  quiz_scores  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
      $update_average_users = mysqli_query($db, $update_average_user);
    	$result_update_users = mysqli_query($db, $update_sql_user);
    //  $result_update_users2 = mysqli_query($db, $update_sql_user2);
    echo $dynamic_level;
}

if(($average <= 5.0) && ($dynamic_level >=0)){
  $dynamic_level -=1;
    $update_sql_userdown = "UPDATE  users  SET difficulty_level=   $dynamic_level WHERE uid='{$_SESSION['userid']}'";
        	$result_update_users2 = mysqli_query($db, $update_sql_userdown);
    //$sql = "SELECT SUM(score) as TEST, COUNT(math_lesson) as MATH FROM quiz_scores WHERE uid='{$_SESSION['userid']}'";
    echo $dynamic_level;
}
}

 $_SESSION['difficulty_level'] = $dynamic_level;
?>
