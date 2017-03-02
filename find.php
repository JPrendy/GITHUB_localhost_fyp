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
		$sql = "SELECT * from users where uid Like '%$uid%'";
		$result = mysqli_query($db, $sql);
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
echo('<form method="post"><input type="hidden" ');
echo('name="ISBN" value="'.$row[0].'">'."\n");
echo('<input type="submit" value="Reserve" name="submit">');
echo("\n</form>\n");
?>
</td>
<?php } ?>

</tbody>
</table>
