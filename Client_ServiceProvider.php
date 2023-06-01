<html>
<head>
<style type="text/css">
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
</style>
</head>
<body>
<center>
<br><br>
<?php

	$spid=$_GET["spid"];
	
	$cn=mysqli_connect("localhost","root","root");
		
	if($cn)
	{
			
		$db=mysqli_select_db($cn,"home care");
			
		if($db)
		{
				
			$q=mysqli_query($cn,"select * from service_provider_details where S_P_Id='$spid'");
				
			if($q)
			{
				while($row=mysqli_fetch_row($q))
				{
					$dirname = "Service_Provider/$row[0]";
						
					$images = glob($dirname."*.*");
					
					echo "<table border=1 cellpadding='15'>";
					
					foreach($images as $image) 
					{	
						echo '<tr><td rowspan=7 ><img  id=\"sp_pic\" src="'.$image.'" height="250" width="250"></td></tr>';
					}
					
					echo "<tr><th>Name</th><td>$row[1]</td></tr>";			
					echo "<tr><th>Experience Year</th><td>$row[2]</td></tr>";			
					echo "<tr><th>Email Id</th><td>$row[3]</td></tr>";			
					echo "<tr><th>Contact Number</th><td>$row[4]</td></tr>";			
					echo "<tr><th>City</th><td>$row[5]</td></tr>";			
					echo "<tr><th>Address</th><td>$row[6]</td></tr>";			
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