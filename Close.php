<html>
<head>
<title>Close</title>

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
function newDoc() 
{
	
    window.location.href="http://www.w3schools.com";
}

</script>
<style type="text/css">
 
#welcome
{
	background-color:red;
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
	max-width:450px;
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
	left:45%;
	top:3%;
	margin-left:-202px;
	font-family:'Raleway',sans-serif
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
	font-family:raleway;
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
	font-family:raleway;
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

input[type=password]
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:40px;
	font-size:20px;
	font-family:raleway;
	font-weight:500;
	background-repeat:no-repeat;
	background-position:right;
	background-size:40px 30px;
}
img#back 
{
	position: absolute;
	left: 0px;
	top: 0px;
	z-index: -1;
	opacity:0.7;
}
#header 
{
	height:7%;
	width:100%;
}
</style>

<title>Register</title>
</head>
<body onload="show()">
<div id="google_translate_element"></div>
<img id="back" src="Image/Client_Back.jpg" height="100%" width="100%">
<div id="header">
	<img src="Image/Home_Logo.png">
</div>
<div id="abc">
	
	<div id="popupContact">
	
	<form id="form_ins" method="post" name="form" > 
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Registration</h2>
	
	<hr>
	<input type="text" name="c_name" placeholder="Name" id="name" pattern="[A-Z]{1}.[a-z]*">
	<input type="email" name="c_email" placeholder="Email" type="text" id="email">
	<input type="text" name="c_contact_number" placeholder="Contact Number" id="contact_number" pattern="[789][0-9]{9}">
	<input type="text" list="city" name="c_city" placeholder="Select City">
	<datalist id="city">
	<option value="Rajkot">Rajkot</option>
	</datalist>
	<textarea id="address" name="c_address" placeholder="Address" ></textarea>
	<input type="password" name="c_password" placeholder="Password" >
	<input type="submit" name="submit" value="JJ" id="submit" onclick="newDoc()"><br>
	</form>
	</div>
	
</div>
</body>
</html>