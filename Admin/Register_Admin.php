<html>
<head>
<title>Register Admin</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

<script>
function show()
{
	document.getElementById('abc').style.display="block";
}
function div_hide()
{
	document.getElementById('abc').style.display = "none";
}

function showPassword() {
	document.getElementById('c_password').setAttribute("type", "text");
	document.getElementById('showpass').src = "Image/eye_icon_show.png";
}

function hidePassword() {
	document.getElementById('c_password').setAttribute("type", "password");
	document.getElementById('showpass').src = "Image/eye_icon_hide.png";
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
	max-width:450px;
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
	left:45%;
	top:3%;
	margin-left:-202px;
	font-family:"segoe ui";
}

#email 
{
	background-repeat:no-repeat;
	background-position:5px 7px
}


input[type=email],input[type=text] 
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

textarea 
{
	width:100%;
	height:95px;
	padding:10px;
	resize:none;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:40px;
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
	margin-left:61%;
}

h2 
{
	background-color:#2e312f;
	padding:25px 35px;
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

input#c_password
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
	float: left;
	margin-bottom:30px;
}

#showpass 
{
	background-repeat: no-repeat;
	background-position: right;
	background-size: 40px 30px;
	height: 46px;
	margin-top: -76;
	float: right;
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
	position:relative;
    display: block;
    margin-top:-70px;
    font-family:"segoe ui";
	font-size:40px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:white;
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
	width:100%;
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

</style>

<script type="text/javascript">

</script>
<title>Register Client</title>
</head>
<body onload="show()">
<div id="google_translate_element"></div>

<header>

	<img src="Image/Home_Logo.png">
	<a id="a_Link" style="margin-left:82%;" onclick="show()">Register</a>

</header>
<div id="abc">
	
	<div id="popupContact">
	
	<form  id="form" action="Check.php" method="post" name="form">
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Registration</h2>
	
	<hr>
	<input title="Name must start with capital letter" type="text" name="c_name" placeholder="Name" id="name" pattern="[A-Z]{1}.[a-z]*"required>
	<input type="email" name="c_email" placeholder="Email" type="text" id="email" required>
	<input type="text" name="c_contact_number" placeholder="Contact Number" id="contact_number" required pattern="[789][0-9]{9}">
	<input type="text" required list="city" name="c_city" placeholder="Select City">
	<datalist id="city">
	<option value="Rajkot">Rajkot</option>
	</datalist>
	<textarea id="address" required name="c_address" placeholder="Address" ></textarea>
	<input type="password" required id="c_password" name="c_password"  placeholder="Password" />
	<img id="showpass" src="Image/eye_icon_hide.png" onMouseDown="showPassword()" onMouseUp="hidePassword()" />
	<input type="submit" name="submit" id="submit" value="Register" ><br>
	</form>
	</div>
	
</div>
</body>
</html>
