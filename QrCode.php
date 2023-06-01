<?php
	$rcid=$_POST["rcid"];

	$p_date=$_POST["pdate"];
		
	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		
		if($db)
		{
			$qtr1=mysqli_query($cn,"update Client_Service_Details set P_Date='$p_date',Provided=1 where Record_No=$rcid");
			
			if($qtr1)
			{
				echo "<center><img src='Image\Icon.jpg'>";
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
<html>
<head>
<style type="text/css">

input[type=submit]
{
	width:20%;
	text-align:center;
	display:block;
	background-color:#2e312f;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	border-radius:5px;
	font-family:"segoe ui";
}

</style>
</head>
<body>
<form method="post">
<input type="hidden" name="rcid" value="<?php echo $_POST['rcid'];?>"/>
<input type="hidden" name="pdate" value="<?php echo $_POST['pdate'];?>"/>
<input type="submit" name="updatep" value="Payment Done"/>
</form>
</body>
</html>
<?php

	if(isset($_POST["updatep"]))
	{
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$qtr2=mysqli_query($cn,"update Client_Service_Details set Payment=1 where Record_No=$_POST[rcid]");
				
				if($qtr2)
				{
					echo "<h1 style='font-size:20;font-family:segoe ui;'>Done</p>";
				}
				else
				{
					echo "not done";
				}
			}
		}
	}

?>