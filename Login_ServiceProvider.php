<html>
<head>
<title>Login ServiceProvider</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

<script src="Popup.js" type="text/javascript"></script>
<style type="text/css">
body
{
	background-repeat:repeat;
}

#abc 
{
	width:100%;
	height:100%;
	opacity:.95;
	top:0;
	left:0;
	display:none;
	position:fixed;
	background-color:#3f1701;
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
	font-family:"segoe ui";
	background-color:#fff;
}

div#popupContact 
{
	position:absolute;
	left:50%;
	top:20%;
	margin-left:-228px;
	font-family:"segoe ui";
}

input[type=text],input[type=password] 
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #250d00;
	padding-left:30px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
	color:#250d00;
}

input[type=checkbox]
{
	width:10%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	color:#2e312f;
}

#submit 
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
	font-family:"segoe ui";
	font-weight:600;
	border-radius:5px;
	margin-top:30px;
}

#create 
{
	width:60%;
	text-align:center;
	color:#250d00;
	padding:10px 0;
	font-size:20px;
	font-weight:700;
	cursor:pointer;
	margin-top:30px;
	margin-left:64%;
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

img#back 
{
	position: absolute;
	left: 0px;
	top: 0px;
	z-index:-1;
	opacity:0.7;
}

#Link
{
	position:relative;
    display: block;
    margin-top:-70px;
    font-family:"segoe ui";
	font-size:40px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
}

@keyframes slider
{
	0%
	{
		Left:0%;
	}
	20%
	{
		Left:0%;
	}
	25%
	{
		Left:-0%;
	}
	45%
	{
		Left:-100%;
	}
	50%
	{
		Left:-100%;
	}
	70%
	{
		Left:-200%;
	}
	75%
	{
		Left:-300%;
	}
	95%
	{
		Left:-300%;
	}
	100%
	{
		Left:-400%;
	}
}

#slider
{
	height:65%;
	width:99.6%;
	overflow:hidden;
	border-style:solid;
}
#a_Link
{
	position:absolute;
    display: block;
    margin-top:-70px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
	cursor:pointer;
}
footer
{
	height:62%;
	width:100%;
	background:black;
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
</style>

</head>
<body id="body"onload="show()">
<div id="google_translate_element" style="float:right"></div>
<header>
	
	<img id="fimage" src="Image/Home_Logo.png">
	<a id="a_Link" style="margin-left:82%;" onClick="show()">Login</a>
	<a href="Help_ServiceProvider.php" id="a_Link" style="margin-left:92%;">Help</a>

</header>

<div id="slider">
	<figure>
	<img src="C/C6.jpg" height="100%" width="100%">
	<img src="C/C7.jpg" height="100%" width="100%">
	<img src="C/C8.jpg" height="100%" width="100%">
	<img src="C/C9.png" height="100%" width="100%">
	<img src="C/C1.jpg"	height="100%" width="100%">
	<img src="C/C3.jpg" height="100%" width="100%">
	<img src="C/C4.jpg" height="100%" width="100%">
	<img src="C/C5.jpg" height="100%" width="100%">
	
	</figure>
</div>
<div id="abc">
	
	<div id="popupContact">
	
	<form action="Login_ServiceProvider_Check.php" id="form" method="post" name="form">
	<img id="close" src="Image/Close_S.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Login</h2>
	
	<hr>
	
	<input type="text" name="s_id" placeholder="Service Provider Id" type="text" id="sid">
	<input type="password" name="s_password" placeholder="Password" >
	<input type="checkbox" name="remember_me" id="remember_me"><font style="font-size:20px; font-family:segoe ui;font-weight:700;color:#250d00;">Remember Me
	</font>
	<input type="submit" name="submit" id="submit" value="Login"></a><br>
	<a href="Register_ServiceProvider.php" id="create">New Account</a>
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