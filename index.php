<?php
require_once 'core.php';
require 'dbconnect.php';
$logout_txt='<a href="logout.php">Logout</a>';
if(loggedin()){
	include 'web.php';
}else{
include 'loginform.php';	
}
?>
