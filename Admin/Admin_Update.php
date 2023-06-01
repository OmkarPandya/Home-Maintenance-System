<html>
<body>

<form method="post">

<input list="table" id="tabs" name="tabs"/>

<datalist id='table'>
<option value="service"></option>
<option value="sub_service"></option>
<option value="coupon"></option>
</datalist>
<input type="submit" name="open" value="Open"/>
</form>
</body>
</html>
<?PHP
	if(isset($_POST['open']))
	{
		$cn=mysql_connect("localhost","root","");
		$db=mysql_selectdb("home care");
		
		$t=$_POST['tabs'];
		$query = "select * from $t";
		$result = mysql_query($query);
		if(($result))
		{
			echo "<table  border='1' cellspacing='5px' cellpadding='5px'><tr>";
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
					
					echo "<td><a href=UpdateInfo.php?q=".$t.">Edit</a>"."</td></tr>";
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
?>