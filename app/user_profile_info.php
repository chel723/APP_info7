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
<h1 id="title">Change Password</h1>

<div id="signup-form">


<form action="change_password.php" method="POST">
<div >

<input  placeholder="Enter old password" type="password" name="oldpass"/><font color=grey>*</font><br>
<input  placeholder="Enter new password" type="password" name="newpass"/><font color=grey>*</font><br>
<input  placeholder="Repeat new Password" type="password" name="repeatpass"/><font color=grey>*</font><br>

 
 <font id="font" color=grey>*required field</font><br><br>
 
<input id="login" type="submit" value="Update" name="submit"/>
 
   
</div>

</form>

 </div>

<?php 
$uname=$_SESSION['uname'];

$oldpass =md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);
$repeatpass = md5($_POST['repeatpass']);


if($newpass==$repeatpass){

	$sql=mysqli_query($connect, "UPDATE users SET password='$newpass' WHERE uname='$uname' && password='$oldpass'");

}

?>
 <?php include ("main_footer.php");?>
</body>
</html>