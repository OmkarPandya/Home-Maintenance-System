<html>
<head>
<title>Client\LoginClient</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script src="Popup.js" type="text/javascript"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>
<style type="text/css">
body
{
	background-repeat:repeat;
}

#abc 
{
	width:100%;
	height:100%;
	opacity:.90;
	top:0;
	left:0;
	display:none;
	position:fixed;
	background-color:#3e423f;
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
	background-color:#fff
}

div#popupContact 
{
	position:absolute;
	left:50%;
	top:20%;
	margin-left:-228px;
	font-family:"segoe ui";
}

#email 
{
	background-repeat:no-repeat;
	background-position:5px 7px
}

input[type=email],input[type=password]
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
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
	background-color:#2e312f;
	color:#fff;
	border:1px solid white;
	padding:10px 0;
	font-size:20px;
	cursor:pointer;
	font-family:"segoe ui";
	font-weight:500;
	border-radius:5px;
	margin-top:30px;
}

h2 
{
	background-color:#2e312f;
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
	z-index: -1;
	opacity:0.7;
}

#Link
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
	width:100%;
	overflow:hidden;
	border-style:solid;
	animation-duration:20s;
	animation-name:slider;
	animation-iteration-count:infinite;
}

#slider figure img
{
	width:20%;
	float:left;
}
	
#slider figure
{
	position:relative;
	width:500%;
	animation:15s slider infinite; 
	margin:0%;
	left:0%;
}
#fa
{
	width:100%;
	cursor:pointer;
	text-decoration:none;
}
</style>

</head>

<body id="body" style="overflow:hidden" onload="show()">
<div id="google_translate_element"></div>

<header id="head">
	<img src="Image/Home_Logo.png" id="fimage">
	<a id="Link" style="margin-left:82%;" onClick="show()">Login</a>	
	<a href="Help_Client.php" id="Link" style="margin-left:92%;">Help</a>
</header>

<div id="slider">
	<figure>
	<img src="C/C1.jpg"	height="100%" width="100%">
	<img src="C/C2.jpg"	height="100%" width="100%">
	<img src="C/C3.jpg" height="100%" width="100%">
	<img src="C/C4.jpg" height="100%" width="100%">
	<img src="C/C5.jpg" height="100%" width="100%">
	
	</figure>
</div>

<div id="abc">
	<div id="popupContact">
	
	<form action="Login_Client_Password_Update.php" id="form" method="POST" name="form" >
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Login</h2>
	
	<hr>
	
	<input type="email" name="c_email" placeholder="Email" type="text" id="email">
	<input type="password" name="c_password" placeholder="New Password" >
	<input type="checkbox" name="remember_me" id="remember_me"><font style="font-size:20px; font-family:segoe ui;font-weight:700;color:#2e312f;">Remember Me
	</font>
	<input type="submit" name="submit" id="submit" value="Login"></a><br>
	<div id="fa">
		<a href="ForgetPassword.php" style="font-weight:700;color:#2e312f;font-size:20px;">ForgetPassword</a>
		<a href="Register_Client.php" id="create" style="margin-left:15%;font-weight:700;color:#2e312f;font-size:20px;">New Account</a>
	</div>
	</form>
	</div>
	
</div>
</body>
</html>