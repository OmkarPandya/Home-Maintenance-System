<?php
session_start();
?>
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
	margin-top:5%;
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
#image
{
	float:left;
	margin:8%;
}
</style>
</head>
<body>
<center>
<p style="font-size:30;font-weight:900;">Feedbacks</p>
<br>
<?php

	$spid=$_SESSION["SP_Session"];

	$cn=mysqli_connect("localhost","root","root");
		
	if($cn)
	{
			
		$db=mysqli_select_db($cn,"home care");
			
		if($db)
		{
				
			$q=mysqli_query($cn,"select * from feedback_details where S_P_Id='$spid'");
				
			if($q)
			{
				while($row=mysqli_fetch_row($q))
					{
						$dirname = "Services/$row[4]";
						
						$images = glob($dirname."*.*");
						echo "<table>";
						foreach($images as $image)
						{
							echo "<div id='f'><img id='image' height=150 width=150 src='".$image."'/>";
						}
						
						echo "<p id='date'>".$row[3]."</p>";
						
						$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[4]'");
						$sname=mysqli_fetch_row($q1);
						
						echo "<p id='email'>$row[1]</p>";
						
						echo "<p id='service'>".$sname[0]."</p>";
						
						$q3=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[5]'");
						$spname=mysqli_fetch_row($q3);
						
						echo "<p id='feedback'>$row[2]</p></div><br>";
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