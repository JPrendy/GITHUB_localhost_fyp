<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = strval($_GET['q']);  //this is important as normally is it carried over as an int
//$l = strval($_GET['l']);  //this is important as normally is it carried over as an int


$con = mysqli_connect('localhost','root','','logintest');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"quiz_scores");
$sql="SELECT * FROM quiz_scores WHERE uid = '{$_SESSION['userid']}' and math_lesson = '".$q."'";
$result = mysqli_query($con,$sql);

echo "$sql";
echo "<table>
<tr>

<th>Math Lesson</th>
<th>Score</th>
<th>Difficulty Level</th>
<th>Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";

  //  echo "<td>" . $row['uid'] . "</td>";
    echo "<td>" . $row['math_lesson'] . "</td>";
      echo "<td>" . $row['score'] . "</td>";
          echo "<td>" . $row['difficulty_level'] . "</td>";
              echo "<td>" . $row['sc_time'] . "</td>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
