<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "APP");

$uname=$_SESSION['uname'];

	$oldpass =md5($_POST['oldpass']);
	$newpass = md5($_POST['newpass']);
	$repeatpass = md5($_POST['repeatpass']);

	
	if($newpass==$repeatpass){
		
		$sql=mysqli_query($connect, "UPDATE users SET password='$newpass' WHERE uname='$uname' && password='$oldpass'");
		echo '<script>alert("password changed successfully!")</script>';
		echo "<script>setTimeout(\"location.href = 'login_page.html';\");</script>";
	
	}

	

?>


