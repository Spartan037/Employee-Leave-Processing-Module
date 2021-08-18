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

?>
<!DOCTYPE html>
<html>
	<head>
	<title>Leave Form</title>
    <script>
		function validateLeaveForm()
		{
			var id=LeaveForm.id;
			var nol=LeaveForm.noofleaves;
			if(id.value=="")
			{
				window.alert("Please enter ID");
				id.focus();
				return false;
			}
			if(nol.value>12)
			{
				window.alert("The number of leaves should be less than or equal to 12");
				id.focus();
				return false;
			}
			return true;
		}
	</script>
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
	form
	{
		margin-left:19em;
 		font-family: verdana; 
 		color:Yellow; 
 		font-size: 22px; 
 		font-weight: bold;
 	}
	form input, form select
	{
 		font-family: verdana; 
 		color:blue; 
 		font-size: 18px; 
 		font-weight: bold;
 	}
	form button
	{
 		margin-left:12em;
		font-family: verdana; 
 		color:blue; 
 		font-size: 20px; 
 		font-weight: bold;
 	}
	</style>
    </head>
	<body>
		<h1>Leave Form</h1>
		<form  method="post" action="add.php" name="LeaveForm" onsubmit="return validateLeaveForm();">
			<br><br><label>Employee ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="number" name="id" id="id" placeholder="Employee ID">
			
			<br><br><label>Leave:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="leavetype" id="leavetype">
				<option name="cl" value="1">Select Leave Type</option>
				<option value="1" >Casual Leave</option>
 				<option value="2">Medical Leave</option>
				<option value="3">Earned Leave</option>	
			</select>
			
			<br><br><label>Number of Leaves:</label>
			<input type="textbox" name="noofleaves" class="form-control" id="noofleaves" placeholder="Number of Leaves">	
			<br><br>
			<br><br><button type="submit" class="btn btn-primary" id="register">Submit</button>
			</form>	
      </body>
</html>
