<?php



	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");



    $sql3= "SELECT * from add_friend where other_user='{$_SESSION['userid']}'  LIMIT 5";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result3 = mysqli_query($db, $sql3);
$numResults = mysqli_num_rows($result3);








?>
<?php if (($numResults) > 0) { ?>
<div class="table-responsive">
<table class="table table-condensed table-bordered">
<thead>
  <tr>
    <th>user who added you</th>
      <th>Status</th>
			    <th>Remove User</th>

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
	echo('<form method="post" action="add_person.php"><input type="hidden" ');
	echo('name="friend" value="'.$row[1].'">'."\n");
	echo('<input type="hidden" name="remove_friend" value="1">');
	echo('<input type="hidden" name="permission" value="Y">');
	  echo('<button type="submit" class="btn btn-primary btn-s"  name="add_invite"> Accept </button>');
		echo("\n</form>\n");

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
<?php } ?>
