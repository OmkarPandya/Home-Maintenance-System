<?PHP
	$query_string=$_REQUEST['Id'];
?>
<html>
<head>
<script src="Popup.js" type="text/javascript"></script>
<style type="text/css">

header 
{
	height:17.2%;
	width:100%;
	background-color:red;
}
#Link
{
    display: block;
    margin-top:-70px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	color:black;
	font-weight:600;
}
#main_c
{
	height:auto;
	width:100%;
	background-color:#907856;
}
img#close 
{
	position:absolute;
	right:-40px;
	top:-9px;
	cursor:pointer
}

form 
{
	max-width:450px;
	min-width:250px;
	padding:10px 50px;
	border:2px solid white;
	border-radius:10px;
	font-family:"segoe ui";
	background-color:#fff;
	margin-left:30%;
}

#bupic
{
	border:1px solid #250d00;
	width:100%;
	height:25.6%;
	margin-top:30px;
}

#upload
{
	width:70%;
	padding:-50px;
	resize:none;
	padding-left:20px;
	padding-top:10px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
h2 
{
	background-color:#250d00;
	padding:20px 35px;
	color:white;
	margin:-10px -50px;
	text-align:center;
	border-radius:10px 10px 0 0;
	font-family:"segoe ui";
}

hr 
{
	margin:10px -50px;
	border:0;
	border-top:1px solid #ccc
}

input[type=email],input[type=text],input[list=ser_name] 
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #250d00;
	padding-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
#upload
{
	width:70%;
	padding:-50px;
	resize:none;
	padding-left:20px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
input[type=submit]
{
	width:100%;
	text-align:center;
	display:block;
	background-color:#250d00;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	border-r""adius:5px;
	margin-top:30px;
	font-family:"segoe ui";
	font-weight:500;
}
</style>
</head>
<body>
<br><br>
<div id="AddService">
	
	<form  id="form" method="post" name="form" enctype="multipart/form-data">
	
	<h2>Add Service</h2>
	
	<hr>
	<?PHP
		$cn=mysql_connect("localhost","root","");
		if($cn)
		{
			$db=mysql_selectdb("home care");
			if($db)
			{
				$q=mysql_query("Select * from sub_service where S_Sub_Id='$query_string'");
				if($q)
				{
					while($row=mysql_fetch_array($q))
					{
						echo "<input type='text' name='sid' value='$row[0]' readonly>";
						echo "<input type='text' name='s_sid' value='$row[1]' readonly>";
						echo "<input type='text' name='s_s_name' value='$row[2]'>";
						echo "<input type='text' name='s_s_charge' value='$row[3]'>";
					}
				}
			}
			else
			{
				mysql_error();
			}
		}
	?>

	<input type="submit" name="sub">
	</form>

<?PHP
	if(isset($_POST["sub"]))
	{
		$id=$_POST["sid"];
		$sid=$_POST["s_sid"];
		$sname=$_POST["s_s_name"];
		$scharge=$_POST["s_s_charge"];
		
		$cn=mysql_connect("localhost","root","");
		if($cn)
		{
			$db=mysql_selectdb("home care");
			if($db)
			{
				$q=mysql_query("update sub_service set S_Sub_Name='$sname',S_Sub_Charge='$scharge' where S_Sub_Id ='$sid'");
				
				if($q)
				{
					echo "<script>alert('Sub Service Updated Successfully');</script>";
				}
				else
				{
					echo "<script>alert('Sub Service not Updated Successfully');</script>";
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
?>
</div>
</body>
</html>