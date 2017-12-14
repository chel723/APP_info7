<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Domus</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta name="description" content="" />
        <meta name="keywords" content="jquery, circular menu, navigation, round, bubble"/>  
          <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Handlee" rel="stylesheet">
        <link rel="stylesheet" href="dashboard.css" type="text/css" media="screen"/>
    
        <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                font-family:Arial;
                background:#fff url(bg.png) no-repeat top left;
            }
            .title{
                width:548px;
                height:119px;
                position:absolute;
                top:400px;
                left:150px;
                background:transparent url() no-repeat top left;
            }
            a.back{
                background:transparent url() no-repeat top left;
                position:fixed;
                width:150px;
                height:27px;
                outline:none;
                bottom:0px;
                left:0px;
            }
            #content{
                margin:0 auto;
            }


        </style>
    </head>

    <body>


    
        <div id="content">
            <a class="back" href=""></a>
            

            <div class="navigation" id="nav">
            

                <div class="item user">
                    <img src="bg_user.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>My Home</h2>
                    
                    <ul>
 <?php  

 $uname=$_SESSION['uname'];      
 $query = "SELECT * FROM home WHERE username='$uname' ORDER BY id ASC";
 $result = mysqli_query($connect, $query);

  	do{
?>
                        <li><a href="dashboard.php?id=<?php echo $row["id"];?>"><?php echo $row["name"]; ?></a></li>
  <?php                
                  
       } while ($row = mysqli_fetch_array($result));

?>              
                    </ul>
                    
                </div>
 
          
                
                <div class="item home">
                    <img src="bg_home.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>My Rooms</h2>
                    
                    <ul>
   <?php 

 	$item_array = array(
 			'id' => $_GET["id"],
 			
 	);
 	
 	$_SESSION['homeId']=$item_array["id"];
	$homeId=$_SESSION['homeId'];
	
 $query_room = "SELECT home_room.name, home_room.id FROM home_room JOIN home ON home.id=home_room.home WHERE home.id='$homeId'";
 $result_room = mysqli_query($connect, $query_room);

  	do{
?>
                        <li><a href="dashboard.php?id=<?php echo $rowRoom["id"];?>"><?php echo $rowRoom["name"]; ?></a></li>
  <?php                
                  
       } while ($rowRoom = mysqli_fetch_array($result_room));
	 	
 	?>                    
                       
                    </ul>
                </div>
                
                
                
                <div class="item shop">
                    <img src="bg_shop.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>My Hags</h2>
                    <ul>
     <?php 

 $homeId=$_SESSION['homeId'];
 $query_hag = "SELECT home_hag.name, home_hag.id FROM home_hag JOIN home ON home.id=home_hag.home WHERE home.id='$homeId'";
 $result_hag = mysqli_query($connect, $query_hag);

  	do{
?>
                        <li><a href="dashboard.php?id=<?php echo $rowHag["id"];?>"><?php echo $rowHag["name"]; ?></a></li>
  <?php                
                  
       } while ($rowHag = mysqli_fetch_array($result_hag));
	 	
 	?>                                    

                    </ul>
                </div>
                
                                 <div class="item fav">
                    <img src="bg_fav.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Room-Sensor</h2>                   
                    <ul>  
         <?php 

 	$room_array = array(
 			'id' => $_GET["id"],
 			
 	);
 	
 	$roomId=$room_array["id"];
	

 $query_sensor1 = "SELECT sensor.name, sensor.id FROM sensor JOIN home_room ON home_room.id=sensor.room WHERE home_room.id='$roomId' ORDER BY sensor.name ASC";
 $result_sensor1 = mysqli_query($connect, $query_sensor1);

  	do{
?>
                        <li><a href="dashboard.php?id=<?php echo $rowSensor1["id"];?>"><?php echo $rowSensor1["name"]; ?></a></li>
  <?php                
                  
       } while ($rowSensor1 = mysqli_fetch_array($result_sensor1));
	 	
 	?>                   
                                    
                    </ul>
                </div>

                <div class="item camera">
                    <img src="bg_camera.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Hag-Sensor</h2>
                    <ul>
     <?php 

 	$hag_array = array(
 			'id' => $_GET["id"],
 			
 	);
 	
 	
	$_SESSION['hagId']=$hag_array["id"];
	$hagId=$_SESSION['hagId'];

 $query_sensor = "SELECT sensor.name, sensor.id FROM sensor JOIN home_hag ON home_hag.id=sensor.hag WHERE home_hag.id='$hagId' ORDER BY sensor.name ASC";
 $result_sensor = mysqli_query($connect, $query_sensor);

  	do{
?>
                        <li><a href="dashboard.php?id=<?php echo $rowSensor["id"];?>"><?php echo $rowSensor["name"]; ?></a></li>
  <?php                
                  
       } while ($rowSensor = mysqli_fetch_array($result_sensor));
	 	
 	?>    
                    
                    </ul>
                </div>
                
				                  <div class="container">
             

 
                <div class="title" id="scroll-window" >   
                <table class="table table-hover table-inverse">
               <?php echo "<tr><th>Date</th>
							              <th>Data</th></tr><br>"; ?>
                
                        
            <?php

$sensor_array = array(
 			'id' => $_GET["id"], 			
 	);

 	$sensorId=$item_array["id"];

 $query_data=mysqli_query($connect,"SELECT sensor_data.data_time, sensor_data.data, sensor_type.unit FROM sensor_data JOIN sensor ON sensor.id=sensor_data.sensor JOIN sensor_type ON sensor.type=sensor_type.id WHERE sensor.id='$sensorId' ORDER BY sensor_data.id DESC");

 if(mysqli_num_rows($query_data) > 0){
		


		while($row_data = mysqli_fetch_array($query_data)){
		echo "
 		
 			<tr>
			
				<td>".$row_data['data_time']."</td>
				<td>".$row_data['data']."</td>
            	<td>".$row_data['unit']."</td>
				
			</tr>
                 <br>
		";




}	
 	
 }
 
?>  
          </table>
          


            </div>
            </div>
            

        </div>
        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#nav > div').hover(
                function () {
                    var $this = $(this);
                    $this.find('img').stop().animate({
                        'width'     :'199px',
                        'height'    :'199px',
                        'top'       :'-25px',
                        'left'      :'-25px',
                        'opacity'   :'1.0'
                    },500,'easeOutBack',function(){
                        $(this).parent().find('ul').fadeIn(700);
                    });

                    $this.find('a:first,h2').addClass('active');
                },
                function () {
                    var $this = $(this);
                    $this.find('ul').fadeOut(500);
                    $this.find('img').stop().animate({
                        'width'     :'52px',
                        'height'    :'52px',
                        'top'       :'0px',
                        'left'      :'0px',
                        'opacity'   :'0.1'
                    },5000,'easeOutBack');

                    $this.find('a:first,h2').removeClass('active');
                }
            );
            });
        </script>
  <ul class="pager">
  
	 	 <li> <a class="homeaddress" href="main_page.php" class="btn btn-space btn-lg" type="button" >Back</a></li>
	 	 <li> <a class="homeaddress" href="manage_profile.php" class="btn btn-space btn-lg" type="button" >Manage Home</a></li>
  </ul>
</div>

    </body>
</html>