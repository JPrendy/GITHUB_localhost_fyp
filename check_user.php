<?php


 $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=updated') !== false){
	//$ok= "Fill out all the fields!";
?>


<div class="alert alert-success alert-dismissable">
<a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
<strong>Congratulations!</strong> You have accepted the invitation.
</div>
<?php

}
if (strpos($url, 'error=deleted') !== false){
	//$ok= "Fill out all the fields!";
?>


<div class="alert alert-danger alert-dismissable">
<a href="#" id='ok' class="close" data-dismiss="alert" aria-label="close">×</a>
<strong>Update!</strong> You have deleted the invitation.
</div>
<?php

}




	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");


	$per_page=3;
	if (isset($_GET["page"])) {

	$page = $_GET["page"];

	}

	else {

	$page=1;

	}

	// Page will start from 0 and Multiple by Per Page
	$start_from = ($page-1) * $per_page;

	//Selecting the data from table but with limit


    $sql3= "SELECT * from add_friend where other_user='{$_SESSION['userid']}'  LIMIT $start_from, $per_page";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result3 = mysqli_query($db, $sql3);
$numResults = mysqli_num_rows($result3);








?>
<?php if (($numResults) > 0) { ?>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
<thead>
  <tr>
    <th><h5><strong>user who added you</strong></h5></th>
      <th><h5><strong>Status</strong></h5></th>
			    <th><h5><strong>Remove User</strong></h5></th>

  </tr>
</thead><?php

//to do this we need fetch array not just a row because we are calling multipe rows
while($row = mysqli_fetch_array($result3)){

//this displays all the information in the rows


?>
<tbody>
 <td>
<?php echo ($row[1]); ?>

</td>



<td>
	<?php
	if($row[4] != "Y"){
	echo('<form method="post" action="add_person.php"><input type="hidden" ');
	echo('name="friend" value="'.$row[1].'">'."\n");
	echo('<input type="hidden" name="remove_friend" value="1">');
	echo('<input type="hidden" name="permission" value="Y">');
	  echo('<button type="submit" class="btn btn-primary btn-s"  name="add_invite"> Accept </button>');
		echo("\n</form>\n");
}
?>
</td>
<td>
<?php
echo('<form method="post" action="add_person.php"><input type="hidden" ');
echo('name="remove1" value="'.$row[1].'">'."\n");
  echo('<button type="submit" class="btn btn-danger btn-s"  name="remove_check"> Dismiss </button>');
echo("\n</form>\n");
?>
</td><?php
}
 ?>

</tbody>
</table>
</div>
<?php
	
$sql = "UPDATE add_friend set shown=1 where other_user='{$_SESSION['userid']}' ";
$result = mysqli_query($db, $sql);




$sql = "SELECT * from add_friend where other_user='{$_SESSION['userid']}' ";
$result = mysqli_query($db, $sql);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo "<center><button class='btn btn-default btn-md'><a href='settings.php?page=1'>".'First Page'."</a></button> ";

for ($i=1; $i<=$total_pages; $i++) {

echo "<a href='settings.php?page=".$i."'>".$i."</a> ";
};
// Going to last page
echo "<button class='btn btn-default btn-md'><a href='settings.php?page=$total_pages'>".'Last Page'."</a></button></center> ";




}

 ?>
