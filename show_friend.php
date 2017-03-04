<?php



	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");

	$per_page=1;
	if (isset($_GET["page"])) {

	$page = $_GET["page"];

	}

	else {

	$page=1;

	}

	// Page will start from 0 and Multiple by Per Page
	$start_from = ($page-1) * $per_page;

	//Selecting the data from table but with limit
    $sql2= "SELECT * from add_friend where uid='{$_SESSION['userid']}' and permission = 'Y'  LIMIT $start_from, $per_page";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result2 = mysqli_query($db, $sql2);
$numResults = mysqli_num_rows($result2);



?>
<?php if (($numResults) > 0) { ?>



<div class=" col-sm-2"></div>
    <div class="form-group col-sm-8">
<h4> Your Friends Results </h4>
<table class="table table-condensed table-bordered">
<thead>
  <tr>
  <th><h5><strong>Your friends id's</strong></h5></th>
    <th><h5><strong>Their difficulty level</strong></h5></th>
		<th><h5><strong>Their average score</strong></h5></th>
    <th><h5><strong>Status</strong></h5></th>

  </tr>
</thead><?php

//to do this we need fetch array not just a row because we are calling multipe rows
while($row = mysqli_fetch_array($result2)){

//this displays all the information in the rows


?>
<tbody>
 <td>
<?php

?> <strong><h4><?php echo ($row[3]); ?> </h4></strong> <?php
			$show_friend = "SELECT * from users WHERE uid = '$row[3]'";
	    $result = mysqli_query($db, $show_friend);
      if (!$row2 = mysqli_fetch_assoc($result)){

        echo "Your username or password is incorrect!";
            header("Location: ../login_page.php?error=empty1");


      }
                 $friend_dif = $row2['difficulty_level'];
								 $average_score = $row2['average_score'];


?>


</td>

<td>
  <?php

?> <strong><h4><?php echo $friend_dif; ?> </h4></strong>
</td>


<td>
  <?php

?> <strong><h4><?php echo $average_score; ?> </h4></strong>

</td>

<td>
  <?php
  echo('<form method="post" action="add_person.php"><input type="hidden" ');
echo('<input type="hidden" name="remove1" value="'.$row[3].'">'."\n");
echo('<input type="hidden" name="permission" value="Y">');
?><strong><h4>	<?php  echo('<button type="submit" class="btn btn-danger btn-s"  name="remove"> Remove </button>'); ?> </h4></strong><?php

  echo("\n</form>\n");


?>
</td>
<?php
}
 ?>

</tbody>
</table>


<?php


//Now select all from table

$sql = "SELECT * from add_friend where uid='{$_SESSION['userid']}' and permission = 'Y'";
$result = mysqli_query($db, $sql);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo "<center><a href='home.php?page=1'>".'First Page'."</a> ";


for ($i=1; $i<=$total_pages; $i++) {

echo "<a href='home.php?page=".$i."'>".$i."</a> ";
};
// Going to last page
echo "<a href='home.php?page=$total_pages'>".'Last Page'."</a></center> ";


?>
</div>
<?php } ?>
