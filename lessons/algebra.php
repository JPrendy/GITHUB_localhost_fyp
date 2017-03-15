

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


        <h3><b><u>Section 1. Introduction to Algebra  </b></u></h3>  <button id="math12" class='btn btn-primary btn-md'>Show/Hide material</button>

        <?php
        if($math_section_1 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in the Introduction to Algebra questions, we recommend you look over this section.
        </div>
      <?php } ?>
      <div id="math1">
      <h4 id= left> Let's say we are trying to find the missing number to the below expression </h4>
  <h4 id= left>   10  -  [ ] =  7</h4>
</br>
   <h4 id= left>So, the anwers would be <b>3</b>. Since, 10 - 3 = 7.</h4>
</br>
   <h4 id= left> In Algebra, we don't use blank boxes we use <b>letters</b>(usually an x or y, but you can use any letter). So if took the last example
     and rewrote it with the letter: <b> x </b></h4>
  <h4 id= left>   10  -  <b>x</b> =  7</h4>
</br>
  <h4 id= left> With the addition of the letter <b> x</b> it asks to find what the letter <b>x</b> stands for. When we bring over <b>10</b> to the right side we get 10 - 7. This gives us -3.
      <h4 id= left>So, we are left with -x = -3. When we get rid of the - on both sides we are left with our answer.</h4>
      </br>
  <h4 ><b> x = 3 </b></h4>
<br/>
  <h4 id= left> Another example we could look at  is finding the greatest value with the letter <b>x.</b> For example, if we had a question that asked
    <b>Find the value of x for which the expression 2 + 3x + 4x has the greatest value.</b>

  <h4 id= left>    If we are given choices such as </h4>
  <h4><li id= left>   x = 2 </li></h4>
    <h4><li id= left> x = 1 </li></h4>
        <h4><li id= left> x = 0 </li></h4>

<br/>
  <h4 id= left>Using these values we can find which value will yield the greatest value</h4>
  <h4><li id= left>   2 + 3(2) + 4(2) =  16</li></h4>
    <h4><li id= left> 2 + 3(1) + 4(1) =  9 </li></h4>
        <h4><li id= left> 2 + 3(0) + 4(0) = 2  </li></h4>
<br/>
<h4 id= left>Based on the above results we can see the value <b> 2 </b> gives us the greatest value for our expression.
<br/>
</div>



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

  <h4 id= left>  For a more complex expression we may need to look for the <b>highest common factor</b>, including any variables.</h4>
  <h4 id= left>If we take the example: Factor <b>3x<sup>2</sup>y + 9xz</b>. </h4>
<br/>
<h4 id= left>  You will see that both 3x<sup>2</sup>y + 9xy have a common factor of <b> 3</b>. However we can also get the common factor for the variable <b>x</b>. Together we will get the common factor of <b>3x</b> for this expression. </h4>
  <h4><li id= left>   3x<sup>2</sup>y is 3x * xy </li></h4>
    <h4><li id= left> 9xy is 3x * 3z </li></h4>
<br/>
<h4 id= left>  With this knowledge, you can factor the whole expression into: </h4>

<h4><b>3x<sup>2</sup>y + 9xz = 3x(xy + 3z) </b></h4>
<br/>
</div>
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
      <h4 id= left>  A 'quadratic' is a polynomial that is expressed in the form of "ax<sup>2</sup> + bx + c", where <b>'a'</b>, <b>'b'</b> and <b>'c'</b> are just numbers.   </h4>
    <h4 id= left> For Quadratic factors, you will find two numbers that will not only multiply to equal the constant term <b>'c'</b>, but it must also add up to equal <b>'b'</b>.
      coefficient on the x-term. For instance </h4>
<br/>
    <h4 id= left>  Factor the expression: x<sup>2</sup> + 10x + 9</h4>

          <h4 id= left>For this expression, I need to find the factors of <b>9</b> that adds up to <b>10</b>. Since <b>10</b> can be written
          as the product of 3 and 3, however 3 + 3 = 6 not 10. So, we need to find other factors for <b>9</b>.
          9 is the product of also 9 and 1. 9 and 1 gives us 10. </h4>
            <h4 id= left>    This means I can use these numbers. I need to express
        these numbers in the form of "(x + m)(x + n)" where the numbers 9 and 1 are subsituted for <b>'m'</b> and <b>'n'</b>
        </h4>

        <br/>
          <h4 id= left> when expressed in this form we will have the below answer</h4>

          <h4><b> (x + 1)(x + 9) </b></h4>
</div>


        <hr>
        <h3><b><u>Section 4. Multiply Binomials by Polynomals</b></u></h3><button id="math42" class='btn btn-primary btn-md'>Show/Hide material</button>
        <?php
        if($math_section_4 == 0){?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Warning!</strong> In your last test you scored zero in Multiply Binomals by Polynomals, we recommend you look over this section.
        </div>
      <?php } ?>
        <div id="math4">
              <h4 id= left> In order to multiply binomial by polynomials we can look at the proble (x + 4) and (x - 3)  </h4>
        <h4 id= left>  Multiplying <b>x + 4</b> by <b> x - 3</b> is another classic Algebra problem. </h4>
  <h4 id= left>In order to work out this problem we'll use the "F.O.I.L." method. F.O.I.L. stands for <b>F</b>irst,  <b>O</b>uter, <b>I</b>nner,
     <b>L</b>ast. </h4>

     <br/>
      <h4 id= left> First, we'll multiply the two <b>F</b>irst terms, the <b>x</b> and <b>x</b> together.
        <h4 id= left> x * x = x<sup>2</sup>   </h4>
      </br>
      <h4 id= left> Next, we'll multiply the <b>O</b>uter terms, the <b>x</b> and <b>-3</b> together.
        <h4 id= left> x * -3 = -3x   </h4>
            </br>
            <h4 id= left>We'll look at multiplying the two <b>I</b>nner terms, the <b>4</b> and <b>x</b> together.
              <h4 id= left> 4 * x = 4x   </h4>
                  </br>
            <h4 id= left> Then, we'll multiply the two <b>L</b>ast terms, the <b>4</b> and <b>-3</b> together.
              <h4 id= left> 4 * -3 = -12   </h4>
                  </br>
              <h4 id= left>When we add all these values together we get our answer. x<sup>2</sup> -3x + 4x -12.
                </br>
                <h4><b> x<sup>2</sup> + x - 12 </b>
</div>

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
          <hr>
      <h4>Press the button below in order to test your knowledge in Algebra</h4>
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
    $("#math42").click(function(){
        $("#math4").toggle();
    });
});
</script>

<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="../year.js"></script>


 </body>
 </html>
