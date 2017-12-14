<?php
session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Domus</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="" />
        <meta name="keywords" content="jquery, circular menu, navigation, round, bubble"/>
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

<!--1.display user's home,choose user's home,get home's ID.-->
                <div class="item user">
                    <img src="bg_user.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>My Home</h2>
 <?php
if(empty($_GET['id1'] and $_SESSION["selectedhome"]))// if not set the second condition, after user choose one home, the following code will not be excuted.
{
 ?>             
                    <ul>
  <?php  
 $uname=$_SESSION['uname'];      
 $query = "SELECT * FROM home WHERE username='$uname' ORDER BY id ASC";
 $result = mysqli_query($connect, $query);

  	do{
 ?>
                        <li><a href="dashboard.php?id1=<?php echo $row["id"];?>"><?php echo $row["name"]; ?></a></li>
  <?php                
                  
       } while ($row = mysqli_fetch_array($result));
    //get home id,and set home id session. at the same time,set home name session,and display them out.
    $item_array = array('id' => $_GET["id1"],'');
    $_SESSION['homeId']=$item_array["id"];
    $homeId=$_SESSION['homeId'];
    
    $query5 = "SELECT name FROM home WHERE id='$homeId' ORDER BY id ASC";
    $result5 = mysqli_query($connect, $query5);
    $row5=mysqli_fetch_array($result5);
    echo $row5["name"];
    $_SESSION["selectedhome"]=$row5["name"];
   ?>              
                    </ul>
<?php  
 }else{
     echo $_SESSION["selectedhome"];
      }
?>
                </div>
<!--2-1.display room list,choose one room-->    
                <div class="item home">
                    <img src="bg_home.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>My Rooms</h2>
<?php
if(empty($_GET['id2'] and $_SESSION["selectedroom"]))
{
 ?> 
                    <ul>
   <?php 

 $query_room = "SELECT home_room.name, home_room.id FROM home_room JOIN home ON home.id=home_room.home WHERE home.id='$homeId'";
 $result_room = mysqli_query($connect, $query_room);

  	do{
?>
                        <li><a href="dashboard.php?id2=<?php echo $rowRoom["id"];?>"><?php echo $rowRoom["name"]; ?></a></li>
  <?php                
                  
       } while ($rowRoom = mysqli_fetch_array($result_room));
	 	
 $room_array = array('id' => $_GET["id2"],);
 $_SESSION['roomId']=$room_array["id"];
 $roomId=$_SESSION['roomId'];

 $_SESSION['selectedroom']=$roomId;
 $query_room6 = "SELECT home_room.name FROM home_room JOIN home ON home.id=home_room.home WHERE home.id='$homeId' and home_room.id='$roomId'";
 $result_room6 = mysqli_query($connect, $query_room6);
 $row6=mysqli_fetch_array($result_room6);
 $_SESSION['selectedroom']=$row6['name'];
 	?>                          
                    </ul>
<?php  
 }else{
     echo $_SESSION["selectedroom"];
      }
?>
                </div>
<!--2-2.display hagname list,choose one hags' name,get hag's ID -->        
                <div class="item shop">
                    <img src="bg_shop.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>My Hags</h2>


<?php
if(empty($_GET['id3'] and $_SESSION["selectedhag"]))
{
 ?> 
                     <ul>
<?php 
 $query_hag = "SELECT home_hag.name, home_hag.id FROM home_hag JOIN home ON home.id=home_hag.home WHERE home.id='$homeId'";
 $result_hag = mysqli_query($connect, $query_hag);

  	do{
?>
        <li><a href="dashboard.php?id3=<?php echo $rowHag["id"];?>"><?php echo $rowHag["name"]; ?></a></li>
  <?php                             
       } while ($rowHag = mysqli_fetch_array($result_hag));	

 $hag_array = array('id' => $_GET["id3"],);
 $_SESSION['hagId']=$hag_array["id"];
 $hagId=$_SESSION['hagId'];

 $query_hag7= "SELECT home_hag.id FROM home_hag JOIN home ON home.id=home_hag.home WHERE home.id='$homeId'";
 $result_hag7= mysqli_query($connect, $query_hag7);
 $row7=mysqli_fetch_array($result_hag7);
 $_SESSION['selectedhag']=$row7['name'];
    ?>                                    
                     </ul>
<?php  
 }else{
     echo $_SESSION["selectedhag"];
      }
?>
                </div>

<!--display room ID's sensor list, anc choose one sensor.get sensor's ID-->          
                    <div class="item fav">
                    <img src="bg_fav.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Room-Sensor</h2> 

<?php
if(empty($_GET['id4'] and $_SESSION["selectedsensorR"]))
{
 ?> 
                      <ul>  
<?php 
    $query_sensor1 = "SELECT sensor.name, sensor.id FROM sensor JOIN home_room ON home_room.id=sensor.room WHERE home_room.id='$roomId' ORDER BY sensor.name ASC";
    $result_sensor1 = mysqli_query($connect, $query_sensor1);

  	 do{
?>
            <li><a href="dashboard.php?id4=<?php echo $rowSensor1["id"];?>"><?php echo $rowSensor1["name"]; ?></a></li>
    <?php                
                  
       } while ($rowSensor1 = mysqli_fetch_array($result_sensor1));
    $sensor_array = array('id' => $_GET["id4"],);
    $_SESSION['sensorId']=$item_array["id"];
    $sensorId= $_SESSION['sensorId']

    $query_sensor8 = "SELECT sensor.name FROM sensor JOIN home_room ON home_room.id=sensor.room WHERE home_room.id='$roomId' ORDER BY sensor.name ASC";
    $result_sensor8 = mysqli_query($connect, $query_sensor8);
    $row8=mysqli_fetch_array($result_sensor8);
    $_SESSION['selectedsensorR']=$row8['name'];
 	?>                                   
                      </ul>
<?php  
 }else{
     echo $_SESSION["selectedsensorR"];
      }
?>
                    </div>







<!--display hagid's sensor,choose one sensor-->
                <div class="item camera">
                    <img src="bg_camera.png" alt="" width="199" height="199" class="circle"/>
                    <a href="#" class="icon"></a>
                    <h2>Hag-Sensor</h2>
<?php
if(empty($_GET['id5'] and $_SESSION["selectedsensorH"]))
{
 ?> 
                    <ul>
<?php 
    $query_sensor = "SELECT sensor.name, sensor.id FROM sensor JOIN home_hag ON home_hag.id=sensor.hag WHERE home_hag.id='$hagId' ORDER BY sensor.name ASC";
    $result_sensor = mysqli_query($connect, $query_sensor);

  	 do
      {
?>
        <li><a href="dashboard.php?id5=<?php echo $rowSensor["id"];?>"><?php echo $rowSensor["name"]; ?></a></li>
  <?php                
                  
       } while ($rowSensor = mysqli_fetch_array($result_sensor));
	 
    $sensor_array = array('id' => $_GET["id5"],);
    $_SESSION['sensorId']=$item_array["id"];
    $sensorId= $_SESSION['sensorId']	

    $query_sensor9 = "SELECT sensor.name FROM sensor JOIN home_hag ON home_hag.id=sensor.hag WHERE home_hag.id='$hagId' ORDER BY sensor.name ASC";
    $result_sensor9 = mysqli_query($connect, $query_sensor9);
    $row9=mysqli_fetch_array($result_sensor9);
    $_SESSION['selectedsensorH']=$row9['name'];
   ?>    
                    
                    </ul>
<?php  
 }else{
     echo $_SESSION["selectedsensorH"];
      }
?>
                </div>

<!--get the data ,display the data--> 
                <div class="title">           
<?php
    $query_data=mysqli_query($connect,"SELECT sensor_data.data_time, sensor_data.data, sensor_type.unit FROM sensor_data JOIN sensor ON sensor.id=sensor_data.sensor JOIN sensor_type ON sensor.type=sensor_type.id WHERE sensor.id='$sensorId' ORDER BY sensor_data.id DESC");

 if(mysqli_num_rows($query_data) > 0)
  {
	
		while($row_data = mysqli_fetch_array($query_data))
      {
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
    </body>
</html>