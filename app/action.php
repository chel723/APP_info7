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