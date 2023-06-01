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
<table border="2" cellpadding="13" cellspacing="4">

<tr>
	<th>Booking Date</th>
	<th>Client Email Id</th>
	<th>Service Name</th>
	<th>Update</th>
</tr>
<?PHP
	session_start();
	
	$sp= $_SESSION['SP_Session'];
	
	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		
		if($db)
		{
			$q=mysqli_query($cn,"Select * from Contract_details where S_P_Id='$sp'");
			if($q)
			{				
				while($row=mysqli_fetch_array($q))
				{
					$q1=mysqli_query($cn,"select * from Contract_record where Provided=0 AND C_Id='$row[0]'");
					
					$payment=$row[8];
					
					if($q1)
					{
						while($row1=mysqli_fetch_array($q1))
						{
							
								echo "<tr><td>".$row1[2]."</td>";
							
								echo "<td><a href='ClientInfo.php?cid=$row[1]'>".$row[1]."</a></td>";
								
								$q2=mysqli_query("select Service_Name from service where Service_Id='$row[2]'");
								$sname=mysqli_fetch_array($q2);
								
								echo "<td>".$sname[0]."</td>";
							
								echo "<td><a href='Update_S_AMC.php?rid=$row[0]&snm=$sname[0]'>Update</a></td></tr>";	
							
							
						}
					}
					else
					{
						mysqli_error($cn);
					}
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
</center>
</body>
</html>