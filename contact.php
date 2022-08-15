<?php
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['mobile'])&&isset($_POST['subject'])&&isset($_POST['message'])){
  $name= $_POST['name'];
$email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $subject= $_POST['subject'];
    $message= $_POST['message'];
    $name=mysqli_real_escape_string($mycon, $name);
    $email=mysqli_real_escape_string($mycon, $email);
    $mobile=mysqli_real_escape_string($mycon, $mobile);
    $subject=mysqli_real_escape_string($mycon, $subject);
    $message=mysqli_real_escape_string($mycon, $message);
    if(!empty($name)&&!empty($email)&&!empty($mobile)&&!empty($subject)&&!empty($message)){
        $query="SELECT `name` FROM `contact` WHERE `name`='$name'";
		if($query_run=mysqli_query($mycon,$query)){
			$num_rows=mysqli_num_rows($query_run);
			if($num_rows==1){
				echo 'Data already exists!';
			}else if($num_rows==0){
				$query="INSERT INTO `contact`(`id`,`name`,`email`,`mobile`,`subject`,`message`) VALUES(NULL,'$name','$email','$mobile','$subject','$message')";
				if($query_run=mysqli_query($mycon,$query)){
				header('Location: success.php');
    }else{
        echo 'Fill all columns';
    }
}
)
?>