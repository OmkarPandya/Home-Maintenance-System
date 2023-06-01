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
	<th>Client Email Id</th>
	<th>Service Name</th>
	<th>Service Contract Plan</th>
	<th>Contract Start Date</th>
	<th>Contract End Date</th>
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
			$q=mysqli_query($cn,"Select * from contract_details where S_P_Id='$sp'");
			
			if($q)
			{
				while($row=mysqli_fetch_row($q))
				{
					echo "<tr><td><a href='ClientInfo.php?cid=$row[1]'>".$row[1]."</a></td>";
						
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[2]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<td>".$sname[0]."</td>";
						
						echo "<td>".$row[4]."</td>";
						echo "<td>".$row[5]."</td>";
						echo "<td>".$row[6]."</td></tr>";
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