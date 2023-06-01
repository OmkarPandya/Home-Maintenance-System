<?php
	session_start();
?>

<html>
<head>
<link rel="shortcut icon" href="Image/Logo.png">
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
#a_Link
{
	position:absolute;
    display: block;
    margin-top:-60px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
	cursor:pointer;
}
#name
{
	position:absolute;
    display: block;
    font-family:"segoe ui";
	font-size:35px;
	text-decoration:none;
	color:black;
	font-weight:600;
	cursor:pointer;
	top:10;
    right:0;
}
</style>

</head>
<body>
<div id="google_translate_element"></div>
<center>
<br><br>
<table border="2" cellpadding="13" cellspacing="4">

<tr>
	<th>Booking Date</th>
	<th>Service Name</th>
	<th>Sub Service Name</th>
	<th>Service Provider Name</th>
	<th>Cancel</th>
</tr>
<?php

	$emailid=$_SESSION["Client_Session"];
	
	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				
				$q=mysqli_query($cn,"select * from client_service_details where Client_Email_Id='$emailid' AND Provided=0");
				
				if($q)
				{
					while($row=mysqli_fetch_row($q))
					{
						echo "<tr><td>".$row[6]."</td>";
						
						
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[2]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<td>".$sname[0]."</td>";
						
						$q2=mysqli_query($cn,"select S_Sub_Name from sub_service where S_Sub_Id='$row[3]'");
						$ssname=mysqli_fetch_row($q2);
						
						echo "<td>".$ssname[0]."</td>";
						
						$q3=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[4]'");
						$spname=mysqli_fetch_row($q3);
						
						echo "<td><a href='Client_ServiceProvider.php?spid=$row[4]'>".$spname[0]."</a></td>";
					
						echo "<td><a href='Cancle.php?rno=$row[0]'>Cancle Service</a></td>";
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
