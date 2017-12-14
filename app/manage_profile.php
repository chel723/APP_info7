<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Manage My Home</title>
<!-- Latest compiled and minified CSS -->
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

<div class="container" style="width:60%;">
 <h1 align="center">Manage Homes</h1>
     
 <?php
    
 $uname=$_SESSION['uname'];
 $query = "SELECT * FROM home WHERE username='$uname' ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
 while($row = mysqli_fetch_array($result))
 {      
 ?>
            <div class="col-md-3">
            <form method="POST" action="manage_profile.php?action=manage&id=<?php echo $row["id"]; ?>">
            
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="house.png" class="img-responsive">
            <h3 class="text-info"><?php echo $row["name"]; ?></h3>
            <h5 class="text-info"><?php echo $row["address"]; ?></h5>   
         
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Manage">
            
            
            </div>
            </form>
             
            </div>
            
          
            <?php          
 }
 }
 ?>

 <div style="clear:both"></div>
 <h2 align="center"></h2>



<?php 


$homeId=$_GET['id'];
$_SESSION['homeId']=$homeId;
$sql1= "SELECT * FROM home WHERE id='$homeId'";
$result1= mysqli_query($connect,$sql1);

while($row1=mysqli_fetch_array($result1)){
		
?>
<form action="manage_profile.php?action=update&id=<?php echo $row1["id"];?>" method="POST">
<div id="homeaddress-form">
 Home Name: <input class="form-control" value="<?php echo $row1['name'];?>" name="hname" required><font color=grey>*</font><br>
 Address: <input class="form-control" value="<?php echo $row1['address'];?>" name="home" required><font color=grey>*</font><br>
 City: <input class="form-control" value="<?php echo $row1['city'];?>" name="city" required><font color=grey>*</font><br>
 Post: <input class="form-control" value="<?php echo $row1['post'];?>" name="post" required><font color=grey>*</font><br>
 
 <font id="font" color=grey>*required field</font><br><br>
 
	
 <input id="homeaddress" type="submit" value="Update" name="submit"/>
 
 <div class="container">
             
 <ul class="pager">
<li> <a id="homeaddress" href="user_profile_hag_manage.php" class="btn btn-space btn-lg" type="button" >Edit Hag</a></li>
<li>  <a id="homeaddress" href="user_profile_room_manage.php" class="btn btn-space btn-lg" type="button" >Edit Room</a></li>
 <li> <a id="homeaddress" href="user_profile_sensors_manage.php" class="btn btn-space btn-lg" type="button" >Edit Sensor</a></li>
<li>  <a id="homeaddress" href="manage_profile.php" class="btn btn-space btn-lg" type="button" >Done</a></li>
<li>  <a id="homeaddress" href="manage_profile.php?action=delete&id=<?php echo $row1["id"];?>" class="btn btn-space btn-lg" type="button" > Delete Home? Are you sure? </a></li>	
 </ul>
</div>

  
</div>
 </div>


</form>
<?php 
 }
?>

<?php 

$hname = $_POST['hname'];
$home = $_POST['home'];
$city = $_POST['city'];
$post = $_POST['post'];

$action=$_GET['action'];

if ($action=='update'){
	$homeId=$_SESSION['homeId'];
	$update=mysqli_query($connect,"UPDATE home SET name='$hname', address='$home', city='$city', post='$post' WHERE id='$homeId'");
	echo '<script>alert("updated!")</script>';
	echo "<script>setTimeout(\"location.href = 'manage_profile.php';\");</script>";
}

$action=$_GET['action'];

if ($action=='delete'){
	$homeId=$_SESSION['homeId'];
	$delete=mysqli_query($connect,"DELETE FROM home WHERE id='$homeId'");
	echo '<script>alert("deleted!")</script>';
	echo "<script>setTimeout(\"location.href = 'manage_profile.php';\");</script>";
}


?>

         <div class="container">
             
  <ul class="pager">
  
	 	 <li> <a id="homeaddress" href="main_page.php" class="btn btn-space btn-lg" type="button" >Back</a></li>
	 	 <li> <a id="homeaddress" href="dashboard.php" class="btn btn-space btn-lg" type="button" >Monitor Sensors</a></li>
  </ul>
</div>

<?php include ("main_footer.php");?>

</body>
</html>