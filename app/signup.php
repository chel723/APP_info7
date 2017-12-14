<?php

$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'APP')){
	echo 'database not selected';
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$email1= $_POST['email1'];
$email2= $_POST['email2'];
$pass1= $_POST['pass1'];
$pass2= $_POST['pass2'];

if(empty($fname)){
	
	echo '<script>alert("first name cannot be empty!")</script>';
	echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
	
}else{
	if(empty($lname)){
		
		echo '<script>alert("last name cannot be empty!")</script>';
		echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
		
	}else{
		if(empty($uname)){
			echo '<script>alert("username cannot be empty!")</script>';
			echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
		}else{
			if(strlen($uname)>=6){

				$query_user = mysqli_query($con,"SELECT * FROM users WHERE uname='$uname'");
				if(mysqli_num_rows($query_user)>0){
					echo '<script>alert("user exists!")</script>';
					echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
				}else{
					if(empty($email1)){
						echo '<script>alert("email cannot be empty!")</script>';
						echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
					}else{
						if(!filter_var($email1,FILTER_VALIDATE_EMAIL)){
							echo '<script>alert("Invalid email!")</script>';
							echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
						}else{
						
							$query_email = mysqli_query($con,"SELECT * FROM users WHERE email='$email1'");
							if(mysqli_num_rows($query_email)>0){
								echo '<script>alert("email exists!")</script>';
								echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
							}else{

								if($email1 == $email2) {

									if(!empty($pass1)){
											
										if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $pass1)){

											if($pass1==$pass2){

												$pass1=md5($pass1);

												$sql= "INSERT INTO users (id, fname, lname, uname, email, password) VALUES (NULL, '$fname', '$lname', '$uname', '$email1', '$pass1')";

												if(!mysqli_query($con,$sql)) {
													echo '<script>alert("Register Failed")</script>';
													echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
												}
												else{
													echo '<script>alert("Register Successfully! Now please login.")</script>';
													echo "<script>setTimeout(\"location.href = 'login_page.html';\");</script>";
													exit();

												}
											}else{
												echo '<script>alert("passwords do not match!")</script>';
												echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
											}
										}else{
											echo '<script>alert("password shall contain at least 1 number 1 letter and any of these characters !@#$%, and cannot be less than 8 characters!")</script>';
											echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
										}
									}else{
										echo '<script>alert("password cannot be empty!")</script>';
										echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
										
									}
								}else{
									echo '<script>alert("Emails do not match!")</script>';
									echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
								}

							}
						}
					}
				}
			}else{
				echo '<script>alert("username cannot be less than 6 characters!")</script>';
				echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
			}}}}


			?>