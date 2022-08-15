<?php
require_once 'core.php';
require 'dbconnect.php';
if(isset($_POST['username'])&&isset($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$username=mysqli_real_escape_string($mycon, $username);
	$password=mysqli_real_escape_string($mycon, $password);
	$pass_hash=md5($password);
	if(!empty($username)&&!empty($password)){
		$query="SELECT `id` FROM `user` WHERE `username`='$username' AND `password`='$pass_hash'";
		if($query_run=mysqli_query($mycon,$query)){
		$num_rows=mysqli_num_rows($query_run);
if($num_rows==0){
	echo 'Invalid username and password';
}	else if($num_rows==1){
	$row=mysqli_fetch_row($query_run);
	$id=$row[0];
$_SESSION['user_id']=$id;
header('Location: index.php');
}	
		}
	}else{
        echo 'Enter username and password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--Website Title-->
    <title>Tricube-Web Developers</title>
  <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon/Icon2.jpg">
   <!--CSS Custom-->
    <link rel="stylesheet" href="css/mystyle.css">
    </head>
    <body>
       <div class="loginform">
       <img src="images/favicon/download.png" class="img-fluid" alt="logo">
        <form action="<?php echo $current_file?>" method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Log In"></form><br>
<form action="register.php" method="POST">
    Not a member  <input type="submit" value="Register">
</form>
   </div>
    </body>
</html>