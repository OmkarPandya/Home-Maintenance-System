-<script src="Popup.js" type="text/javascript"></script>
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
	height:32%;
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

<body>
<div id="AddService">
	
	<form action="#" id="form" method="post" name="form" enctype="multipart/form-data">
	
	<h2>Add Service</h2>
	
	<hr>

	<?php
	
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)			
			{
				$q=mysql_query("select MAX(Service_Id) from service");
				if($q)
				{
					while($row=mysql_fetch_array($q))
					{
						$x=substr($row[0],1,3);
					
						if($x<=8)
						{
							$s='S00';
							$y=$x+1;
							$ans=$s.$y;
						}
						if($x<=98 && $x>=9)
					{
							$s='S0';
							$y=$x+1;
							$ans=$s.$y;
						}
						else if($x>=198 && $x>=99)
						{
						
							$s='S';
							$y=$x+1;
							$ans=$s.$y;
						}
						
						echo "<input type='text' name='sid' id='sid' value='$ans' placeholder='Service Id'required>";
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
	
	<input type="text" name="s_name" placeholder="Service Name" id="s_name" required>
	
	<input type="text" name="c_price" placeholder="Service Contract Price" id="c_price" required>
	
	<div id="bupic">
	<input	type="file" name="upload" id="upload" placeholder="Profile Photo"
    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
		<img style="margin-top:-5%;margin-left:65%;margin-bottom:1%;"id="blah" alt="your image" width="150" height="150"/>
	</div>
	
	<input type="submit" name="serviceadd" id="serviceadd" value="Add Service"><br>
	
	</form>
	</body>
	</html>
<?php

	if(isset($_POST["serviceadd"]))
	{
		$serid=$_POST['sid'];
		
		$sname=$_POST['s_name'];
		
		$cprice=$_POST['c_price'];
		
		//file
		
		$aname=$_FILES['upload']['name'];
		
		$ext=substr($aname,-4);

		$pname=$_FILES['upload']['name'];
		
		$path=$_SERVER['DOCUMENT_ROOT'].'/Home Care/Services/';
	
		$fpath=$path.$serid.$ext;
		
		//file
		
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{
				$q=mysql_query("insert into service values('$serid','$sname','$cprice')");
				
				if($q && (move_uploaded_file($_FILES['upload']['tmp_name'],$fpath)))
				{
					echo "<script>alert('Service added Successfully');</script>";
				}
				else
				{
					echo "<script>alert('Service not added Successfully');</script>";
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