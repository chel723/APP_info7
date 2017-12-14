<?php


$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'APP')){
	echo 'database not selected';
}

$newpass1=$_POST['newpass1'];
$newpass2=$_POST['newpass2'];
$uname=$_POST['uname'];

if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $newpass1)){
	
	if($newpass1==$newpass2){
		$newpass1=md5($newpass1);
	
		$sql="UPDATE users SET password='$newpass1', passreset='0' WHERE uname='$uname'";
		if(mysqli_query($con,$sql)){
			echo '<script>alert("new password is reset successfully!")</script>';
			echo "<script>setTimeout(\"location.href = 'login_page.html';\");</script>";
		}else {
			echo 'password reset failed';
		}
	
	
	}
	else{
		echo 'Passwords do not match!';
	}
	
}else{
	echo '<script>alert("password shall contain at least 1 number 1 letter and any of these characters !@#$%, and cannot be less than 8 characters!")</script>';
	echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
}


?>