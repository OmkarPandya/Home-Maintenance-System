<?php

	$r=$_POST["record"];
	$d=$_POST["datep"];
	
	if(isset($_POST["updatep"]))
	{
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				
					$qtr2=mysqli_query($cm,"update Contract_Details set Payment='1' where C_Id='$_POST[record]'");
					
					if($qtr2)
					{
						echo "<h1 style='font-size:20;text-align:center;margin-top:15%;font-family:segoe ui;'>Done</p>";
					}
					else
					{
						echo "<h1 style='font-size:20;text-align:center;margin-top:15%;font-family:segoe ui;'>Not Done</p>";;
					}
					$da=date("y-m-d");
				
					$qtr3=mysql_query("update Contract_Record set P_Date='$da',Provided=1 where C_Id='$_POST[record]'");
				
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

?>	