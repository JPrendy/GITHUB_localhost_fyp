<?php
session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include 'home_header.php';
  }
  else {
      include 'home_header_dark.php';
  }
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

$con = mysqli_connect('localhost','root','','logintest');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"quiz_scores");
$sql="SELECT * FROM quiz_scores WHERE math_lesson = '".$q."'";
$result = mysqli_query($con,$sql);

echo "$sql";
echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['uid'] . "</td>";

}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
