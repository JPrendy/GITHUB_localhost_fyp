<?php



	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");



    $sql2= "SELECT * from add_friend where other_user='{$_SESSION['userid']}' LIMIT 5";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result2 = mysqli_query($db, $sql2);



?>
<?php if($result2 != ""){ ?>
<div class="table-responsive">
<table class="table table-condensed table-bordered table-hover">
<thead>
  <tr>
    <th>user who added you</th>
      <th>Status</th>

  </tr>
</thead><?php

//to do this we need fetch array not just a row because we are calling multipe rows
while($row = mysqli_fetch_array($result2)){

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
echo('<input type="submit" value="Reserve" name="submit">');
echo("\n</form>\n");
echo('<form method="post" action="add_person.php"><input type="hidden" ');
echo('name="remove_friend" value="'.$row[3].'">'."\n");
echo('<input type="hidden" name="friend" value="1">');
echo('<input type="submit" value="Remove" name="submit">');
echo("\n</form>\n");



?>


</td>
<?php

} ?>

</tbody>
</table>
<?php } ?>
