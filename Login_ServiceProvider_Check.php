<?PHP
	if(isset($_POST['submit']))
	{
		$Service_Id=$_POST['s_id'];
		$pass=$_POST['s_password'];
		$cn=mysqli_connect("localhost","root","root");
	
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$q=mysqli_query($cn,"select S_P_Password from service_provider_details where S_P_Id='$Service_Id'");
				
				if($q)
				{
					$r=mysqli_fetch_row($q);
					
					if(strcmp($r[0],$pass)==0)
					{
						session_start();
						$_SESSION["SP_Session"]=$_POST['s_id'];
						
						
						if(isset($_POST["remember_me"]))
						{
							$cookie_name = "ServiceProider";
							$cookie_value = "$Service_Id";
							setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
						}
						
						header("Location:servicemenu.php");
					}
					else
					{
						header("Location:Login_ServiceProvider.php");
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