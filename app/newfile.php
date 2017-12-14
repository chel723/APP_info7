<?php 

session_start();

$con=mysqli_connect('localhost','root','root');

if(!$con){
	echo 'Not connected to server';
}

if(!mysqli_select_db($con, 'APP')){
	echo 'database not selected';
}



?>



<form name="form" action="ajax.php" method="post">
<table>
<tr>
<td>Select Home	</td>
<td><select id="homedd" onChange="change_home()">
<option>Select Home</option>
<?php 
$uname=$_SESSION['uname'];
$query = "SELECT * FROM home WHERE username='$uname' ORDER BY id ASC";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result))
{

?>

<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"];?></option>
<?php 

}

?>
</select>
</td>

</tr>

<tr>
<td>Select Room</td>
<td>	
<div id="room">
<select>
<option>Select Room</option>
</select>

</div>
</td>
</tr>


<tr>
<td>Select Sensor</td>
<td>	
<div id="sensor">
<select>
<option>Select Sensor</option>
</select>

</div>
</td>
</tr>


</table>

<input type="submit" value="check">


</form>


<script type="text/javascript">

function change_home()
{
	var xmlhttp=new XMLHttpRequest ();
	xmlhttp.open("GET","ajax.php?home="+document.getElementById("homedd").value,false);
	xmlhttp.send(null);
	//alert(xmlhttp.responseText);
	document.getElementById("room").innerHTML=xmlhttp.responseText;
	
}


function change_room()
{
	var xmlhttp=new XMLHttpRequest ();
	xmlhttp.open("GET","ajax.php?room="+document.getElementById("roomdd").value,false);
	xmlhttp.send(null);
	//alert(xmlhttp.responseText);
	document.getElementById("sensor").innerHTML=xmlhttp.responseText;
}

function change_sensor()
{
	var xmlhttp=new XMLHttpRequest ();
	xmlhttp.open("GET","ajax.php?sensor="+document.getElementById("sensordd").value,false);
	xmlhttp.send(null);
	alert(xmlhttp.responseText);
	document.getElementById("data").innerHTML=xmlhttp.responseText;
}


</script>



