

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

echo "You currently haven't done a quiz!";
//    header("Location: ../login_page.php?error=empty1");
$math_section_1 =1;
$math_section_2 =1;
$math_section_3 =1;
$math_section_4 =1;

}
else{
$math_section_1 = $row['math_section_1'];
echo $math_section_1;
$math_section_2 = $row['math_section_2'];
echo $math_section_2;
$math_section_3 = $row['math_section_3'];
echo $math_section_3;
$math_section_4 = $row['math_section_4'];
echo $math_section_4;
}




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


    <h2>Algebra Lesson</h2>

    <?php      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, 'error=session') !== false){
          //$ok= "Fill out all the fields!";
        ?>
        <div class="alert alert-success alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Update</strong> You can now access the rest of the web application. Feel free to navigate around.
        </div>
        <?php

        }
    ?>

    <ul class="nav nav-pills">
      <li class="active" ><a data-toggle="pill" href="#home">Text</a></li>
      <li ><a data-toggle="pill" href="#menu1">Video</a></li>


    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">


        <h3>Section 1. Introduction to Algebra</h3>
        <?php
        if($math_section_1 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Introduction to Algebra questions, we recommend you look over this section.
        </div>
      <?php } ?>
          <h3 id= left> quuuuuuuuuuuuuuu </h3>
dddddddddddddddddddd
        <hr>
        <h3>Section 2. Common Factors</h3>
        <?php
        if($math_section_2 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Common Factors questions, we recommend you look over this section.
        </div>
      <?php } ?>
      <h4 id= left> Common Factors involve finding what to multiply together to get an expression. So, it is like "separating" an expressing into a multiplication of simple expressions.  </h4>
      <h4 id= left>If we take the example: Factor <b>4x + 16</b>. </h4>
<br/>
    <h4 id= left>  You will see that both 4x and 16 have a common factor of <b> 4</b>.</h4>
      <h4><li id= left>   4x is 4 * x </li></h4>
        <h4><li id= left> 16 is 4 * 4 </li></h4>
<br/>
        <h4 id= left>  With this knowledge, you can factor the whole expression into: </h4>

    <h4><b>    4x + 16 = 4(x + 4) </b></h4>
<br/>
  <h4 id= left>  So, 4x + 16 has been solved by using the common factor of the expression, which was <b>4</b> to give us the expression of
  <b>4(x + 4)</b> </h4>
  <br/>

  For a more complex expression we may need to look for the <b>highest common factor</b>

        <hr>
        <h3>Section 3. Quadratic Factors</h3>
        <?php
        if($math_section_3 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Quadratic Factors questions, we recommend you look over this section.
        </div>
      <?php } ?>
        <p> quuuuuuuuuuuuuuu </p>

        <hr>
        <h3>Section 4. Multiply Binomials by Polynomals</h3>
        <?php
        if($math_section_4 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in Multiply Binomals by Polynomals, we recommend you look over this section.
        </div>
      <?php } ?>
        <p> quuuuuuuuuuuuuuu </p>



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


      <br>
      <br>
          <hr>
      <h4>Press the button below in order to test your knowledge in Algebra</h4>
        <?php echo "<button class='btn btn-default btn-md'> <a href='../exercises/question.php?n=1&m=Algebra'>Algebra Quiz </a></button>";?>

</div>
</div>
    </div>
  </div>






<br>


<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="../year.js"></script>


 </body>
 </html>
