<script src="Popup.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

var city = "";

setInterval(lookForChange, 100);

function lookForChange()
{
    var newCity = document.getElementById("srv_name").value;
    if (newCity != city) {
        city = newCity;
		display();
    }
}

function display()
{
	var x=document.getElementById("srv_name").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() 
	{
		if(this.readyState == 4 && this.status == 200) {
			document.getElementById("s_sub_id").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Admin_index_subservice.php?service="+x, true);
	xhttp.send();
}

</script>
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
<br><br>
<div id="AddSubService">
	
	<form action="#" id="form" method="post" name="form" enctype="multipart/form-data">
	
	<h2>Add Sub Service</h2>
	
	<hr>

	<input list="ser_name" name="srv_name" id="srv_name" placeholder="Select Service" onchange="display()">
	<datalist id="ser_name">
	
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
	
	<div id="s_sub_id">

	</div>
	
	<input type="text" name="s_s_name" placeholder="Sub Service Name" id="s_s_name" required/>
	
	<input type="text" name="s_s_price" placeholder="Sub Service Price" id="s_s_price" required/>
	
	<input type="submit" name="subsadd" id="subsadd" value="Add Sub Service" /><br>
	
	</form>
	
	</div>
	<?php
		if(isset($_POST["subsadd"]))
	{
		$sname=$_POST['srv_name'];

		$subid=$_POST['s_s_id'];
		
		$subname=$_POST["s_s_name"];
		
		$subprice=$_POST["s_s_price"];
		
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care");
			if($db)
			{
				$q1=mysql_query("select Service_Id from service where Service_Name='$sname'");
				
				$id_service=mysql_fetch_row($q1);
				
				$q=mysql_query("insert into sub_service values('$id_service[0]','$subid','$subname','$subprice')");
				
				if($q)
				{
					echo "<script>alert('Sub Service added Successfully');</script>";
				}
				else
				{
					echo "<script>alert('Sub Service not added Successfully');</script>";
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