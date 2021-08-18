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
	a
	{
 		margin-left:13em;
		font-family: verdana; 
 		color:Yellow; 
 		font-size: 36px; 
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
	
	$sql = "SELECT * FROM leaveform";
	$result = mysqli_query($conn, $sql);
	$id=$_POST['id'];
	if(isset($_POST['leavetype']))
		$leavetype=$_POST['leavetype'];
	$noofleaves=$_POST['noofleaves'];
	$flag=0;
	while($row = mysqli_fetch_assoc($result))
	{
		$eid = $row["employee_id"];
		if($id==$eid)
		{
			$flag=1;
			if($leavetype==2)
			{
				$ml=$row["Medical_leave"];
				$noofleaves=$ml-$noofleaves;
				if($noofleaves<=-1)
				{
					echo "<h1>Leaves not available!!!</h1><br><br>";
					echo '<a href="index.php"> <-Back to Form </a>';
				}
				else
					$sql="UPDATE leaveform SET Medical_leave='$noofleaves' where employee_id='$id'";
			}
			else if($leavetype==1)
			{
				$cl=$row["Casual_leave"];
				$noofleaves=$cl-$noofleaves;
				if($noofleaves<=-1)
				{
					echo "<h1>Leaves not available!!!</h1><br><br>";
					echo '<a href="index.php"> <-Back to Form </a>';
				}
				else
					$sql="UPDATE leaveform SET Casual_leave='$noofleaves' where employee_id='$id'";
					
			}
			else if($leavetype==3)
			{
				$el=$row["Earned_leave"];
				$noofleaves=$el-$noofleaves;
				if($noofleaves<=-1)
				{
					echo "<h1>Leaves not available!!!</h1><br><br>";
					echo '<a href="index.php"> <-Back to Form </a>';
				}
				else
					$sql="UPDATE leaveform SET Earned_leave='$noofleaves' where employee_id='$id'";
			}
			if($noofleaves>-1)
			{
				if(mysqli_query($conn,$sql))
				{
					echo "<h1>Leave Approved!!!</h1><br><br>";
					echo '<a href="show.php?eid='.$id.'"> Show available leaves-> </a>';
				}	
				else
				{
					echo "Error" . mysqli_error($conn);
				}
			}
			break;
		}
	}
	if($flag==0)
	{
		$noofleaves=12-$noofleaves;
		if($leavetype==1)
		{
			$sql1="INSERT INTO leaveform(employee_id,Casual_leave,Medical_leave, Earned_leave)
				VALUES('$id','$noofleaves','12','12')";
		}
		else if($leavetype==2)
		{
			$sql1="INSERT INTO leaveform(employee_id,Casual_leave,Medical_leave, Earned_leave)
				VALUES('$id','12','$noofleaves','12')";
		}
		else if ($leavetype==3)
		{
			$sql1="INSERT INTO leaveform(employee_id,Casual_leave,Medical_leave, Earned_leave)
				VALUES('$id','12','12','$noofleaves')";
		}
		if(mysqli_query($conn,$sql1))
		{
			echo "<h1>Leave Approved!!!</h1><br><br>";
			echo '<a href="show.php?eid='.$id.'"> Show available leaves-> </a>';
		}	
		else
		{
			echo "Error" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);	
?>
	</body>
</html>
