<html>
<head>
<style>
input[list=table]
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
</style>
</head>
<body>

<form method="post">

<input list="table" id="tabs" name="tabs"/>

<datalist id='table'>

<?php

	$cn=mysql_connect("localhost","root","");
	if($cn)
	{
		$db=mysql_select_db("home care");
		if($db)
		{
			$q=mysql_query("show tables");
			
			if($q)
			{	
				while($row=mysql_fetch_row($q))
				{
					echo "<option value='$row[0]'>$row[0]</option>";
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
	}
	else
	{
		mysql_error();
	}

?>
</datalist>
<input type="submit" name="open" value="Open"/>
</form>
</body>
</html>
<?PHP

	if(isset($_POST['open']))
	{
		$t=$_POST['tabs'];
		$query = "select * from $t";
		$result = mysql_query($query);
		if(($result))
		{
			echo "<center><table  border='1' cellspacing='5px' cellpadding='5px'><tr>";
			if(mysql_num_rows($result)>0)
			{
				$i = 0;
				while ($i < mysql_num_fields($result))
				{
				   echo "<th>". mysql_field_name($result, $i) . "</th>";
				   $i++;
				}
				echo "</tr>";
			
				while ($rows = mysql_fetch_array($result,MYSQL_ASSOC))
				{
					echo "<tr>";
					foreach ($rows as $data)
					{
						echo "<td align='center'>". $data . "</td>";
					}
					
					echo "</tr>";
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