<?php
require_once 'core.php';
require 'dbconnect.php';
if(loggedin()){
	echo 'You have already registered and loggedin!';
}else if(!loggedin()){
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['pass_again'])&&isset($_POST['firstname'])&&isset($_POST['surname'])){
	$username=$_POST['username'];
$password=	$_POST['password'];
$pass_again=$_POST['pass_again'];
$firstname=$_POST['firstname'];
$surname=$_POST['surname'];
$pass_hash=md5($password);
if(!empty($username)&&!empty($password)&&!empty($pass_again)&&!empty($firstname)&&!empty($surname)){
	if($password!=$pass_again){
		echo 'Passwords do not match!';
	}else{
		$query="SELECT `username` FROM `user` WHERE `username`='$username'";
		if($query_run=mysqli_query($mycon,$query)){
			$num_rows=mysqli_num_rows($query_run);
			if($num_rows==1){
				echo 'Username already exists!';
			}else if($num_rows==0){
				$query="INSERT INTO `user`(`id`,`username`,`password`,`firstname`,`surname`) VALUES(NULL,'$username','$pass_hash','$firstname','$surname')";
				if($query_run=mysqli_query($mycon,$query)){
				header('Location: success.php');	
				}
			}
			
		}
}
	}
	}
else{
		echo 'Required to enter all fields';
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
        <h2>Sign Up!</h2>
<form action="register.php" method="POST">
    Username :<br><input type="text" name="username"><br><br>
    Password :<br><input type="password" name="password"><br><br>
    Confirm Password:<br><input type="password" name="pass_again"><br><br>
    Firstname :<br><input type="text" name="firstname"><br><br>
    Surname :<br><input type="text" name="surname"><br><br>
    <br><input type="submit" value="Sign Up!">
            </form>
    </div>
    </body>
</html>
    <?php
}
?>