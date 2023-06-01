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
	<th>Service Name</th>
	<th>Service Provider Name</th>
	<th>Contract Plan</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Total Cost</th>
</tr>
<?php

	$emailid=$_SESSION["Client_Session"];
	
	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				
				$q=mysqli_query($cn,"select * from contract_details where C_Email_Id='$emailid'");
					
				if($q)
				{
					while($row=mysqli_fetch_array($q))
					{
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[2]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<tr><td>".$sname[0]."</td>";
						
						$q3=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[3]'");
						$spname=mysqli_fetch_row($q3);
						
						echo "<td><a href='Client_ServiceProvider.php?spid=$row[3]'>".$spname[0]."</a></td>";
						
						echo "<td>$row[4]</td>";
						
						echo "<td>$row[5]</td>";
						
						echo "<td>$row[6]</td>";
				
						echo "<td>$row[7]</td></tr>";
					}
					
					while($ans=mysqli_fetch_row($q))
					{
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