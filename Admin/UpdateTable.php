<html>
<head>
<style>
table
{
	text-align:center;
	font-family:"segoe ui";
	color:white;
}
th
{
	font-weight:800;
	font-size:30;
	color:lightblue;
}
td
{
	font-weight:600;
	font-size:23;
}
input[list=tab]
{
	width:25%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
input[type=submit] 
{
	width:20%;
	text-align:center;
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
</style>
</head>
<body link="yellow" vlink="orange">

<form method="post">

<input list="tab" id="tabs" name="tabs"/>

<datalist id='tab'>
<option value="Service"></option>
<option value="Sub_Service"></option>
</datalist>
<input type="submit" name="open" value="Open"/>
</form>
</body>
</html>
<?PHP
	$cn=mysql_connect("localhost","root","");
	$db=mysql_selectdb("home care");
	if(isset($_POST['open']))
	{
		
		$t=$_POST['tabs'];
	
		if(strcmp($t,"Service")==0)
		{
			$query = "select * from $t";
			
			$result = mysql_query($query);
			
			if(($result))
			{
				echo "<center><br><table  border='1' cellspacing='10px' cellpadding='10px'><tr>";
				if(mysql_num_rows($result)>0)
				{
					$i = 0;
					while ($i < mysql_num_fields($result))
					{
					   echo "<th>". mysql_field_name($result, $i) . "</th>";
					   $i++;
					}
					echo "<th>Update</th>";
					echo "</tr>";
				
					while ($rows = mysql_fetch_array($result,MYSQL_ASSOC))
					{
						echo "<tr>";
						foreach ($rows as $data)
						{
							echo "<td align='center'>". $data . "</td>";
						}
						
						echo "<td><a href=UpdateServiceInfo.php?Id=".serialize($rows).">Update</a>"."</td></tr>";
					}
					
				}
				else
				{
					echo "<tr><td colspan='" . ($i+1) . "'>No Results found!</td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "Error in running query :". mysql_error();
			}
		}
		else
		{
			$query = "select * from $t";
			
			$result = mysql_query($query);
			
			if(($result))
			{
				echo "<center><br><table  border='1' cellspacing='10px' cellpadding='10px'><tr>";
				if(mysql_num_rows($result)>0)
				{
					$i = 0;
					while ($i < mysql_num_fields($result))
					{
					   echo "<th>". mysql_field_name($result, $i) . "</th>";
					   $i++;
					}
					echo "<th>Update</th>";
					echo "</tr>";
				
					while ($rows = mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td align='center'>". $rows[0] . "</td>";
						echo "<td align='center'>". $rows[1] . "</td>";
						echo "<td align='center'>". $rows[2] . "</td>";
						echo "<td align='center'>". $rows[3] . "</td>";
						
						echo "<td><a href=UpdateSubServiceInfo.php?Id=".$rows[1].">Update</a>"."</td></tr>";
					}
				}
				else
				{
					echo "<tr><td colspan='" . ($i+1) . "'>No Results found!</td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "Error in running query :". mysql_error();
			}
		}
		
	}	
?>