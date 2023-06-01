<html>
<head>
<title>Client\RegisterClientInsert</title>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>


<style>
div#popupContact 
{
	position:absolute;
	left:45%;
	top:3%;
	margin-left:-202px;
	font-family:'Raleway',sans-serif
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
</style>
</head>
<body>
<div id="google_translate_element"></div>
<?PHP
	if(isset($_POST['submit']))
	{
		$name=$_POST['c_name'];
		
		if (!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			echo "Please Enter String Values In Name"."</br>";
		}
		
		$email=$_POST['c_email'];
		
		$number=$_POST['c_contact_number'];

		$city=$_POST['c_city'];
		
		$address=$_POST['c_address'];
		
		$password=$_POST['c_password'];
		
		if(strlen($password)<10 OR strlen($password)>10)
			echo "You have to enter 10 Characters";
		
		$cn=mysqli_connect("localhost","root","root");
			
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
				
			if($db)
			{
				$q=mysqli_query($cn,"insert into client_details (C_Name,C_Email_Id,C_Contact,C_City,C_Address,C_Password) values('$name','$email','$number','$city','$address','$password')");
				if($q)
				{
					$receiver = "$email";
					$subject = "Register Successfully";
					$body = "Congratulations!! You are successfully registered to home care.";
					$sender = "From:homemaintenance2024@gmail.com";
					if(mail($receiver, $subject, $body, $sender)){
						echo "Email sent successfully to $receiver";
						session_start();
						$_SESSION["Client_Session"]=$email;
						header("Location:ExtraServices.php");
					}else{
						echo "Sorry, failed while sending mail!";
					}
					// require_once "Mail.php";
					// $e=$email;
					// $from = "HomeServices <homemaintenance2024@gmail.com>";
					// $to = "<$e>";
					// $subject = "Register Successfully";
					// $body = "Congratulations!! You are successfully registered to home care.";

					// $host = "smtp.gmail.com";
					// $port = "587";
					// $username ="homemaintenance2024@gmail.com";
					// $password ="asopkkau";

					// $headers = array ('From' => $from,
					//   'To' => $to,
					//   'Subject' => $subject);
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
					// 	session_start();
					// 	$_SESSION["Client_Session"]=$email;
					// 	header("Location:ExtraServices.php");
					// }
					
				}
				else
				{
					echo "<script>alert('Already Registered');</script>";
				}
			
			}
			else
			{
				mysqli_error($cn);
			}
		}
	}
?>
</body>
</html>