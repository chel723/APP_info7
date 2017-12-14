<?php
session_start();

?>

<?php

$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'APP')){
	echo 'database not selected';
}

$uname=$_POST['uname'];
$email=$_POST['email'];

$query_account=mysqli_query($con,"SELECT * FROM users WHERE uname='$uname'");


if(mysqli_num_rows($query_account) == 0){
	
	echo '<script>alert("username does not exist! please try it again!")</script>';
	echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
	
}elseif(mysqli_num_rows($query_account) == 1){
	
	while($row=mysqli_fetch_assoc($query_account)){
		
		$users_email=$row['email'];
	
	
				if($email==$users_email){
					
					$code=rand(10000,1000000);
					
					$to =$users_email;
					$subject="Domus - Password Reset";
					$body="
							
					Greetings! $uname,
					
					This is an automated email. Please DO NOT reply.
					
					Click the link below or paste it into your browser
							
					http://localhost:8888/app_info7/passreset_page.html?code=$code&uname=$uname
					
					Have a nice day!
					
					From Domus Team
					
							
							";
					
					mysqli_query($con, "UPDATE users SET passreset='$code' WHERE uname='$uname'");
					
					mail($to,$subject,$body);
					echo '<script>alert("Please check your email (including Spam Folder)!")</script>';
					echo "<script>setTimeout(\"location.href = 'http://www.google.com';\");</script>";
					
					
				}
					else{
						echo '<script>alert("email is incorrect!")</script>';
						echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
				}
	
	}
}

?>

