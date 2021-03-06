<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Control Panel</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="user_profile_room.css">
<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Handlee" rel="stylesheet">

<!-- jQuery library-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


</head>
<body>




<img class="logo" src="logo.png" alt="Logo">
<div class="container" style="width:60%;">
 <h1 align="center">Control Panel</h1>
     
 <?php
    
 $query = "SELECT * FROM sensor_type ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  	
     while ($row = mysqli_fetch_array($result))
 {      
 ?>
            <div class="col-md-3">
            <form method="POST" action="newfile2.php?action=add&id=<?php echo $row["id"];?>">
            
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["type"]; ?></h5>
                
            <input type="hidden" name="hidden_name" value="<?php echo $row["type"]; ?>">
            
            
   			Select Hag 	<select class="form-control" name="HAG">
					<?php 
				
					$con=mysqli_connect('localhost','root','root');
					
					if(!$con){
						echo 'Not connected to server';
					}
					
					if(!mysqli_select_db($con, 'APP')){
						echo 'database not selected';
					}
					
					$homeId=$_SESSION['homeId'];
					$sql_hag = "SELECT * FROM home_hag WHERE home='$homeId'";
					$result_hag = mysqli_query($con,$sql_hag);
					
					while($rowHag=mysqli_fetch_array($result_hag)){
					
					?>
						<option value="<?php echo $rowHag['id']?>"><?php echo $rowHag['name']?></option>
						
					<?php 
					
					}
					?>
				</select>
				
				
				Select Room <select class="form-control" name="ROOM">
					<?php 
				
					$con=mysqli_connect('localhost','root','root');
					
					if(!$con){
						echo 'Not connected to server';
					}
					
					if(!mysqli_select_db($con, 'APP')){
						echo 'database not selected';
					}
					
					$homeId=$_SESSION['homeId'];
					$sql_room = "SELECT * FROM home_room WHERE home='$homeId'";
					$result_room = mysqli_query($con,$sql_room);
					
					while($rowRoom=mysqli_fetch_array($result_room)){
					
					?>
						<option value="<?php echo $rowRoom['id']?>" ><?php echo $rowRoom['name']?></option>
						
					<?php 
					
					}
					?>
				</select>
				
				Select Sensor 	<select class="form-control" name="HAG">
					<?php 
				
					$con=mysqli_connect('localhost','root','root');
					
					if(!$con){
						echo 'Not connected to server';
					}
					
					if(!mysqli_select_db($con, 'APP')){
						echo 'database not selected';
					}
					
					$homeId=$_SESSION['homeId'];
					$sql_hag = "SELECT * FROM home_hag WHERE home='$homeId'";
					$result_hag = mysqli_query($con,$sql_hag);
					
					while($rowHag=mysqli_fetch_array($result_hag)){
					
					?>
						<option value="<?php echo $rowHag['id']?>"><?php echo $rowHag['name']?></option>
						
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
    <h2 align="center">My Sensor List</h2>
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
 
 $con=mysqli_connect('localhost','root','root');
 
 if(!$con){
 	echo 'Not connected to server';
 }
 
 if(!mysqli_select_db($con, 'APP')){
 	echo 'database not selected';
 }
    
 
 $action=$_GET['action'];
 
 if ($action=='delete'){
 	$id=$_GET['id'];
 	$delete=mysqli_query($con,"DELETE FROM sensor WHERE id=$id");
 	
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
 	$sql_sensor=mysqli_query($con,"INSERT INTO sensor (name, room, hag, type) VALUES ('$sensorName','$select_room','$select_hag','$sensorTypeId')");

 	
 	$sql_result=mysqli_query($con,"SELECT sensor_type.type AS SenType, sensor.name AS SenName, home_hag.name AS HagName, home_room.name AS RoomName, sensor.id FROM sensor JOIN sensor_type ON sensor.type=sensor_type.id JOIN home_hag ON sensor.hag=home_hag.id JOIN home_room ON sensor.room=home_room.id WHERE home_hag.home='$homeId'");

 	
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
					<a href='newfile2.php?action=delete&id=".$row['id']."' > Delete </a>					
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
    <li><a href="newfile1.php">Previous</a></li>
    <li><a href="http://www.google.fr">Next</a></li>
  </ul>
</div>




 </body>
</html>