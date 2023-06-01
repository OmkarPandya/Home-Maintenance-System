<?php

	$rid=$_POST["myid"];
	
	$cn=mysqli_connect("localhost","root","root");
	
	if($cn)
	{
		$db=mysqli_select_db($cn, "home care");
		
		if($db)
		{
			$da=date("y-m-d");
			$q=mysqli_query($cn, "update contract_record set Provided=1,P_Date='$da' where Id=$rid");
			
			if($q)
			{
				echo "<h1 style='font-size:20;text-align:center;margin-top:15%;font-family:segoe ui;'>Done</p>";
			}
			else
			{
				echo "<h1 style='font-size:20;text-align:center;margin-top:15%;font-family:segoe ui;'>Not Done</p>";
			}
		}
		else
		{
			mysqli_error($cn);
		}
	}
	else

?>