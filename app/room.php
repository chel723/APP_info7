<?php

session_start();
$connect = mysqli_connect("localhost", "root", "root", "APP");



 $query_data=mysqli_query($connect,"SELECT * FROM data_temperature JOIN sensor ON sensor.id=data_temperature.sensor WHERE sensor.id='23' ORDER BY data_temperature.id DESC LIMIT 1");

 if(mysqli_num_rows($query_data) > 0)
 {
 	 
 	while ($row_data = mysqli_fetch_array($query_data)){

 		echo $row_data['temperature'];
 }
 }
?>        