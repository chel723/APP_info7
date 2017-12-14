<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");
?>


<?php

$uname=$_POST['uname'];
$pass=$_POST['pass'];

$query_account = mysqli_query($connect,"SELECT * FROM users WHERE uname='$uname'");
if(mysqli_num_rows($query_account) == 0){
	echo '<script>alert("username does not exist! please register!")</script>';
	echo "<script>setTimeout(\"location.href = 'signup_page.html';\");</script>";
	
}elseif(mysqli_num_rows($query_account) == 1){
	$pass=md5($pass);
	$result=mysqli_query($connect,"SELECT * FROM users WHERE uname='$uname' && password='$pass'");
	
		if(mysqli_num_rows($result)>0){
			$_SESSION['uname']=$uname;
			
			echo '<script>alert("login successfully!")</script>';
			echo "<script>setTimeout(\"location.href = 'main_page.php';\");</script>";
		}else{
			echo '<script>alert("Username or password error, please try it again!")</script>';
			echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
		}

}



?>
