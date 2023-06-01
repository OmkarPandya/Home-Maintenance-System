<?PHP session_start();?>
<html>
<head>
<script src="Popup.js" type="text/javascript"></script>
<title>Admin Panel</title>
<style type="text/css">

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
}
img#close 
{
	position:absolute;
	right:-40px;
	top:-9px;
	cursor:pointer;
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
<body bgcolor="#250d00">
<br><br><br><br><br><br><br><br>
<div id="main_c">
		
	<!--Add Service-->
	<div id="AddService">
	
	<form id="form" method="post" name="form" enctype="multipart/form-data">
	
	<h2>Add Service</h2>
	
	<input list="ser_name" id="servicelist" placeholder="Select Service" name="servicelist">
	<datalist id="ser_name">
	<hr>

	<?php
	
		$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)			
			{
				$q=mysqli_query($cn,"select * from service");
				if($q)
				{
					while($row=mysqli_fetch_array($q))
					{
						echo "<option>".$row[1]."</option>";
					}
				}
				else
				{
					echo mysqli_error($cn);
				}
			}
			else
			{
				echo mysqli_error($cn);
			}	
		}
		else
		{
			echo mysqli_error($cn);
		}
	
	?>
	</datalist>
	<input type="submit" name="sadd" id="sadd" value="Add Service">
	</form>
	</div>
</body>
</html>
<?PHP

	if(isset($_POST['sadd']))
	{
		$sName=$_POST['servicelist'];
		
			$cn=mysqli_connect("localhost","root","root");
			if($cn)
			{
				$db=mysqli_select_db($cn,"home care");
				if($db)
				{
					$q=mysqli_query($cn,"Select Service_Id from service where  Service_Name='$sName'");
					if($q)
					{
					  $sid=mysqli_fetch_row($q);
					}
					else
					{
						echo mysqli_error($cn);
					}
				}
				else
				{
					mysqli_error($cn);
				}
			}
			else
			{
				mysqli_error($cn);
			}
		$spid=$_SESSION['SP_Session'];
		
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$q=mysqli_query($cn,"insert into service_provider_services values(null,'$sid[0]','$spid')") ;
				if($q)
				{
					echo "<script>alert('Service Added Successfully');</script>";
				}
				else
				{
					echo "<script>alert('Unsuccessfully');</script>";
				}
			}
		}
	}
?>