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
<br><br>
<center>
<table border="2" cellpadding="13" cellspacing="4">

<tr>
	<th>Booking Date</th>
	<th>Provide on..</th>
	<th>Service Name</th>
	<th>Sub Service Name</th>
	<th>Service Provider Name</th>
	<th>Provided?</th>
</tr>
<?php

	$emailid=$_SESSION["Client_Session"];
	
	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				
				$q=mysqli_query($cn,"select * from client_service_details where Client_Email_Id='$emailid'");
				
				if($q)
				{
					while($row=mysqli_fetch_row($q))
					{
						echo "<tr><td>".$row[6]."</td>";
						
						if($row[8]==1)
						{
							echo "<td>".$row[7]."</td>";
						}
						else
						{
							echo "<td>Not Provided</td>";
						}
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[2]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<td>".$sname[0]."</td>";
						
						$q2=mysqli_query($cn,"select S_Sub_Name from sub_service where S_Sub_Id='$row[3]'");
						$ssname=mysqli_fetch_row($q2);
						
						echo "<td>".$ssname[0]."</td>";
						
						$q3=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[4]'");
						$spname=mysqli_fetch_row($q3);
						
						echo "<td><a href='Client_ServiceProvider.php?spid=$row[4]'>".$spname[0]."</a></td>";
						
						if($row[8]==1)
						{
							echo "<td><img src='Image/Right.png' height=50 width=50></td>";
						}
						else
						{
							echo "<td><img src='Image/Wrong.png' height=50 width=50></td>";
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
		else
		{
			mysqli_error($cn);
		}
?>
</table>
</center>
</body>
</html>