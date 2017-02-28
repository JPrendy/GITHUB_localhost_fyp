

<?php
session_start();

    include '../home_header.php';

?>



<?php



	$db = mysqli_connect("localhost", "root", "" , "logintest");
$lesson  = "Algebra";

//echo "$lesson</br>";


$sql3 = "SELECT * from math_section WHERE uid='{$_SESSION['userid']}' and math_lesson='algebra' ORDER BY sc_time desc";

$result3 = mysqli_query($db, $sql3);

if (!$row = mysqli_fetch_assoc($result3)){

echo "Your username or password is incorrect!";
    header("Location: ../login_page.php?error=empty1");


}

$math_section_1 = $row['math_section_1'];
echo $math_section_1;
$math_section_2 = $row['math_section_2'];
echo $math_section_2;
$math_section_3 = $row['math_section_3'];
echo $math_section_3;
$math_section_4 = $row['math_section_4'];
echo $math_section_4;





//$update_l = "UPDATE lessons_visited set topic_visited='$increment' where uid='{$_SESSION['userid']}'";

$sql2 = "UPDATE lessons set lesson_type='$lesson' where uid='{$_SESSION['userid']}'";
//echo "$sql2";

if ($db->query($sql2) === TRUE) {
  //  echo "<br></br>";
  //  echo "Record Updated successfully";
}
else {
  //  echo "Error deleting record: " . $db->error;
}


$_SESSION['lesson'] = $lesson;

 ?>

 <div class="container-fluid text-center">
     <div class="row content">
     <div class="col-sm-9 text-centre">



<!--http://www.w3schools.com/bootstrap/bootstrap_tabs_pills.asp-->


    <h2>Dynamic Pills</h2>
    <p>To make the tabs toggleable, add the data-toggle="pill" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>
    <ul class="nav nav-pills">
      <li class="active" ><a data-toggle="pill" href="#home">Text</a></li>
      <li ><a data-toggle="pill" href="#menu1">Video</a></li>


    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h3>Algebra Lesson </h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

        Part 1:

        introduction to algebra

        Part 2:

        Common Factors


        Part 3:

        Quadratic factors

        Part 4:

        Multiply binomials by polynomals


        <p>Welcome to my e-learning application. The concept behind my application is to help how you acquire and learn new knowledge. I hope that by using this Web Application you will notice will improvement on your knowledge on the topics I touch on im my application  </p>
        <hr>
        <h3>Section 3.  Quadratic Factors</h3>
        <?php
        if($math_section_1 == 4){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in Quadratic Factors, we recommend you look over this section.
        </div>
      <?php } ?>

      </div>
      <div id="menu1" class="tab-pane fade">
        <h3>Algebra Lesson</h3>
        <p>
        <div class="col-md-8">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/wv6REdgLUZ0?autohide=0"
          ></iframe>
          </div>
        </div>
      </p>
      </div>


    </div>
  </div>













<br>
<br>

Here we will go through the content of our topic
Algebra


<a href="..\exercises\quiz.php"> here to test algebra </a>
</div>
</div>
</div>

 </body>
 </html>
