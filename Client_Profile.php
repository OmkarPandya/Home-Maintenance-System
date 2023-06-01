<?php
	session_start();
?>

<html>
<head>
<style type="text/css">
table
{
	text-align:center;
	font-family:"segoe ui";
}
th
{
	font-weight:800;
	font-size:25;
}
td
{
	font-weight:600;
	font-size:23;
}
</style>
</head>
<body>
<center>
<br><br><br>
<table border="3" cellpadding="25" cellspacing="5">
<?PHP
	$c=$_SESSION['Client_Session'];
	
	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		
		if($db)
		{
			$q=mysqli_query($cn,"Select * from client_details where C_Email_Id='$c'");
			
			if($q)
			{
				while($row=mysqli_fetch_row($q))
				{
					echo "<tr><th>Name</th><td>".$row[0]."</td><td><a href='Client_Update_Name.php?data=$row[0]'>Update</a></td></tr>";
						
					echo "<tr><th>Contact</th><td>".$row[2]."</td></td><td><a href='Client_Update_Contact.php?data=$row[2]'>Update</a></td></tr>";
						
					echo "<tr><th>City</th><td>".$row[3]."</td></td><td><a href='Client_Update_City.php?data=$row[3]'>Update</a></td></tr>";
						
					echo "<tr><th>Address</th><td>".$row[4]."</td></td><td><a href='Client_Update_Address.php?data=$row[4]'>Update</a></td></tr>";
				}
			}
			else
			{
				mysqli_error($cn);
			}
				
		}
		else
		{
			mysqli_error($cn);
		}
	}
?>
</table>
</body>
</html>