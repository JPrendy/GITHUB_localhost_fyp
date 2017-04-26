

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

//echo "You currently haven't done a quiz!";
//    header("Location: ../login_page.php?error=empty1");
$math_section_1 =1;
$math_section_2 =1;
$math_section_3 =1;
$math_section_4 =1;

}
else{
$math_section_1 = $row['math_section_1'];
//echo $math_section_1;
$math_section_2 = $row['math_section_2'];
//echo $math_section_2;
$math_section_3 = $row['math_section_3'];
//echo $math_section_3;
$math_section_4 = $row['math_section_4'];
//echo $math_section_4;
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
      <li class="active" ><a data-toggle="pill" href="#home">Display in Text</a></li>
      <li ><a data-toggle="pill" href="#menu1">Display in Video</a></li>


    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
<br/>
        <ul id="panel" class=" text-left">

          <li><a href="#section1">1. Introduction to Algebra </a><?php   if($math_section_1 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>
          <li><a href="#section2">2. Common Factors</a><?php   if($math_section_2 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>
          <li><a href="#section3">3. Quadratic Factors</a><?php   if($math_section_3 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>
          <li><a href="#section4">4. Multiply Binomials by Polynomals</a><?php   if($math_section_4 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>



        </ul>


         <a id="section1"></a>
<hr>
        <h3><b><u>Section 1. Introduction to Algebra  </b></u></h3>  <button id="math12" class='btn btn-primary btn-md'>Show/Hide material</button>

        <?php
        if($math_section_1 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Introduction to Algebra questions, we recommend you look over this section.
        </div>
      <?php }



    	$db = mysqli_connect("localhost", "root", "" , "logintest");
      $sql = "SELECT * from lesson_information";
      $result = mysqli_query($db, $sql);


      if (!$row = mysqli_fetch_assoc($result)){

        echo "Your username or password is incorrect!";
            header("Location: ../home.php?error=empty1");


      }


        	$lesson_one = $row['info_1'];
          	$lesson_two = $row['info_2'];
            $lesson_three = $row['info_3'];
              $lesson_four = $row['info_4'];
      ?>
      <div id="math1">
<?php echo $lesson_one; ?>
</div>


 <a id="section2"></a>
        <hr>
        <h3><b><u>Section 2. Common Factors</b></u></h3>  <button id="math22" class='btn btn-primary btn-md'>Show/Hide material</button>
        <?php
        if($math_section_2 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Common Factors questions, we recommend you look over this section.
        </div>
      <?php } ?>
            <div id="math2">
<?php echo $lesson_two; ?>
</div>
 <a id="section3"></a>
        <hr>
        <h3><b><u>Section 3. Quadratic Factors</b></u></h3>  <button id="math32" class='btn btn-primary btn-md'>Show/Hide material</button>
        <?php
        if($math_section_3 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Quadratic Factors questions, we recommend you look over this section.
        </div>
      <?php } ?>
        <div id="math3">
  <?php echo $lesson_three; ?>
</div>

 <a id="section4"></a>
        <hr>
        <h3><b><u>Section 4. Multiply Binomials by Polynomals</b></u></h3><button id="math52" class='btn btn-primary btn-md'>Show/Hide material</button>
        <?php
        if($math_section_4 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in Multiply Binomals by Polynomals, we recommend you look over this section.
        </div>
      <?php } ?>
        <div id="math5">
        <?php echo $lesson_four; ?>
</div>

      </div>
      <div id="menu1" class="tab-pane fade">
        <br/>
        <ul id="panel" class=" text-left">

          <li><a href="#sectionv1">1. Introduction to Algebra </a><?php   if($math_section_1 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>
          <li><a href="#sectionv2">2. Common Factors</a><?php   if($math_section_2 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>
          <li><a href="#sectionv3">3. Quadratic Factors</a><?php   if($math_section_3 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>
          <li><a href="#sectionv4">4. Multiply Binomials by Polynomals</a><?php   if($math_section_4 == 0){   ?>    <span class="glyphicon glyphicon-exclamation-sign red"></span> <?php } ?></li>



        </ul>

         <a id="sectionv1"></a>
        <hr>

          <h3><b><u>Section 1. Introduction to Algebra  </b></u></h3>

          <?php
          if($math_section_1 == 0){?>
          <div class="alert alert-danger alert-dismissable">
          <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Warning!</strong> In your last test you scored zero in the Introduction to Algebra questions, we recommend you look over this section.
          </div>
        <?php }?>

          <div >
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8dLYcWRrA9Y?autohide=0"
            ></iframe>
            </div>
          </div>



           <a id="sectionv2"></a>
          <hr>
          <h3><b><u>Section 2. Common Factors</b></u></h3>
          <?php
          if($math_section_2 == 0){?>
          <div class="alert alert-danger alert-dismissable">
          <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Warning!</strong> In your last test you scored zero in the Common Factors questions, we recommend you look over this section.
          </div>
        <?php } ?>
          <div >
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/BRcTEqQAbvo?autohide=0"
            ></iframe>
            </div>
          </div>

           <a id="sectionv3"></a>
          <hr>
          <h3><b><u>Section 3. Quadratic Factors</b></u></h3>
          <?php
          if($math_section_3 == 0){?>
          <div class="alert alert-danger alert-dismissable">
          <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
          <strong>Warning!</strong> In your last test you scored zero in the Quadratic Factors questions, we recommend you look over this section.
          </div>
        <?php } ?>
        <div >
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/doZ8XLG4DNQ?autohide=0"
          ></iframe>
          </div>
        </div>


  <div >

     <a id="sectionv4"></a>
      <hr>
<h3><b><u>Section 4. Multiply Binomials by Polynomals</b></u></h3>
<?php
if($math_section_4 == 0){?>
<div class="alert alert-danger alert-dismissable">
<a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
<strong>Warning!</strong> In your last test you scored zero in Multiply Binomals by Polynomals, we recommend you look over this section.
</div>
<?php } ?>


          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/CelfT1nAjWM?autohide=0"
          ></iframe>
          </div>
        </div>
      </p>
      </div>



      <br>
          <hr>
      <h5>Press the button below in order to test your knowledge in Algebra</h5>
        <?php echo "<button class='btn btn-default btn-md'> <a href='../exercises/question.php?n=1&m=Algebra'>Algebra Quiz </a></button>";?>

</div>
</div>
    </div>
  </div>






<br>
<script>
$(document).ready(function(){
    $("#math12").click(function(){
        $("#math1").toggle();
    });
});

$(document).ready(function(){
    $("#math22").click(function(){
        $("#math2").toggle();
    });
});

$(document).ready(function(){
    $("#math32").click(function(){
        $("#math3").toggle();
    });
});


$(document).ready(function(){
    $("#math52").click(function(){
        $("#math5").toggle();
    });
});
</script>

<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="../year.js"></script>


 </body>
 </html>
