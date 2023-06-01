<style>
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
<br><br>
<br><br><br>
<br><br><br>
<div id="RemoveService">
	
	<form action="#" id="form" method="post" name="form" enctype="multipart/form-data">
	
	<h2>Remove Service</h2>
	
	<hr>

	<input type="text" list="rser_name" name="rsr_name" id="rsr_name" placeholder="Select Service">
	<datalist id="rser_name">
	<?php
		
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{
				$q=mysql_query("select * from service");
				if($q)
				{
					while($row=mysql_fetch_array($q))
					{
						echo "<option value='$row[1]'>$row[0]</option>";
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
		}
		else
		{
			echo mysql_error();
		}
	
	?>
	
	</datalist>
	
	<input type="submit" name="serviceremove" id="serviceremove" value="Remove Service">
	
	</form>
	<?php
	if(isset($_POST["serviceremove"]))
	{
		$sname=$_POST["rsr_name"];
		
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{
				$ex=mysql_query("select Service_Id from service where Service_Name='$sname'");
			
				if($ex)
				{
					$data=mysql_fetch_array($ex);
					$final=$data[0];
					
					$q1=mysql_query("delete from service where Service_Id='$final'");
					
					if($q1)
					{
						$qtr2=mysql_query("delete from sub_service where Service_Id='$final'");
						
						$filename = "../Services/$final.*";
						
						if($qtr2 && array_map("unlink", glob($filename)))
						{
							echo "<script>alert('Service Deleted Successfully');</script>";
						}
						else
						{
							echo "<script>alert('Service Not Deleted Successfully');</script>";
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
		}
		else
		{
			echo mysql_error();
		}
	}
	?>