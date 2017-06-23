<?php
// Array with names

session_start();

//connect to databases
include 'dbh.php';

#$db = mysqli_connect("localhost", "root", "" , "logintest");
$sql = "SELECT * from users Limit 100";
$result = mysqli_query($db, $sql);

if (!$row = mysqli_fetch_assoc($result)){

  echo "Your username or password is incorrect!";
      header("Location: ../login_page.php?error=empty1");


}


 while($row =$result->fetch_assoc()):
$a[] =  $row['uid'];


    endwhile;

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
