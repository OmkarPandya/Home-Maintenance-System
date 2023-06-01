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
	<th>Provided Date</th>
	<th>Client Email Id</th>
	<th>Service Name</th>
	<th>Sub Service Name</th>
</tr>
<?PHP
	session_start();
	$sp= $_SESSION['SP_Session'];
	$cn=mysqli_connect("localhost","root","root");
	
	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		
		if($db)
		{
			$q=mysqli_query($cn,"Select * from client_service_details where S_P_Id='$sp' AND Provided=1");
			
			if($q)
			{
				while($row=mysqli_fetch_row($q))
				{
					echo "<tr><td>".$row[6]."</td><td>".$row[7]."</td>";
						
						$q4=mysqli_query($cn,"select Client_Email_Id from client_service_details where S_P_Id='$sp'");
						$email=mysqli_fetch_row($q4);
						
						echo "<td><a href='ClientInfo.php?cid=$email[0]'>".$email[0]."</a></td>";
						
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[2]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<td>".$sname[0]."</td>";
						
						$q2=mysqli_query($cn,"select S_Sub_Name from sub_service where S_Sub_Id='$row[3]'");
						$ssname=mysqli_fetch_row($q2);
						
						echo "<td>".$ssname[0]."</td>";
						
						$q3=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[4]'");
						$spname=mysqli_fetch_row($q3);		
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