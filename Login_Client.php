<html>
<head>
<title>Client\LoginClient</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script src="Popup.js" type="text/javascript"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function check_CapsLock(e)
{
    keycode = e.keyCode?e.keyCode:e.which;
    shift = e.shiftKey?e.shiftKey:((keycode == 16)?true:false);
    if(((keycode >= 65 && keycode <= 90) && !shift)||
        ((keycode >= 97 && keycode <= 122) && shift))
    {
        document.getElementById('caps_lock').style.display = 'block';
    }
    else
    {
        document.getElementById('caps_lock').style.display = 'none';
    }
}
</script>
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
	width:99.6%;
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

<body id="body" onload="show()">
<div id="google_translate_element" style="float:right;"></div>

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
	
	<form action="Login_Client_Check.php" id="form" method="POST" name="form" >
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Login</h2>
	
	<hr>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<input type="email" name="c_email" placeholder="Email" type="text" id="email">
	<input type="password" name="c_password" placeholder="Password" id="password" onkeypress="check_CapsLock(event)"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
	
	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');
		
		togglePassword.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			// toggle the eye slash icon
			this.classList.toggle('fa-eye-slash');
	});
	</script>
	<div id="caps_lock" style="color:red; font-weight:bold; display:none;">
Caps Lock is on!!!
</div>

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
