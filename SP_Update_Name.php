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
table
{
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
input[type=email],input[type=text] 
{
	width:100%;
	padding:10px;
	border:1px solid #2e312f;
	padding-left:40px;
	margin-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
form
{
	font-family:segoe ui;
	padding:10px 50px;
	border:2px solid white;
	border-radius:10px;
	font-family:"segoe ui";
	background-color:#fff
}
input[type=submit] 
{
	width:20%;
	display:block;
	background-color:#2e312f;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	font-family:"segoe ui";
	font-weight:500;
	border-radius:5px;
}
#left
{
	text-align:right;
	padding-top:5%
	padding-right:5%;
}
#right
{
	width:70%;
}
</style>
</head>
<body>
<center>
<form method="post">
<br><br><br><br><br><br>
<table cellpadding="5" cellspacing="5">
<?php
	session_start();
	
	$dt=$_GET["data"];
	
	echo "<tr><th id=left>Old Name</th><td id=right><input type=text value='$dt' readonly/></td></tr>";
	echo "<tr><th id=left>New Name</th><td id=right><input type=text name='newd'/></td></tr>";
	echo "<tr><td colspan='2'><center><input type='submit' value='Update' name='submit'/></td></tr> ";
	
?>
</table>
</form>
</center>
</body>
</html>
<?php

$cn=mysqli_connect("localhost","root","root");
	if(isset($_POST["submit"]))
	{
		$nd=$_POST["newd"];
		$c=$_SESSION["SP_Session"];
		
		if($cn)
		{
			$db=mysqli_select_db($cn, "home care");
			if($db)
			{
				$q=mysqli_query($cn, "update service_provider_details set S_P_Name='$nd' where S_P_Id='$c'");
				if($q)
				{	
					header("location:ServiceProvider_Profile.php");
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
	}
	else
	{
		mysqli_error($cn);
	}
?>