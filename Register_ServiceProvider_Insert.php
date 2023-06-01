<?PHP

	if(isset($_POST['submit']))
	{
		$s=$_POST['sid'];

		$aname=$_FILES['upload']['name'];
		
		$ext=substr($aname,-4);

		$pname=$_FILES['upload']['name'];
		
		$path=$_SERVER['DOCUMENT_ROOT'].'/Home Care/Service_Provider/';
	
		$fpath=$path.$s.$ext;
	
		if(move_uploaded_file($_FILES['upload']['tmp_name'],$fpath))
		{	
			echo "<script>alert('Successfull')</script>";
			
			$name=$_POST['s_name'];
		
		if (!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			echo "<script>alert('Please Enter String Values In Name');</script>";
		}
		
		
		$email=$_POST['s_email'];
	
		$number=$_POST['s_contact_number'];

		$city=$_POST['s_city'];
		
		$address=$_POST['s_address'];
		
		$password=$_POST['s_password'];
		
		$eyear=$_POST['s_eyear'];
		
		$service=$_POST['s_service'];
		
		if(strlen($password)<10 OR strlen($password)>10)
			echo "<script>alert('You have to enter 10 Characters');</script>";
		
		$cn=mysqli_connect("localhost","root");
			
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
				
			if($db)
			{
				$q=mysqli_query($cn,"insert into service_provider_details  values('$s','$name','$eyear','$email','$number','$city','$address','$password')");
				
				if($q)
				{
					
					$qe=mysqli_query($cn,"select Service_Id from service where Service_Name='$_POST[s_service]'");
					$serviceid=mysqli_fetch_row($qe);
					
					$q2=mysqli_query($cn,"insert into service_provider_services values('','$serviceid[0]','$s')");
					
					if($q2)
					{
						$e=$_POST['s_email'];
						require_once "Mail.php";
						$from = "HomeServices <homemaintenance2024@gmail.com>";
						$to = "<$e>";
						$subject = "Welcome";
						$body = "SuccesFully Registered";

						$host = "smtp.gmail.com";
						$port = "587";
						$username ="homemaintenance2024@gmail.com";
						$password ="asopkkau";

						$headers = array ('From' => $from,
						  'To' => $to,
						  'Subject' => $subject);
						
						$smtp = Mail::factory('smtp',
						  array ('host' => $host,
							'port' => $port,
							'auth' => true,
							'username' => $username,
							'password' => $password));

						$mail = $smtp->send($to, $headers, $body);

						if (PEAR::isError($mail)) 
						{
							echo("<p>" . $mail->getMessage() . "</p>");
						} 
						else 	
						{
							session_start();
							$_SESSION["SP_Session"]=$_POST["sid"];	
							header("Location:ServiceMenu.php");
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
		}
		else
		{
			echo "<script>alert('Something wrong with Image')</script>";
			header("Location:Register_ServiceProvider.php");
		}
	}
?>