<?php

session_start();
if
 ($_SESSION['theme'] == 'Light') {
    include 'home_header.php';
  }
  else {
      include 'home_header_dark.php';
  }


	$connection = mysqli_connect("localhost", "root", "" , "logintest");

//fetch table rows from mysql db
//$sql = "select * from users";  //in my case it would be users
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' ";
$result = mysqli_query($connection, $sql) or die("Error in Selecting" . mysqli_error($connection));



//create an array
$rows = array();

$flag = true;
$table= array();
$table['cols'] = array(

//labels for your chart, these represent the column titles
//Note that one column is in "string" format and another one is " number format as pie only"




  array ('label' => 'Startup', 'type' => 'string'),
//  array('label' => 'Ok', 'type' => 'string'),
  array('label' => 'Users', 'type' => 'number')

);


    $rows = array();
    while($r =mysqli_fetch_assoc($result))
    {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['math_lesson']);
//   $temp[] = array('x' => (string) $r['uid']);
    // Values of each slice
    $temp[] = array('v' => (int) $r['score']);
    $rows[] = array('c' => $temp);
    }

  $table['rows'] = $rows;
   $jsonTable = json_encode($table);

?>



<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'An example of a pie chart for testing. ',
          is3D: 'true',
          width: 1200,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
//      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));

      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->

<div id="columnchart_material"></div>

  </body>
</html>