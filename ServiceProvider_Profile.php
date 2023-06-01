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
<table border="3" cellpadding="25" cellspacing="5">
<?PHP
	$c=$_SESSION['SP_Session'];
	
	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		
		if($db)
		{
			$q=mysqli_query($cn,"Select * from service_provider_details where S_P_Id='$c'");
			
			if($q)
			{
				while($row=mysqli_fetch_row($q))
				{
					echo "<tr><th>Name</th><td>".$row[1]."</td><td><a href='SP_Update_Name.php?data=$row[1]'>Update</a></td></tr>";
						
					echo "<tr><th>Experience Year</th><td>".$row[2]."</td></td><td><a href='SP_Update_EYear.php?data=$row[2]'>Update</a></td></tr>";
						
					echo "<tr><th>Contact</th><td>".$row[4]."</td></td><td><a href='SP_Update_Contact.php?data=$row[4]'>Update</a></td></tr>";
					
					echo "<tr><th>City</th><td>".$row[5]."</td></td><td><a href='SP_Update_City.php?data=$row[5]'>Update</a></td></tr>";
					
					echo "<tr><th>Address</th><td>".$row[6]."</td></td><td><a href='SP_Update_Address.php?data=$row[6]'>Update</a></td></tr>";
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