<?php
	
		$ans= $_GET['service'];
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{
					
				$q=mysql_query("select MAX(S_Sub_Id) from sub_service where Service_Id IN (select Service_Id from service where Service_Name='$ans')");
				
				if($q)
				{
					$row=mysql_fetch_array($q);
				
					$a=substr($row[0],5,7);
				
					$a++;
					
					if($a<=8)
					{
						$b=substr($row[0],0,6);
						$c=$b."0".$a;
					}
					else if($a<=98)
					{
						$b=substr($row[0],0,5);
						$c=$b."0".$a;
					}
					else
					{
						$b=substr($row[0],0,5);
						$c=$b.$a;
					}
					
					if($c)
					{
						echo "<input type='text' name='s_s_id' placeholder='Sub Service Id' id='s_s_id' value='$c'>";
					}
					else
					{
						$qtr=mysql_query("select Service_Id from service where Service_Name='$ans'");
						$ids=mysql_fetch_array($qtr);
						$c=$ids[0]."_01";
						echo "<input type='text' name='s_s_id' placeholder='Sub Service Id' id='s_s_id' value='$c'>";
					}
				}
				else
				{
					mysql_error();
				}
			}
			else
			{
				echo mysql_error();
			}	
		}
		else
		{
			echo mysql_error();
		}
		
	?>