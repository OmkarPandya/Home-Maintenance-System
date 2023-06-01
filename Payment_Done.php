<?php

	if(isset($_POST["updatep"]))
	{
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$qtr2=mysqli_query($cn,"update Client_Service_Details set Payment=1 where Record_No=$rcid");
				
				if($qtr2)
				{
					echo "done";
				}
				else
				{
					echo "not done";
				}
			}
		}
	}

?>