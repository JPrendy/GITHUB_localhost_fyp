<?php

  session_start();


	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");

	if (isset($_POST['register_btn'])){
		$uid = mysql_real_escape_string($_POST['uid']);

	if (empty($uid)){ //this is checking $username
		header("Location:charts.php?error=empty");
		exit();
	}
  else{
        include 'home_header.php';
		$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
		$result = mysqli_query($db, $sql);

    $sql2= "SELECT * from add_friend where uid='{$_SESSION['userid']}'";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result2 = mysqli_query($db, $sql2);
}

}
?>
<div class="table-responsive">
<table class="table table-condensed table-bordered table-hover">
<thead>
  <tr>
    <th>uid</th>
      <th>Name</th>
      <th>Left Blank</th>

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
<?php echo ($row[1]);?>
</td>
<td>
  <?php
echo('<form method="post" action="add_person.php"><input type="hidden" ');
echo('name="friend" value="'.$row[3].'">'."\n");
echo('<input type="hidden" name="remove_friend" value="1">');
echo('<input type="hidden" name="permission" value="N">');
echo('<input type="submit" value="Reserve" name="submit">');
echo("\n</form>\n");
echo('<form method="post" action="add_person.php"><input type="hidden" ');
echo('name="remove_friend" value="'.$row[3].'">'."\n");
echo('<input type="hidden" name="friend" value="1">');
echo('<input type="hidden" name="permission" value="N">');
echo('<input type="submit" value="Remove" name="submit">');
echo("\n</form>\n");



?>


</td>
<?php

} ?>

</tbody>
</table>
