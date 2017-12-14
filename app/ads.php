<?php

$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'ads')){
	echo 'database not selected';
}

$login=$_POST['login'];
$password=$_POST['password'];
$password1=$_POST['password1'];

$query_account = mysqli_query($con,"SELECT * FROM user WHERE login='$login'");

if(mysqli_num_rows($query_account) == 0){
	echo '<script>alert("login does not exist! please register!")</script>';
	echo "<script>setTimeout(\"location.href = 'ads.html';\");</script>";

}elseif(mysqli_num_rows($query_account) == 1){
	
	
	
			if($password==$password1){
				if(strlen( $password) < 8){
				
					echo '<script>alert("password shall contain at least 8 characters!")</script>';
					echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
				}else{
					
					$password=md5($password);
					$result=mysqli_query($con,"SELECT * FROM user WHERE login='$login' && password='$password'");
						
					if(mysqli_num_rows($result)>0){
					
						echo '<script>alert("login successfully!")</script>';
					
					}else{
						echo '<script>alert("login or password error, please try it again!")</script>';
						echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
					}
					
				}
				
			}else{
				echo '<script>alert("passwords do not match!")</script>';
				echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
			}
		

		}


	

	?>
