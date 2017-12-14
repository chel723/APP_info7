<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");
?>


<?php 

$uname=$_SESSION['uname'];

$from='Domus_User_'.$uname;
$to='chel723@gmail.com';
$subject=$_POST['subject'];
$message=$_POST['message'];

mail($to,$subject,$message,"From:".$from);

$sql=mysqli_query($connect, "INSERT INTO user_message (uname, subject, message) VALUES ('$uname', '$subject', '$message')");

echo '<script>alert("Your message has been sent! We will reply you within 24hours.")</script>';
echo "<script>setTimeout(\"location.href = 'message_interface.php';\");</script>";

