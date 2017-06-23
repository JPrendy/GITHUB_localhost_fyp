<?php

  session_start();



	//connect to databases
  include 'dbh.php';

#	$db = mysqli_connect("localhost", "root", "" , "logintest");

	if (isset($_POST['register_btn'])){
		$uid = mysql_real_escape_string($_POST['uid']);
    unset($_SESSION["good"]);
    $_SESSION['good'] = 	$uid;

    //echo   $_SESSION['good'];


	if (empty($uid)){ //this is checking $username
		header("Location:settings.php?error=empty");
		exit();
	}
}

    include 'home_header.php';

    $per_page=10;
    if (isset($_GET["page"])) {

    $page = $_GET["page"];

    }

    else {

    $page=1;

    }

    // Page will start from 0 and Multiple by Per Page
    $start_from = ($page-1) * $per_page;

    //Selecting the data from table but with limit
    $query = "SELECT * FROM users where uid Like '%{$_SESSION['good']}%' and uid !='{$_SESSION['userid']}' LIMIT $start_from, $per_page";
    $result = mysqli_query ($db, $query);
$numResults = mysqli_num_rows($result);
    ?>

<?php if (($numResults) > 0) { ?>
    <div class="container-fluid text-center">
        <div class="row content">
  <div class="col-sm-1"></div>
        <div class="col-sm-6 text-centres">

  <?php  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  if (strpos($url, 'error=deleted') !== false){
    //$ok= "Fill out all the fields!";
  ?>


  <div class="alert alert-danger alert-dismissable">
  <a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Notice!</strong> You have removed your invitation.
  </div>
  <?php

}
if (strpos($url, 'error=first_inserted') !== false){
  //$ok= "Fill out all the fields!";
?>



<div class="alert alert-success alert-dismissable">
<a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
<strong>You have sent your invitation.</strong>
</div>
<?php

}
if (strpos($url, 'error=already_inserted') !== false){
  //$ok= "Fill out all the fields!";
?>


<div class="alert alert-warning alert-dismissable">
<a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
<strong>Warning!</strong> You have already sent your invitation.
</div>
<?php

}



?>



<h2> User ID's Results </h2>

    <div class="table-responsive">
    <table class="table table-condensed table-bordered">
    <thead>
      <tr>

          <th><h5><strong>User ID's</strong></h5></th>

            <th><h5><strong>Status</strong></h5></th>
            <th><h5><strong> Remove Invitation</strong></h5></th>

      </tr>
    </thead><?php

    //to do this we need fetch array not just a row because we are calling multipe rows
    while($row = mysqli_fetch_array($result)){

    //this displays all the information in the rows


    ?>
    <tbody>
     <td>
    <?php echo ($row[3]);?>

    </td>

    <td>
      <?php
    echo('<form method="post" action="add_person.php"><input type="hidden" ');
    echo('name="friend" value="'.$row[3].'">'."\n");
    echo('<input type="hidden" name="remove_friend" value="1">');
    echo('<input type="hidden" name="permission" value="N">');
    echo('<button type="submit" class="btn btn-primary btn-s"  name="submit"> Invite </button>');
    ?>
</td>
<td>
  <?php
    echo("\n</form>\n");
    echo('<form method="post" action="add_person.php"><input type="hidden" ');
    echo('name="remove_friend" value="'.$row[3].'">'."\n");
    echo('<input type="hidden" name="friend" value="1">');
    echo('<input type="hidden" name="permission" value="N">');
    echo('<button type="submit" class="btn btn-danger btn-s"  name="submit">Remove </button>');

    echo("\n</form>\n");
?>
</td>
<?php


    ?>


    </td>
    <?php
    }
     ?>

    </tbody>
    </table>
</div>



    <?php

    //Now select all from table

    $sql = "SELECT * from users where uid Like '%{$_SESSION['good']}%' and uid !='{$_SESSION['userid']}'";
    $result = mysqli_query($db, $sql);

    // Count the total records
    $total_records = mysqli_num_rows($result);

    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);

    //Going to first page
    echo "<center><button class='btn btn-default btn-md'> <a href='find.php?page=1'>".'First Page'."</a></button> ";

    for ($i=1; $i<=$total_pages; $i++) {

    echo "<a id=length href='find.php?page=".$i."'>".$i."</a> ";
    };
    // Going to last page
    echo "<button class='btn btn-default btn-md'> <a href='find.php?page=$total_pages'>".'Last Page'."</a></center></button ";
















    $sql2= "SELECT * from add_friend where uid='{$_SESSION['userid']}'";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result2 = mysqli_query($db, $sql2);



?>

</div>
</div>
</div>
<?php }
else{ ?>
  <br>
<h3>There is no user that meets your criteria.</h3>
  <br>
  <div class="panel-body"><button class='btn btn-default btn-md'><a href="settings.php"><h3>Go back to Settings</h3></a></button></div>
<?php } ?>
