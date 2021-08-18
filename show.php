<html>
	<head>
	<style>
	h1
	{
		font-family: verdana;
		font-size: 52px;     
 		color: red;
 		text-align: center; 
 		text-decoration: underline
	}
	body
	{
		background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
	}
	table, th, td
	{
		margin-left:7em;
		text-align:center;
		border:solid blue;
		font-family: verdana; 
 		color:Yellow; 
 		font-size: 30px; 
 	}
	a
	{
		margin-left:32em;
		font-family: verdana; 
 		color:Yellow; 
 		font-size: 30px; 
 		font-weight: bold;
 	}
	</style>
    </head>
	<body>
<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="leave";

	$conn=mysqli_connect($server,$username,$password,$database);
	
	
	if(!$conn)
	{
		die("Connection Failed ". mysqli_connect_error());
	}
	
	$id=$_GET["eid"];
	$sql = "SELECT * FROM leaveform";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$eid = $row["employee_id"];
		if($id==$eid)
		{
			echo '<h1>Employee Table</h1>';
			echo '<br><br><table cellpadding=10px>
					<tr>
						<th style="color:green;"> Employee ID </th>
						<th> Casual Leave </th>
						<th> Medical Leave </th>
						<th> Earned Leave </th>
					</tr> ';
			echo " <tr>";
				echo "<td style='color:green;'>";
				echo "<b>" .$row["employee_id"] . "</b>";
				echo "</td>";
				
				echo "<td>"; 
				echo $row["Casual_leave"]; 
				echo "</td>";
                
				echo "<td>"; 
				echo $row["Medical_leave"]; 
				echo "</td>";
                
				echo "<td>"; 
				echo  $row["Earned_leave"]; 
				echo "</td>";
			echo "</tr>";
			break;
		}
	}
?>		</table>
		<br><br><br><br>
		<a href="index.php"> <-Back to Form </a>	
	</body>
</html>