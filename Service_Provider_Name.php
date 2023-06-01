<?php

	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$qry = "SELECT * FROM service WHERE s.service_name IN (SELECT s_p_name FROM `service_provider_details` WHERE s_id='S001');";
				$q=mysqli_query($cn,$qry);
				
				if($q)
				{
					echo "<datalist id=sp_name'>";
	
					while($row=mysqli_fetch_row($q))
					{	
						echo "<option value='$row[1]' />$row[0]</option>";
					}
					echo "</datalist>";
				}
			}
		}

?>