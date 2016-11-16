<?php
    include 'header.php';
?>

<div class="header"> 
	<h1>Register, login and logout user php mysql</h1>
</div>





<?php 

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'error=empty') !== false){
	echo "Fill out all the fields!";
}
else
	if
(strpos($url, 'error=username') !== false){
	echo "Username already exists";
}



    if (isset($_SESSION['id'])){
		echo $_SESSION['id'];
		
	}
	else {
		echo "You are not logged in!";
	}

?>
<br>
</br>
<?php
    if (isset($_SESSION['id'])){
		echo "you are already logged in";
		
	}
	else {
		echo "<form action='includes/signup.inc.php' method='POST'>
	     <input type='text' name='first' placeholder='Firstname'>
		 <input type='text' name='last' placeholder='Lastname'>
		 <input type='text' name='uid' placeholder='Username'>
		 <input type='password' name='pwd' placeholder='Password'>
		 <button type='submit'  name='register_btn'> SIGN UP </button>
		 </form>";
	}
?>
   
		 
		 
		 
		 
		 
		 
</body>
</html>