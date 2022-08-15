<?php
$host='localhost';
$user='root';
$pass='';
$dbname='a_database';
if($mycon=@mysqli_connect($host,$user,$pass)){
//echo 'Connected to the server!';
if(@mysqli_select_db($mycon,$dbname)){
//echo 'Connected to the database!';
}else{
echo 'Database Connection Failed!';	
}
}else{
echo 'Server Connection Failed!';	
}

?>