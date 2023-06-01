<html>
<head>
<style type="text/css">
body
{
	font-family:segoe ui;
}
sp_pic
{
	//border-style:solid;
	float:left;
	margin-left:10;
}
table
{
	text-align:center;
	font-family:"segoe ui";
}
th
{
	font-weight:800;
	font-size:30;
}
td
{
	font-weight:600;
	font-size:25;
}
#f
{
	height:auto;
	width:auto;
	border:solid;
	padding-left:5%;
	padding-right:10%;
	margin-left:20%;
	margin-right:20%;
}
#date
{
	font-size:30;
	font-weight:800;
}
#email
{
	font-size:25;
	font-weight:400;
}
#service
{
	font-size:25;
	font-weight:400;
}
#feedback
{
	font-size:20;
	font-weight:400;
}
</style>
</head>
<body>
<center>
<?php

	$cid=$_GET["cid"];
	
	$cn=mysqli_connect("localhost","root","root");
		
	if($cn)
	{
			
		$db=mysqli_select_db($cn,"home care");
			
		if($db)
		{
				
			$q=mysqli_query($cn,"select * from Client_details where C_Email_Id='$cid'");
				
			if($q)
			{
				while($row=mysqli_fetch_row($q))
				{
					echo "<table border=1 cellpadding='20' cellspacing='4'>";
					echo "<tr><th>Name</th><td>$row[0]</td></tr>";			
					echo "<tr><th>Email Id</th><td>$row[1]</td></tr>";			
					echo "<tr><th>Contact Number</th><td>$row[2]</td></tr>";			
					echo "<tr><th>City</th><td>$row[3]</td></tr>";			
					echo "<tr><th>Address</th><td>$row[4]</td></tr>";			
					echo "</table>";
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
</body>
</html>