<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Select Sensors</title>
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
    <?php include ("admin_nav.php");?>






<div class="container" style="width:60%;">
 <h1 align="center">Edit Sensor Type</h1>
     
 <?php
    
 $query = "SELECT * FROM sensor_type ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  	
     while ($row = mysqli_fetch_array($result))
 {      
 ?>
            <div class="col-md-3">
            <form method="POST" action="">
            
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["type"]; ?></h5>
                
            <input type="hidden" name="hidden_name" value="<?php echo $row["type"]; ?>">
        
            </div>
            
            </form>
            
            
            </div>
            <?php          
 }
 }

 ?>
 
 			</div>			


<?php include ("main_footer.php");?>


 </body>
</html>