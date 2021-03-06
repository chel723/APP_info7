<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Update Hags</title>
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
<h1 align="center">Update Hags</h1>
  
 <?php
    
 $query = "SELECT * FROM dropdown_hag ORDER BY id ASC";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
 while($row = mysqli_fetch_array($result))
 {      
 ?>
            <div class="col-md-3">
            <form method="POST" action="user_profile_hag_manage.php?action=add&id=<?php echo $row["id"];?>">
            
            <div style="border: 1px solid #eaeaec; margin: -1px 19px 3px -1px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); padding:10px;" align="center">
            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
            <h5 class="text-info"><?php echo $row["type"]; ?></h5>
                
            <input type="hidden" name="hidden_name" value="<?php echo $row["type"]; ?>">
            <input placeholder="Give it a Name" type="text" name="hagname" style="width:100%;">
           
            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-default" value="Add">
            </div>
            </form>
            </div>
            <?php          
 }
 }
 ?>
  
 <div style="clear:both"></div>
    <h2 align="center">My HAG List</h2>
    <div id="scroll-window" class="table-responsive">
    <table class="table table-hover table-inverse">
    
      	<thead>
		    <tr>
		   	  <th>No.</th>
		      <th>HAG</th>
		      <th>Name</th>
		      <th>Action</th>
		    </tr>
  		</thead>

 <?php 
 

    
 
 $action=$_GET['action'];
 
 if ($action=='delete'){
 	$id=$_GET['id'];
 	$delete=mysqli_query($connect,"DELETE FROM home_hag WHERE id=$id");
 	
 }
 
 
 	$item_array = array(
 			'id' => $_GET["id"],
 			'type' => $_POST["hidden_name"],
 	
 	);
 	
 	$hagTypeId=$item_array["id"];
 	$hagType=$item_array["type"];
 	$hagName=$_POST['hagname'];
 	$homeId=$_SESSION['homeId'];
 	$sql_homeHag=mysqli_query($connect,"INSERT INTO home_hag (name, type, home) VALUES ('$hagName','$hagTypeId',$homeId)");

 	
 	$sql=mysqli_query($connect,"SELECT dropdown_hag.type, home_hag.name, home_hag.id FROM dropdown_hag INNER JOIN home_hag ON home_hag.type=dropdown_hag.id WHERE home_hag.home =$homeId");

 	
 	$i=1;
	while ($row=mysqli_fetch_array($sql)){
		
		echo "
 		 <tbody>
 			<tr>

				<td>".$i."</td>
				<td>".$row['type']."</td>
				<td>".$row['name']."</td>
				<td>
					<a href='user_profile_hag_manage.php?action=delete&id=".$row['id']."' > Delete </a>					
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
	   <li> <a id="homeaddress" href="user_profile_room_manage.php" class="btn btn-space btn-lg" type="button" >Edit Room</a></li>
	 	 <li> <a id="homeaddress" href="user_profile_sensors_manage.php" class="btn btn-space btn-lg" type="button" >Edit Sensor</a></li>
	 	 <li> <a id="homeaddress" href="manage_profile.php" class="btn btn-space btn-lg" type="button" >Done</a></li>
  </ul>
</div>

  </div>
<?php include ("main_footer.php");?>
</div>
 </body>
</html>
