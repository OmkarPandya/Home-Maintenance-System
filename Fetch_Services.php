<?php

	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$spid = $_GET['spid'];
				
				echo "<input type='hidden' name='serpid' value='$spid'/>";
				
				$qry ="SELECT * FROM Service s WHERE s.service_id IN (SELECT service_id FROM `service_provider_services` WHERE s_p_id='$spid');";
				$q=mysqli_query($cn,$qry);
				
				if($q)
				{
					echo "<datalist id='sr_name'>";
	
					while($row=mysqli_fetch_row($q))
					{	
						echo "<option value='$row[1]' />$row[0]</option>";
					}
					echo "</datalist>";
				}
			}
		}
?>