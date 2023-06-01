<?php
	
		$ans= $_GET['service'];
		
		echo "<input type='hidden' name='extra' id='extra' value='$ans'/>";
		
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{			
				$q=mysql_query("select * from sub_service where Service_Id IN (select Service_Id from service where Service_Name='$ans')"); 
				
				if($q)
				{
					echo "<input type='text' placeholder='Select Sub Service' name='ssub' list='subs' required/>";
					echo "<datalist id='subs' name='subs'>";
					
					while($row=mysql_fetch_array($q))
					{
						echo "<option value='$row[2]'>$row[1]</option>";
					}
					
					echo "</datalist>";
				}
				else
				{
					mysql_error();
				}
			}
			else
			{
				mysql_error();
			}
		}
		else
		{
			mysql_error();
		}
?>