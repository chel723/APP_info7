<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Update Sensors</title>
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
 <h1 align="center">Update Sensors</h1>
     
 <?php
    
 $query = "SELECT * FROM sensor_type ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  	
     while ($row = mysqli_fetch_array($result))
 {      
 ?>
            <div class="col-md-3">
            <form method="POST" action="user_profile_sensors_manage.php?action=add&id=<?php echo $row["id"];?>">
            
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["type"]; ?></h5>
                
            <input type="hidden" name="hidden_name" value="<?php echo $row["type"]; ?>">
            <input placeholder="Give a Name" type="text" name="sensorname" style="font:50%;" class="form-control">
            
   			<select class="form-control" name="HAG">
   			<option value="">Select Hag</option>
					<?php 
			
					
					$homeId=$_SESSION['homeId'];
					$sql_hag = "SELECT * FROM home_hag WHERE home='$homeId'";
					$result_hag = mysqli_query($connect,$sql_hag);
					
					while($rowHag=mysqli_fetch_array($result_hag)){
					
					?>
						<option value="<?php echo $rowHag['id']?>"><?php echo $rowHag['name']?></option>
						
					<?php 
					
					}
					?>
				</select>
				
				
				<select class="form-control" name="ROOM">
				<option value="">Select Room</option>
					<?php 
				
					
					$homeId=$_SESSION['homeId'];
					$sql_room = "SELECT * FROM home_room WHERE home='$homeId'";
					$result_room = mysqli_query($connect,$sql_room);
					
					while($rowRoom=mysqli_fetch_array($result_room)){
					
					?>
						<option value="<?php echo $rowRoom['id']?>" ><?php echo $rowRoom['name']?></option>
						
					<?php 
					
					}
					?>
				</select>
   			
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add">
            </div>
            </form>
            </div>
            <?php          
 }
 }

 ?>
 
 						


 <div style="clear:both"></div>
    <h2 align="center"> My Sensor List</h2>
    <div id="scroll-window" class="table-responsive">
    <table class="table table-hover table-inverse">
    
      	<thead>
		    <tr>
			   	  <th>No.</th>
			      <th>Sensor Type</th>
			      <th>Sensor Name</th>
			      <th>HAG Name</th>
			      <th>Room Name</th>
			      <th>Action</th>

		      
		    </tr>
  		</thead>

 <?php 
 
  
 
 $action=$_GET['action'];
 
 if ($action=='delete'){
 	$id=$_GET['id'];
 	$delete=mysqli_query($connect,"DELETE FROM sensor WHERE id='$id'");
 	
 }
 
 	$item_array = array(
 			'id' => $_GET["id"],
 			'type' => $_POST["hidden_name"],
 	
 	);
 	
 	$sensorTypeId=$item_array["id"];
 	$sensorType=$item_array["type"];
 	$sensorName=$_POST['sensorname'];
 	$select_hag=$_POST['HAG'];
 	$select_room=$_POST['ROOM'];
 	$homeId=$_SESSION['homeId'];
 	$sql_sensor=mysqli_query($connect,"INSERT INTO sensor (name, room, hag, type) VALUES ('$sensorName','$select_room','$select_hag','$sensorTypeId')");

 	
 	$sql_result=mysqli_query($connect,"SELECT sensor_type.type AS SenType, sensor.name AS SenName, home_hag.name AS HagName, home_room.name AS RoomName, sensor.id FROM sensor JOIN sensor_type ON sensor.type=sensor_type.id JOIN home_hag ON sensor.hag=home_hag.id JOIN home_room ON sensor.room=home_room.id WHERE home_hag.home='$homeId'");

 	
 	$i=1;
	while ($row=mysqli_fetch_array($sql_result)){
		
		echo "
 		 <tbody>
 			<tr>

				<td>".$i."</td>
				<td>".$row['SenType']."</td>
				<td>".$row['SenName']."</td>
            	<td>".$row['HagName']."</td>
				<td>".$row['RoomName']."</td>
            		
            		
				<td>
					<a href='user_profile_sensors_manage.php?action=delete&id=".$row['id']."' > Delete </a>					
				</td>
            		
	
			</tr>
            
         
            
		 </tbody>
		";

		$i++;
	} 


?>


      </table>
    </div>
        </div>
        
<div class="container">
             
  <ul class="pager">
  		<li><a href="manage_profile.php" class="btn btn-space btn-lg" type="button" >Manage Home</a></li>
   	   <li> <a id="homeaddress" href="user_profile_hag_manage.php" class="btn btn-space btn-lg" type="button" >Edit Hag</a></li>
	 	 <li> <a id="homeaddress" href="user_profile_room_manage.php" class="btn btn-space btn-lg" type="button" >Edit Room</a></li>
	 	 <li> <a id="homeaddress" href="manage_profile.php" class="btn btn-space btn-lg" type="button" >Done</a></li>
  </ul>
</div>

<?php include ("main_footer.php");?>


 </body>
</html>