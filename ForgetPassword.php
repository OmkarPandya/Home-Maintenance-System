<html>
<head>
<title>Client\LoginClient</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script src="Popup.js" type="text/javascript"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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
	right:-140px;
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
	left:50%;
	top:20%;
	margin-left:-228px;
	font-family:"segoe ui";
}

#email 
{
	background-repeat:no-repeat;
	background-position:5px 7px;
}

input[type=email],input[type=text]
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
	margin:10px -10px;
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
	
</style>

</head>

<body id="body" style="overflow:hidden" onload="show()">
<div id="google_translate_element" style="float:right"></div>

<header id="head">
	<img src="Image/Home_Logo.png" id="fimage">
	<a id="Link" style="margin-left:82%;" onClick="show()">Login</a>	
	<a href="Help_Client.php" id="Link" style="margin-left:92%;margin-top:-45px;">Help</a>
</header>

<div id="abc">
	<div id="popupContact" class="popupContact">
	
	<form id="form" method="POST" name="form" style="width:100%;">
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Forget Password</h2>
	
	<hr>
	<input type="email" name="c_email" placeholder="Enter Your Registered Email" type="text" id="email">
	<input type="submit" name="Click" id="submit">

<?php
	
		if(isset($_POST['Click']))
		{
			$str=mt_rand(100000, 999999);
			$e=$_POST['c_email'];
			$receiver = "$e";
			$subject="Your OTP Is : ";
			$body=$str;
			$sender = "From:homemaintenance2024@gmail.com";
			if(mail($receiver, $subject, $body, $sender)){
				echo "Email sent successfully to $receiver";
			
			// require_once "Mail.php";
			// $e=$_POST['c_email'];
			// $from = "HomeServices <homemaintenance2024@gmail.com>";
			// $to = "<$e>";
			// $str=mt_rand(100000, 999999);
			
			// $subject="Your OTP Is : ";
			// $body=$str;
			// $host = "smtp.gmail.com";
			// $port = "587";
			// $username ="homemaintenance2024@gmail.com";
			// $password ="asopkkau";

			// $headers = array ('From' => $from,
			//   'To' => $to,
			//   'Subject' => $subject,'Body'=>$body);
			// $smtp = Mail::factory('smtp',
			//   array ('host' => $host,
			// 	'port' => $port,
			// 	'auth' => true,
			// 	'username' => $username,
			// 	'password' => $password));

			// $mail = $smtp->send($to, $headers, $body);

			// if (PEAR::isError($mail))
			// {
			//   echo("<p>" . $mail->getMessage() . "</p>");
			// } 
			// else 
			// {
						 
				$cn=mysqli_connect("localhost","root","root");
				if($cn)
				{
					$db=mysqli_select_db($cn,"home care");
					if($db)
					{
						$q=mysqli_query($cn,"update client_details set C_Otp='$str' where C_Email_Id='$e'");
						if($q)
						{
				
							echo "<input type='text' placeholder='Enter OTP'  name='otp'>";
							echo "<script type='text/javascript'>
									var mdiv=document.getElementById('submit');
									mdiv.style.display='none';
									var i=document.getElementById('close');
									i.style.display='none';</script>";
							echo "<img id='close' src='Image/Close_C.png' onclick ='div_hide()' height='35px' width='75px' style='right:-50px;top:-9px;'/>";
							echo "<input type='submit' value='submit' name='submit' id='submit'>";
						}
						else
						{
							echo "Not Inserted";
						}
				}
			 }
			}
			else{
				echo "Sorry, failed while sending mail!";
			}
		}
		if(isset($_POST['submit']))
		{
			$otp=$_POST['otp'];
			echo $otp;
			
			$cn=mysqli_connect("localhost","root","root");
			
			if($cn)
			{
				$db=mysqli_select_db($cn,"home care");
				
				if($db)
				{
					$e=$_POST['c_email'];
					$q=mysqli_query($cn,"select C_Otp from client_details where C_Email_Id='$e'");
					if($q)
					{
						$row=mysqli_fetch_array($q);
						$temp=$row[0];
						if($temp==$otp)
						{
							header("location:Login_Client_NewPassword.php");
						}
						else
						{
							echo  "Not Found";
						}
					}
				}
				else
				{
					echo "Please Check Your OTP";
				}
			}
			else
			{
				mysqli_error($cn);
			}
		}
?>
	</div>
</form>
	</div>

</body>
</html>