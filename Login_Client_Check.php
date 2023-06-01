<html>
<head>
<title>Client\Login Client</title>
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
</style>
</head>
<body onload="show()">
<div id="google_translate_element"></div>
<?PHP
	if(isset($_POST['submit']))
	{
		$email_c=$_POST['c_email'];
		$pass=$_POST['c_password'];
		$cn=mysqli_connect("localhost","root","root");
	
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$q=mysqli_query($cn,"select C_Password from client_details where C_Email_Id='$email_c'");
				
				if($q)
				{
					$r=mysqli_fetch_row($q);
					
					if(strcmp($r[0],$pass)==0)
					{
						session_start();
						$_SESSION["Client_Session"]=$email_c;
						
						if(isset($_POST["remember_me"]))
						{
							$cookie_name = "Client";
							$cookie_value = "$email_c";
							setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						}
						
						echo "<div id=abc>
								<div id=\"popupContact\">
	
								<form action=\"Login_Client_Check.php\" id=\"form\" method=\"POST\" name=\"form\">
								<img id=\"close\" src=\"Image/Close_C.png\" onclick =\"div_hide()\" height=\"35px\" width=\"75px\">
								<h2>Login</h2>
	
								<hr>Welcome ".$_SESSION['Client_Session']."</form></div></div>";
						
						header("Location:ExtraServices.php");
					}
					else
					{
						header("Location:Login_Client.php");
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