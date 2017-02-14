<?php
session_start();





$db = mysqli_connect("localhost", "root", "" , "logintest");


//NOW HERE IS WHERE WE IMPLEMENTED THE BUTTON FOR THEME
  if (isset($_POST['theme_button'])){


    $theme = mysql_real_escape_string($_POST['theme']);

  // $theme = $_POST['theme'];






      $sql3 = "Select * from theme WHERE uid='{$_SESSION['userid']}'";
      $result3 = mysqli_query($db, $sql3);

      echo $sql3;

          if (!$row = mysqli_fetch_assoc($result3)){

            echo "Your username or password is incorrect!";
      //this COULD BE SOMETHING TO LOOK BACK
      //      IT BRINGS THE LOCATION TO INDEX
              //  header("Location: ../index.php?error=real test");


          }
          //if



        $sql3 = "update theme set theme_col='$theme' where uid='{$_SESSION['userid']}'";
      echo "$sql3";



      if ($db->query($sql3) === TRUE) {
            echo "<br></br>";
            echo "Record Updated successfully";
            $_SESSION['theme'] = $theme;
          //  header("Refresh:0");


        //  header("Location: http://localhost/github_localhost_fyp/settings.php");
            header("Location: settings.php");



  } else {
    echo "Error deleting record: " . $db->error;
  }
    }


 ?>
