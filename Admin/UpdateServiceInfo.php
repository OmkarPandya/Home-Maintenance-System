<?PHP
$query_string= unserialize($_REQUEST['Id']);

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
	border-radius:5px;
	margin-top:30px;
	font-family:"segoe ui";
	font-weight:500;
}
</style>
</head>
<body>
<br><br>
<br><br>
<div id="AddService">
	
	<form action="#" id="form" method="post" name="form" enctype="multipart/form-data">
	
	<h2>Add Service</h2>
	
	<hr>

	<input type="text" name="sid" value="<?PHP echo $query_string["Service_Id"];?>" readonly>
	<input type="text" name="sname" value="<?PHP echo $query_string["Service_Name"];?>">
	<input type="text" name="sprice" value="<?PHP echo $query_string["C_Price"];?>">
	<input type="submit" name="sub">
	</form>
</div>
</body>
</html>
<?PHP
	if(isset($_POST["sub"]))
	{
		$sid=$_POST["sid"];
		$sname=$_POST["sname"];
		$sprice=$_POST["sprice"];
		
		$cn=mysql_connect("localhost","root","");
		if($cn)
		{
			$db=mysql_selectdb("home care");
			if($db)
			{
				$q=mysql_query("update service set Service_Name='$sname',C_Price='$sprice' where Service_Id='$sid'");
				if($q)
				{
					echo "<script>alert('Service Updated Successfully');</script>";
				}
				else
				{
					echo "<script>alert('Service not Updated Successfully');</script>";
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