<?php

session_start();




	$db = mysqli_connect("localhost", "root", "" , "logintest");

if ( isset($_POST['Score_btn']) ) {
$limit = mysql_real_escape_string($_POST['limit']);
$type = mysql_real_escape_string($_POST['type']);
$chart = mysql_real_escape_string($_POST['chart']);
$order = mysql_real_escape_string($_POST['order']);
//echo $chart;
//fetch table rows from mysql db
//$sql = "select * from users";  //in my case it would be users
$_SESSION['limit_ch'] = 	$limit;
$_SESSION['type_ch'] = 	$type;
$_SESSION['chart_ch'] = 	$chart;
$_SESSION['order_ch'] = 	$order;

}

  include 'home_header.php';

$per_page=$_SESSION['limit_ch'];
if (isset($_GET["page"])) {

$page = $_GET["page"];

}

else {

$page=1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit




$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' ORDER BY sc_time {$_SESSION['order_ch']} LIMIT $start_from, $per_page ";
$result = mysqli_query($db, $sql);




	//$math_id = $row['math_id'];



//create an array
$rows = array();

$flag = true;
$table= array();
$table['cols'] = array(

//labels for your chart, these represent the column titles
//Note that one column is in "string" format and another one is " number format as pie only"



  array ('label' => 'Startup', 'type' => 'string'),

//  array('label' => 'Ok', 'type' => 'string'),
  array('label' => 'Quiz Scores', 'type' => 'number'),
  array('label' => 'No. of questions you did not answer', 'type' => 'number'),
  //  array('label' => 'Math ID', 'type' => 'number'),

  array('label' => 'Difficulty Level', 'type' => 'number')
);


    $rows = array();
    while($r =mysqli_fetch_assoc($result))
    {
    $temp = array();
    // the following line will be used to slice the Pie chart
    //can also make this SC_TIME






    $temp[] = array('v' => (string) $r[$_SESSION['type_ch']]);

//   $temp[] = array('x' => (string) $r['uid']);
    // Values of each slice
    $temp[] = array('v' => (int) $r['score']);
    $temp[] = array('v' => (int) $r['blank']);
    //    $temp[] = array('v' => (int) $r['math_id']);
    $temp[] = array('v' => (string) $r['difficulty_level']);
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
           title: 'Quiz Results displayed in a <?php echo $_SESSION['chart_ch']; ?>.',
          is3D: 'true',




        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
//      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    var chart = new google.visualization.<?php echo $_SESSION['chart_ch']; ?>(document.getElementById("columnchart_material"));

      chart.draw(data, options);
    }
    </script>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <div class="container-fluid text-center">
    <div class="col-sm-9 text-centre">
      <h1>Charts</h1>





    <!-- <div class="container"> -->
      <div class="row">
<div id="columnchart_material"></div>

<?php
$sql = "SELECT * FROM  quiz_scores Where uid = '{$_SESSION['userid']}' ORDER BY sc_time {$_SESSION['order_ch']} ";
    $result = mysqli_query($db, $sql);

    // Count the total records
    $total_records = mysqli_num_rows($result);

    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);

    //Going to first page
    echo "<center><button class='btn btn-default btn-md'> <a href='ColumnChart_test.php?page=1'>".'First Page'."</a></button> ";

    for ($i=1; $i<=$total_pages; $i++) {

    echo "<a id=length href='ColumnChart_test.php?page=".$i."'>".$i."</a> ";
    };
    // Going to last page
    echo "<button class='btn btn-default btn-md'> <a href='ColumnChart_test.php?page=$total_pages'>".'Last Page'."</a></center></button ";


?>
</div>
</div>
</div>
</div>

<br>

<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>



  </body>
</html>
