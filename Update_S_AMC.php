<html>
<head>
<style type="text/css">
table
{
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}
input[type=email],input[type=text] 
{
	width:70%;
	padding:10px;
	border:1px solid #2e312f;
	padding-left:40px;
	margin-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

textarea 
{
	width:70%;
	height:95px;
	padding:10px;
	resize:none;
	border:1px solid #2e312f;
	padding-left:40px;
	margin-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

#submit 
{
	width:100%;
	text-align:center;
	display:block;
	background-color:#2e312f;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	border-radius:5px;
	margin-top:30px;
	font-family:"segoe ui";
}

form
{
	font-family:segoe ui;
	padding:10px 50px;
	border:2px solid white;
	border-radius:10px;
	font-family:"segoe ui";
	background-color:#fff
}
input[type=submit] 
{
	width:20%;
	text-align:center;
	display:block;
	background-color:#2e312f;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	margin-top:30px;
	font-family:"segoe ui";
	font-weight:500;
	border-radius:5px;
}
#left
{
	text-align:right;
	padding-top:5%
	padding-right:5%;
}
#right
{
	width:70%;
}
</style>
</head>
<body>
<?php

	$rid=$_GET["rid"];

	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn, "home care");
		
		if($db)
		{	
			$q1=mysqli_query($cn, "select * from Contract_Record where C_Id='$rid' and Provided=0");
			$rows=mysqli_fetch_array($q1);
			
			$q4=mysqli_query($cn, "select * from contract_details where C_Id='$rid'");
			$emailid=mysqli_fetch_array($q4);
		}
	}

?>
<center>
<form id="form" method="POST" name="form" action="Update_Done.php">
	<table cellpadding="5" cellspacing="5">
	
	<input type="hidden" name="myid" id="myid" value="<?php  echo $rows[0]; ?>" />
	<input type="hidden" name="rcid" id="rcid" value="<?PHP echo $rid; ?>"/>
	
	<tr>
	<td id="left">Booking Date : </td>
	<td id="right"><input readonly type="text" id="bdate"  name="bdate" value="<?php echo $rows[2];?>"></td>
	</tr>
	<tr>
	<td id="left">Email Id : </td>
	<td id="right"><input readonly type="text" id="emailid"  name="emailid" value="<?php echo $emailid[1];?>"></td>
	</tr>
	<tr>
	<td id="left">Service Name : </td>
	<td id="right"><input  type="text" id="servicename" name="servicename" value="<?php echo $_GET["snm"]; ?>"></td>
	</tr>
	<tr>
	<td id="left">Provided On : </td>
	<td id="right"><input readonly type="text" id="pdate" name="pdate" value="<?php echo date('Y-m-d');?>" /></td>
	</tr>
	<tr>
	<td colspan="2"><center><input target="booked" type="submit" value="Update" name="submit"/></td>
	</tr>
</form>
</body>
</html>