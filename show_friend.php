<?php



	//connect to databases
	$db = mysqli_connect("localhost", "root", "" , "logintest");



    $sql2= "SELECT * from add_friend where uid='{$_SESSION['userid']}' and permission = 'Y' LIMIT 5";
//	$sql = "SELECT * from users where uid Like '%$uid%' LIMIT 20";
$result2 = mysqli_query($db, $sql2);
$numResults = mysqli_num_rows($result2);



?>
<?php if (($numResults) > 0) { ?>
<div class="table-responsive">
<table class="table table-condensed table-bordered table-hover">
<thead>
  <tr>
    <th>Your friend</th>
      <th>Their difficulty level</th>
      <th>Remove</th>

  </tr>
</thead><?php

//to do this we need fetch array not just a row because we are calling multipe rows
while($row = mysqli_fetch_array($result2)){

//this displays all the information in the rows


?>
<tbody>
 <td>
<?php echo ($row[3]);
			$show_friend = "SELECT * from users WHERE uid = '$row[3]'";
	    $result = mysqli_query($db, $show_friend);
      if (!$row = mysqli_fetch_assoc($result)){

        echo "Your username or password is incorrect!";
            header("Location: ../login_page.php?error=empty1");


      }
                 $friend_dif = $row['difficulty_level'];

?>


</td>

<td>
  <?php


 echo $friend_dif;


?>


</td>
<?php
}
} ?>

</tbody>
</table>
</div>
