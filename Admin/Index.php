<html>
<head>
<title>Admin Login</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script src="../Popup.js" type="text/javascript"></script>
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
    display: block;
    margin-top:-70px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	color:black;
	font-weight:600;
}
#create 
{
	width:60%;
	text-align:center;
	color:#2e312f;
	padding:10px 0;
	font-size:20px;
	font-weight:700;
	font-family:"segoe ui";
	cursor:pointer;
	margin-top:30px;
	margin-left:64%;
}
</style>

</head>

<body id="body" style="overflow:hidden" onload="show()">
<header>
	
	<img src="../Image/Home_Logo.png">
	<a href="index.php" id="Link" style="margin-left:92%;">Login</a>

</header>
<div id="google_translate_element"></div>

<div id="abc">
	<div id="popupContact">
	
	<form id="form" method="POST" name="form" >
	<img id="close" src="../Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Login</h2>
	
	<hr>
	
	<input type="email" name="c_email" placeholder="Email" type="text" id="email">
	<input type="password" name="c_password" placeholder="Password" >
	<input type="checkbox" name="remember_me" id="remember_	me"><font style="font-size:20px; font-family:segoe ui;font-weight:700;color:#2e312f;">Remember Me
	</font>
	<input type="submit" name="submit" id="submit" value="Login"></a><br>
	</form>
	</div>
	
</div>
</body>
</html>
<?php

	if(isset($_POST["submit"]))
	{
		$email=$_POST["c_email"];
		$pass=$_POST["c_password"];
		
		if(isset($_POST["remember_me"]))
		{
			setcookie("Admin_C",$email,time()+(60*60*24),"/");
		}
		
		$cn=mysql_connect("localhost","root","");
		
		if($cn)
		{
			$db=mysql_select_db("home care",$cn);
			if($db)
			{
				$q=mysql_query("select A_Password from admin where A_Email_Id='$email'");
				
				if($q)
				{
					$r=mysql_fetch_row($q);
					
					if(strcmp($r[0],$pass)==0)
					{
						session_start();
						$_SESSION['admin']=$email;
						header("Location:Admin_Index.php");
					}
					else
					{
						echo "<script>alert('Email Id or Password is wrong');</script>";
					}
				}
				else
				{
					mysql_error();
				}
			}
			else
			{
				mysql_error();
			}
		}
		else
		{
			mysql_error();
		}
	}

?>