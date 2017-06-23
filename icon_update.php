<?php
session_start();

  //  include 'home_header.php';

  ?>
<?php
   //Set question Number
 $number = (int) $_GET['n'];  //gets the number at the top of the url we


echo "wow";
echo "<br>";
echo $number;
$_SESSION['icon'] = $number;

include 'dbh.php';

#$db = mysqli_connect("localhost", "root", "" , "logintest");


  $sql = "update icons set icon_type='$number' where uid='{$_SESSION['userid']}'";


  if ($db->query($sql) === TRUE) {
        echo "<br></br>";
        echo "Record Updated successfully";
          header("Location: change_icon.php");
} else {
echo "Error deleting record: " . $db->error;
}






  ?>
