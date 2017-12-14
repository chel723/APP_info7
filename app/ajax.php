<?php 


session_start();

$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'APP')){
	echo 'database not selected';
}


$home=$_GET["home"];
$room=$_GET["room"];
$sensor=$_GET["sensor"];


if($home!="")
{
			
			$res=mysqli_query($con, "SELECT home_room.name, home_room.id FROM home_room JOIN home ON home.id=home_room.home WHERE home_room.home='$home'");
			
			echo "<select id='roomdd' onChange='change_room();'>";
			echo "<option>Select Room</option>";
			while( $row = mysqli_fetch_array($res))
			{
				echo "<option value='$row[id]' >";echo $row["name"];echo "</option>";
			}
			echo "</select>";
}

if($room!="")
{
		
	$res=mysqli_query($con, "SELECT sensor.name, sensor.id FROM sensor JOIN home_room ON home_room.id=sensor.room WHERE home_room.id='$room' ORDER BY sensor.name ASC");
		
	echo "<select id='sensordd' onChange='change_sensor();'>";
	echo "<option>Select Sensor</option>";
	while( $row = mysqli_fetch_array($res))
	{
		echo "<option value='$row[id]' >";echo $row["name"];echo "</option>";
	}
	echo "</select>";
}

if($sensor!="")
{

	$res=mysqli_query($con, "SELECT sensor_data.data_time, sensor_data.data, sensor_type.unit FROM sensor_data JOIN sensor ON sensor.id=sensor_data.sensor JOIN sensor_type ON sensor.type=sensor_type.id WHERE sensor.id='$sensor' ORDER BY sensor_data.id DESC");

	
	while( $row = mysqli_fetch_array($res))
	{
				echo $row['data_time'];
				echo "<br>";
				echo $row['data'];
            	echo $row['unit'];
            	echo "<br>";

	}
	
	
}


?>