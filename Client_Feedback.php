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
<body style="overflow:visible">
<br><br>
<center>
<table border="2" cellpadding="13" cellspacing="4">
<colgroup>
       <col span="1" style="width: 15%;">
       <col span="1" style="width: 20%;">
       <col span="1" style="width: 15%;">
       <col span="1" style="width: 55%;">
</colgroup>
<tr>
	<th>Date</th>
	<th>Service Name</th>
	<th>Service Provider Name</th>
	<th>Feedback</th>
</tr>
<?php

	$emailid=$_SESSION["Client_Session"];
	
	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$q=mysqli_query($cn,"select * from feedback_details where C_Email_Id='$emailid'");
				
				if($q)
				{
					while($row=mysqli_fetch_row($q))
					{
						echo "<tr><td>".$row[3]."</td>";
						
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[4]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<td>".$sname[0]."</td>";
						
						$q3=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[5]'");
						$spname=mysqli_fetch_row($q3);
						
						echo "<td><a href='Client_ServiceProvider.php?spid=$row[5]'>".$spname[0]."</a></td>";
						
						echo "<td>$row[2]</td></tr>";
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