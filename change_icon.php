<?php
session_start();
if($_SESSION['welcome'] !=2){
    header("Location: home.php");
}

    include 'home_header.php';

  ?>

  <?php


  $db = mysqli_connect("localhost", "root","", "logintest");


  if (!$db) {
  	die("Connection failed: ". mysqli_connect_error());

  }




    $sql = "SELECT  SUM(score) as TEST, COUNT(math_lesson) as MATH FROM quiz_scores WHERE uid='{$_SESSION['userid']}'";
  	$result = mysqli_query($db, $sql);


      		if (!$row = mysqli_fetch_assoc($result)){

      		  echo "Your username or password is incorrect!";
                header("Location: ../home.php?error=real test");


      		}


      $sum = $row['TEST'];
      $count = $row['MATH'];
      $count_test =  10 - $count;
    //  echo "$sum";
    //  echo "$count";
    //  echo "$count_test";

     $average = $sum/$count;
      $english_format_number = number_format($average, 2, '.', '');
      //echo   $english_format_number;
?>

<div class="container-fluid text-center">
    <div class="row content">
  <!--<div class="row content">

    <div class="col-sm-2 sidenav" >
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
	  <div class="well">
        <p>ADS</p>
		</div>
      <p><a href="#">Link</a></p>
    </div>-->







    <div class="col-sm-9 text-left">
      <h1>Change Icons</h1>



      <div id="myAlert" class="alert alert-danger collapse alert-dismissable">
      <a href="#" id="linkClose" class="close"  aria-label="close">×</a> <!--important to remove the data-dismiss alert-->
      <strong>Warning!</strong> You have not met the conditions to use this icon.
      </div>

    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-sm-1">
        </div>
          <div class="col-sm-4">
        <h2>First Icon</h2>
        <div class="panel-group">
          <div class="panel panel-default">
               <div class="panel-heading"><img src="images/test.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"></div>
            <div class="panel-heading">You can use this icon by <b>default</b>.</div>
                  <div class="panel-heading"><b><?php if($_SESSION['icon'] ==1 ){ echo "[selected]";  }?></b></div>
            <!--make a test scenario where the user has to done the lesson before they are able to do this topic-->
            <div class="panel-body"><button class='btn btn-default btn-md'><a href="icon_update.php?n=1">Use This Icon </a></button></div>

          </div>
          </div>
          </div>

          <div class="col-sm-2">
          </div>


           <div class="col-sm-4">
             <h2>Second Icon</h2>
             <div class="panel-group">
               <div class="panel panel-default">
           <div class="panel-heading"><img src="images/background2.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"></div>
            <div class="panel-heading">Do <b>Ten</b> quizes in total to unlock this icon.</div>
              <div class="panel-heading">You have to do <b><?php if($count_test <= 0){  echo  "0";   }else echo $count_test?></b> more quizes.</div>
                   <div class="panel-heading"><b><?php if($_SESSION['icon'] ==2 ){ echo "[selected]";  }?></b></div>
                   <?php if($count >=10){?>
            <div class="panel-body"><button class='btn btn-default btn-md'><a href="icon_update.php?n=2">Use This Icon</a></button></div>
        <?php } else { ?>
             <div class="panel-body"><button class='btn btn-default btn-md'><a href="#"  id="myFunction">Use This Icon</a></button></div>
        <?php } ?>
           </div>


        </div>
      </div>
      </div>


    <div class="row">
      <div class="col-sm-1">
      </div>
        <div class="col-sm-4">
      <h2>Third Icon</h2>
      <div class="panel-group">
        <div class="panel panel-default">
             <div class="panel-heading"><img src="images/background3.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"></div>
              <div class="panel-heading">Have an average of <b>7</b> based on your quiz scores.</div>
                        <div class="panel-heading">Unlocked: <b><?php if( $_SESSION['greatnest'] == "Y"){ echo "Yes";  }else{ echo "No";}?></b> </div>
                 <div class="panel-heading">Your current average is <b><?php echo $english_format_number;?></b>.</div>
                <div class="panel-heading"><b><?php if($_SESSION['icon'] ==3 ){ echo "[selected]";  }?></b></div>
                <?php if( $_SESSION['greatnest'] == "Y"){ ?>
        <div class="panel-body"><a href="icon_update.php?n=3">Use This Icon </a></div>
<?php } else { ?>
    <div class="panel-body"><button class='btn btn-default btn-md'><a href="#"  id="myFunction2">Use This Icon</a></button></div>
<?php } ?>

        </div>
        </div>
        </div>

        <div class="col-sm-2">
        </div>


         <div class="col-sm-4">
           <h2>Fourth Icon</h2>
           <div class="panel-group">
             <div class="panel panel-default">
            <div class="panel-heading"><img src="images/background4.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"></div>
                       <div class="panel-heading">Achieve in total a score of <b>100</b> based on your quiz scores.</div>
                   <div class="panel-heading">Your current score is <b><?php echo $sum;?></b>.</div>
                 <div class="panel-heading"><b><?php if($_SESSION['icon'] ==4 ){ echo "[selected]";  }?></b></div>
         <?php if($sum >=100){?>
           <div class="panel-body"><button class='btn btn-default btn-md'><a href="icon_update.php?n=4">Use This Icon</a></button></div>
      <?php } else { ?>
           <div class="panel-body"><button class='btn btn-default btn-md'><a href="#"  id="myFunction3">Use This Icon</a></button></div>
      <?php } ?>
</div>



      </div>
    </div>
  </div>
    </div>
  </div>
</div>

<script>
//function myFunction() {
  //  alert("Hello! I am an alert box!");

//set an id so when this pressed changed a value id then implement a switch for that
//}

$(document).ready(function(){
  $('#myFunction').click(function(){
     $('#myAlert').show('fade');
  });


$('#linkClose').click(function (){
  $('#myAlert').hide('fade');
});
});


$(document).ready(function(){
  $('#myFunction2').click(function(){
     $('#myAlert').show('fade');
  });


$('#linkClose').click(function (){
  $('#myAlert').hide('fade');
});
});

$(document).ready(function(){
  $('#myFunction3').click(function(){
     $('#myAlert').show('fade');
  });


$('#linkClose').click(function (){
  $('#myAlert').hide('fade');
});
});





</script>



<footer class="container-fluid text-center" id="foot01">

</footer>
<script src="year.js"></script>



</body>
</html>
