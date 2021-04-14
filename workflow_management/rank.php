<html>
<head>
 <title> Retrive rank</title></head>
<style type="text/css">
 body {
  background-image: url('4.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
	height: 50px;
  vertical-align: bottom;
    border: 1px solid black;
    
    padding: 8px;

}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {
  background-color: #eee;
}
tr:nth-child(odd) {
 background-color: #fff;
}
 th {
height: 50px;
  vertical-align: TOP;
border: 1px solid black;
  color: black;
  background-color: white;
}

    
</style>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "","Pilot_Project");
$sele = "SELECT count(*),task_receiver,task_status FROM task where task_status='completed' group by task_receiver,task_status order by count(*) desc";
	$result = mysqli_query($conn,$sele);
$sele1 = "SELECT count(*),task_receiver,task_status FROM task where task_status='working' group by task_receiver,task_status order by count(*) desc";
	$result1 = mysqli_query($conn,$sele1);
$sele2 = "SELECT count(*),task_receiver,task_status FROM task where task_status='pending' group by task_receiver,task_status order by count(*) desc";
	$result2 = mysqli_query($conn,$sele2);
if($row = mysqli_num_rows($result) > 0){
	?>
<table align="center">
<tr>
<th>COUNT</th>
<th>RECIEVER ID</th>
<th>TASK STATUS</th>
</tr><?php
		while($row = mysqli_fetch_assoc($result)){
	?>
	<tr>

		<td><?php echo $row['count(*)']; ?></td>
		<td><?php echo $row['task_receiver']; ?></td>
		<td><?php echo $row['task_status']; ?></td>
		  
	</tr>
	
</table>

<?php
}
}

mysqli_free_result($result);


if($row = mysqli_num_rows($result1) > 0){
	?><br><table>
<tr>
<th>count name</th>
<th>receiver ID</th>
<th>task status</th>
</tr><?php
		while($row = mysqli_fetch_assoc($result1)){
	?>
	<tr>

		<td><?php echo $row['count(*)']; ?></td>
		<td><?php echo $row['task_receiver']; ?></td>
		<td><?php echo $row['task_status']; ?></td>
		  
	</tr></table>
<?php
}}
mysqli_free_result($result1);

if($row = mysqli_num_rows($result2) > 0){
	?><table>


<tr>
<th>COUNT</th>
<th>RECIEVER ID</th>
<th>TASK STATUS</th>
</tr><?php
		while($row = mysqli_fetch_assoc($result2)){
	?>
	<tr>

		<td><?php echo $row['count(*)']; ?></td>
		<td><?php echo $row['task_receiver']; ?></td>
		<td><?php echo $row['task_status']; ?></td>
		  
	</tr>
	
</table>

<?php
}
}

mysqli_free_result($result2);
mysqli_close($conn);
?>
</body>
</html>