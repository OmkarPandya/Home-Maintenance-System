<html>
<head>
<title>Client\Uploads</title>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

<script type="text/javascript">
var loadFile = function(event) 
{
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
 };
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
	font-family:"segoe ui"
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
	border:1px solid #250d00;
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
	border:1px solid #250d00;
	padding-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

input#c_password
{
	width:100%;
	padding:10px;
	margin-top:30px;
	border:1px solid #250d00;
	padding-left:40px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
	float:left;
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
header 
{
	height:15%;
	width:100%;
	background:#884b4b;
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

#bupic
{
	border:1px solid #250d00;
	width:100%;
	height:10%;
	margin-top:30px;
}

</style>

<title>Register ServiceProvider</title>
</head>
<body onload="show()">
<div id="google_translate_element"></div>
<header>
	
	<img src="Image/Home_Logo.png" width="400" height="92">
	<a href="Login_Client.php" id="Link" style="margin-left:82%;">Login</a>
	<a href="Help_Client.php" id="Link" style="margin-left:92%;">Help</a>

</header>

<div id="abc">
	
	<div id="popupContact">
	
	<form action="Register_ServiceProvider_Insert.php" id="form" method="post" name="form" enctype="multipart/form-data">
	<img id="close" src="Image/Close_S.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Registration</h2>
	
	<hr>
	<input type="text" name="id" placeholder="Service Provider Id" id="s_id" value="
	<?PHP
		$cn=mysqli_connect("localhost","root","root");
	
		$db=mysqli_select_db($cn, "home care");
	
		$q=mysqli_query($cn, "SELECT COUNT(DISTINCT S_P_Id) FROM service_provider_details");
	
		while($row=mysqli_fetch_array($q))
		{
			$s='SP0';
			$x=$row[0]+1;
			echo $s.$x;
		}
	?>"> 

	<div id="bupic">
	<input	type="file" name="upload" id="upload" placeholder="Profile Photo"
    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
		<img style="margin-top:-5%;margin-left:65%;margin-bottom:1%;"id="blah" alt="your image" width="150" height="150"/>
	</div>
	<input type="text" name="s_name" placeholder="Name" id="name">
	<input type="text" name="s_eyear" placeholder="Experience Year" id="eyear">
	<input type="email" name="s_email" placeholder="Email" type="text" id="email">
	<input type="text" name="s_contact_number" placeholder="Contact Number" id="contact_number">
	<input type="text" list="city" name="s_city" placeholder="Select City">
	<datalist id="city">
	<option value="Rajkot">Rajkot</option>
	</datalist>
	<textarea id="address" name="s_address" placeholder="Address"></textarea>
	<input type="password" id="c_password" name="s_password" placeholder="Password">
	<img id="showpass" src="Image/eye_icon_hide.png" onMouseDown="showPassword()" onMouseUp="hidePassword()" />
	<input type="submit" name="submit" id="submit" value="Register"><br>
	</form>
	</div>
	
</div>
</body>
</html>