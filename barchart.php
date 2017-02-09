
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
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script type="text/javascript">
 google.load('visualization', '1', {packages: ['corechart', 'bar']});
 google.setOnLoadCallback(drawMaterial);

 function drawMaterial() {
 var data = google.visualization.arrayToDataTable([
 ['Country', 'New Visitors', 'Returned Visitors'],
 <?php
 $db = mysqli_connect("localhost", "root","", "logintest");


 if (!$db) {
 	die("Connection failed: ". mysqli_connect_error());

 }


 $query = "SELECT *  FROM quiz_scores where math_lesson='trignometry' and uid ='{$_SESSION['userid']}'";
echo $query;

 $exec = mysqli_query($db,$query);

 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['math_lesson']."',";
 $query2 = "SELECT *  FROM quiz_scores where math_lesson='algebra' and uid ='{$_SESSION['userid']}'";
 $exec2 = mysqli_query($db,$query2);
 $row2 = mysqli_fetch_assoc($exec2);

 echo $row2['math_lesson'];



 $rvisits =  $row2['math_lesson'];

 echo ",".$rvisits."],";
 }
 ?>
 ]);

 var options = {

 title: 'Country wise new and returned visitors',

 bars: 'horizontal'
 };
 var material = new google.charts.Bar(document.getElementById('barchart'));
 material.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Bar Chart</h3>
 <div id="barchart" style="width: 900px; height: 500px;"></div>
</body>
</html>
