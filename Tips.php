<?PHP session_start();?>
<html>
<head>
<title>Client\Services</title>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

<script type="text/javascript">
function div_hide()
{
	document.getElementById('abc').style.display = "none";
}

var data;
function show(name,image)
{
	document.getElementById('abc').style.display="block";
	
	var str = image.split("/");
	var Service_Id = (str[str.length-1]).substring(0, str[str.length-1].lastIndexOf("."));
	var SId = (str[str.length-1]).substring(0, str[str.length-1].lastIndexOf("."));
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			document.getElementById("tip").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "TipFile.php?Service_Id=" +Service_Id, true);
	xhttp.send();
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
	left:560px;
	top:-9px;
	cursor:pointer
}

form 
{
	max-width:50%;
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
	top:10%;
	margin-left:-228px;
	font-family:'Raleway',sans-serif
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

#page
{
	font-family:comic sans ms;
	font-size:40;
}

#link
{
	height:170;
	width:120;
	text-align:center;
	font-family:"segoe UI";	
	font-size:20;
	font-weight:700;
	position:reative;
	float:left;
	margin:3%;
	cursor: pointer;
}
#tip
{
	width:100%;
	height:100%;
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

#a_Link
{
	position:absolute;
    display: block;
    margin-top:-80px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
	cursor:pointer;
}
</style>

</head>
<body>
<div id="google_translate_element" style="float:right"></div>
<header id="head">
	<img src="Image/Home_Logo.png" id="fimage">
	
	<a href='Logout_Client.php' id="a_Link" style="margin-left:83%;margin-top:-35px;">Logout</a>
	<a href='Help_Client.php' id="a_Link" style="margin-left:94%;margin-top:-35px;">Help</a>
	<?php
	
		$eid=$_SESSION["Client_Session"]; 
		$cn=mysqli_connect("localhost","root","root");
		$db=mysqli_select_db($cn, "home care");
		$q=mysqli_query($cn, "select C_Name from client_details where C_Email_Id='$eid'");
		if($q)
		{
			$row=mysqli_fetch_row($q);
			echo "<a value='$row[0]' id='name' style='margin-top:30px'>$row[0]</a>";
			
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
			$db=mysqli_select_db($cn, "home care");
			
			if($db)
			{
				$q=mysqli_query($cn, "select * from service");
				
				if($q)
				{
					while($row=mysqli_fetch_row($q))
					{
						$dirname = "TipImage/$row[0]";
						
						$images = glob($dirname."*.*");
						
						foreach($images as $image) 
						{	
							echo "<div id=\"link\" onclick=\"show('". $row[1] ."', '". $image ."')\">".'<div id=\"image\"><img id=\"img_pic\" height=140 width=120 src="'.$image.'"></div>'.$row[1].'</div>';
						}
					}
				}
			}
		}	
?>
		
<div id="abc">
	
	<div id="popupContact">
	<form action="#" id="form" method="POST" name="form">
	<h2>Tips For Service</h2>
		<div id="tip" name="tip">
		</div>
	</form>
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	</div>
	
</div>
</body>

</html>