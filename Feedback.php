<?php
session_start();
?>
<html>
<head>
<title>Client\Feedback</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

<script type="text/javascript">
function show(name, image)
{
	document.getElementById('abc').style.display = "block";	
	document.getElementById('spname').value = name;
	var str = image.split("/");
	var spid = (str[str.length-1]).substring(0, str[str.length-1].lastIndexOf("."));
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			document.getElementById("serviceList").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "Fetch_Services.php?spid=" + spid, true);
	xhttp.send();
}
function div_hide()
{
	document.getElementById('abc').style.display = "none";
}

</script>

<style type="text/css">

#abc 
{
	width:100%;
	height:100%;
	opacity:.90;
	top:0;
	left:0;
	display:none;
	position:fixed;
	background-color:#7b7d7b;
	overflow:auto;
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
	max-width:350px;
	min-width:250px;
	padding:10px 50px;
	border:2px solid white;
	border-radius:10px;
	font-family:raleway;
	background-color:#fff
}

div#popupContact 
{
	position:absolute;
	left:50%;
	top:1%;
	margin-left:-228px;
	font-family:'Raleway',sans-serif
}

input[type="email"]
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:segoe ui;
	font-weight:500;
}

input[type=text]
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:segoe ui;
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
	font-family:segoe ui;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	font-weight:500;
	border-radius:5px;
	margin-top:30px;
}

#create 
{
	width:60%;
	text-align:center;
	color:#2e312f;
	padding:10px 0;
	font-size:20px;
	font-weight:700;
	cursor:pointer;
	margin-top:30px;
	margin-left:67.4%;
}

h2 
{
	background-color:#2e312f;
	padding:20px 35px;
	color:white;
	margin:-10px -50px;
	text-align:center;
	border-radius:10px 10px 0 0;
	font-family:Lucida Fax;
}

hr 
{
	margin:10px -50px;
	border:0;
	border-top:1px solid #ccc
}

input[type=text],#srname
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:segoe ui;
	font-weight:500;
}

#link
{
	height:260;
	width:210;
	text-align:center;
	font-family:"segoe UI";	
	font-size:20;
	font-weight:700;
	//background-color:lightgrey;
	border:1px solid black;
	position:reative;
	float:left;
	margin:2.8%;
	//padding:1% 1% 1% 1%;
	cursor: pointer;
}

#img_pic
{
	height:210;
	width:210;
	position:relative;
}

textarea
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:segoe ui;
	font-weight:500;
}
footer
{
	height:62%;
	width:100%;
	background:black;
	clear:both;
}
#para
{
	font-family:segoe ui;
	font-weight:600;
	font-size:25;
	color:white;
}
#atag
{
	color:purple;
}
#a_Link
{
	position:absolute;
    display: block;
    margin-top:-30px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
	cursor:pointer;
}
#name
{
	position:absolute;
    display: block;
    font-family:"segoe ui";
	font-size:35px;
	text-decoration:none;
	color:black;
	font-weight:600;
	cursor:pointer;
	top:10;
    right:0;
}
</style>

</head>
<body>
<div id="google_translate_element" style="float:right;"></div>

<header id="head">
	<img src="Image/Home_Logo.png" id="fimage">
	<a href="Logout_Client.php" id="a_Link" style="margin-left:85%;">Logout</a>
	<a href="Help_Client.php" id="a_Link" style="margin-left:94.5%;">Help</a>
	<?php
	
		$eid=$_SESSION["Client_Session"]; 
		$cn=mysqli_connect("localhost","root","root");
		$db=mysqli_select_db($cn,"home care");
		$q=mysqli_query($cn,"select C_Name from client_details where C_Email_Id='$eid'");
		if($q)
		{
			$row=mysqli_fetch_row($q);
			echo "<a value='$row[0]' id='name' style='margin-top:2%;'>$row[0]</a>";
			
		}
		else
		{
			mysqli_error($cn);
		}
	?>
</header>
<?php

		$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$q=mysqli_query($cn,"select * from service_provider_details");
		
				if($q)
				{
					while($row=mysqli_fetch_row($q))
					{
						$dirname = "Service_Provider/$row[0]";
						
						$images = glob($dirname."*.*");
						
						foreach($images as $image) 
						{	
							echo "<div id=\"link\" onclick=\"show('". $row[1] ."', '". $image ."')\">".'<div id=\"image\"><img  id=\"img_pic\" height=230 width=210 src="'.$image.'"></div>'.$row[1].'</div>';
						}
					}
				}
			}
		}	
?>
<div id="abc">
	
	<div id="popupContact">
	
	<form action="#" id="form" method="POST" name="form">
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2 style="font-family:segoe ui;">Feedback</h2>
	
	<hr>
	
	<input type="text"  id="spname" name="spname" readonly/>
	
	<input type="text" placeholder="Select Service" list="sr_name" id="srname" name="srname" />
	<div id="serviceList">
	</div>
	
	<input type="email" name="c_email" placeholder="Email" type="text" id="email" value="<?php echo $_SESSION["Client_Session"];?>" readonly>
	
	<textarea name="feed" id="feed" rows="10" cols="20"></textarea>
	
	<input type="submit" name="submit" id="submit" value="Feedback"></a><br>
	
	</form>
	
	</div>
	
</div>
<footer>
	<center><br>
	<img src="Image/Logo.png"/>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;">
		<u>Vision</u></b>
		: Our goal is to provide the most preferable &amp; affordable service provider in service based market.
	</p>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;">
		<u>Mission</u></b> 
		: To access the need of every individual for providing organized services in the market &amp; make the difference.
	</p>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;">
		<u>Mail</u> <u>Us</u></b> 
		: <a href="" id="atag">homemaintenance2024@gmail.com</a>
	</p>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;"><a href="index.php" style="color:orange;">Go to Home</a></b>
	</p>
	<p id="para">
		&copy; 2022 Home Care All Rights Reserved
	</p>
	</center>
</footer>
</body>
</html>

<?php

	if(isset($_POST["submit"]))
	{
		$eid=$_SESSION["Client_Session"];
		$srname=$_POST["srname"];
		$serpid=$_POST["serpid"];
		$feed=$_POST["feed"];
		$d=date('Y-m-d');
		
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$q=mysqli_query($cn,"select Service_Id from service where Service_Name='$srname'");
				if($q)
				{
					$row=mysqli_fetch_row($q);
					
					$serid=$row[0];
					
					$q1=mysqli_query($cn,"insert into feedback_details values(NULL,'$eid','$feed','$d','$serid','$serpid')");
					
					if($q1)
					{
						echo "<script>alert('Thanks for giving Feedback');</script>";
					}
					else
					{
						echo "<script>alert('Feedback Not Created');</script>";
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
		}
		else
		{
			mysqli_error($cn);
		}
	}

?>