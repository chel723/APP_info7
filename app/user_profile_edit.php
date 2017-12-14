<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Handlee" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main_style.css">
  <link rel="stylesheet" type="text/css" href="user_profile_room.css">
<!-- jQuery library-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
   <?php include ("main_header.php");?>
    <?php include ("main_nav.php");?>
<h1 id="title">Edit Profile</h1>

 <?php
    
 $uname=$_SESSION['uname'];
 $sql= "SELECT * FROM users WHERE uname='$uname'";
 $result= mysqli_query($connect,$sql);
 
 while($row=mysqli_fetch_array($result)){
 
 	?>
 <form action="user_profile_edit.php?action=update&id=<?php echo $row["id"]; ?>" method="POST">

  First Name: <input class="form-control" value="<?php echo $row['fname'];?>" name="fname" required><font color=grey>*</font><br>
  Last Name: <input class="form-control" value="<?php echo $row['lname'];?>" name="lname" required><font color=grey>*</font><br>
  Email: <input class="form-control" value="<?php echo $row['email'];?>" name="email" required><font color=grey>*</font><br>
  Enter New Email: <input class="form-control"  name="email1" required><font color=grey>*</font><br>
  Confirm New Email: <input class="form-control"  name="email2" required><font color=grey>*</font><br>
  
  <font id="font" color=grey>*required field</font><br><br>
  
 	
  <input type="submit" value="Update" name="submit"/>
  </form>
<?php 
 }
?>

<?php 

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];

$action=$_GET['action'];

if ($action=='update'){
	
	if($email1==$email2){
	$update=mysqli_query($connect,"UPDATE users SET fname='$fname', lname='$lname', email='$email1' WHERE uname='$uname'");
	echo '<script>alert("updated!")</script>';
	echo "<script>setTimeout(\"location.href = 'user_profile_edit.php';\");</script>";
	}else{
		echo '<script>alert("emails do not match!")</script>';
		echo "<script>setTimeout(\"location.href = 'javascript:history.go(-1)';\");</script>";
	}


}
	

?>

 <?php include ("main_footer.php");?>
</body>
</html>