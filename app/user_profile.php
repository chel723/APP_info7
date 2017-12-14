<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");
?>


<?php 


$hname = $_POST['hname'];
$home = $_POST['home'];
$uname = $_SESSION['uname'];
$city = $_POST['city'];
$post = $_POST['post'];


	
if(!empty($hname)){
	
	if(!empty($home)){
		
		if(!empty($city)){
			
			if(!empty($post)){
		
		$sql= "INSERT INTO home (name, address, username, city, post) VALUES ('$hname','$home','$uname','$city','$post')";
		if(mysqli_query($connect,$sql)){
			$sql_homeid=mysqli_query($connect,"SELECT * FROM home WHERE username='$uname' ORDER BY id DESC LIMIT 1");
			$result1=mysqli_fetch_array($sql_homeid);
			$homeId=$result1['id'];
			
			$sql_userid=mysqli_query($connect,"SELECT id FROM users WHERE uname='$uname'");
			$result2=mysqli_fetch_assoc($sql_userid);
			$userId=$result2['id'];
			
			$sql1=mysqli_query($connect,"INSERT INTO user_home (user, home) VALUES ('$userId','$homeId')");
			
			$_SESSION['homeId']=$homeId;
			$_SESSION['userId']=$userId;
			
			echo '<script type="text/javascript"> window.location = "user_profile_hag.php"</script>';
		}
		
		else{
				echo '<script>alert("Oops, something went wrong!.")</script>';
				
			}
			
			}else{
				
				echo '<script>alert("post cannot be empty!")</script>';
				echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
			}
			
		}else{
				
				echo '<script>alert("city cannot be empty!")</script>';
				echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
			}

			}else{
				
				echo '<script>alert("address cannot be empty!")</script>';
				echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
			}
			}	else{
				
				echo '<script>alert("home name cannot be empty!")</script>';
				echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
}


?>
 
 
 
 
 