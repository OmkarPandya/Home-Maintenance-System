<?PHP
	session_start();
	$rn=$_GET['rno'];
	$e=$_SESSION['Client_Session'];
	$cn=mysqli_connect("localhost","root","root");
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		if($db)
		{	
			//Mail To Client
					$query_one=mysqli_query($cn,"select MAX(Record_No) from client_service_details where Client_Email_Id='$e'");
					if($query_one)
					{
						while($row=mysqli_fetch_array($query_one))
						{
							$servicebookedno=$row[0];							
						}
						
						$query_two=mysqli_query($cn,"select * from client_service_details where Record_No=$rn");
						
						if($query_two)
						{
							while($row=mysqli_fetch_array($query_two))
							{
								$serviceid=$row[2];
								$subserviceid=$row[3];
								$serviceproviderid=$row[4];
							}
							
							$query_three=mysqli_query($cn,"select S_P_Name,S_P_Email_Id,S_P_Contact from service_provider_details where S_P_Id='$serviceproviderid'");
							if($query_three)
							{
								while($row=mysqli_fetch_array($query_three))
								{
									$spname=$row[0];
									$spemailid=$row[1];
									$spcontact=$row[2];
								}
								
								$query_four=mysqli_query($cn,"select Service_Name,C_Price from service where Service_Id='$serviceid' ");
								
								if($query_four)
								{
									while($row=mysqli_fetch_array($query_four))
									{
										$servicename=$row[0];
										$serviceprice=$row[1];
									}
									
									$query_five=mysqli_query($cn,"select S_Sub_Name,S_Sub_Charge from sub_service where S_Sub_Id='$subserviceid'");
									
									if($query_five)
									{
										while($row=mysqli_fetch_array($query_five))
										{
											$subservicename=$row[0];
											$subservicecharge=$row[1];
										}
										require_once "Mail.php";
										$e=$e;
										$from = "HomeServices <homemaintenance2024@gmail.com>";
										$to = "<$e>";
										$subject = "Service Canceled";
										$body = "Service Canceled
												Service Name : $servicename 
												Sub Service Name : $subservicename  				
												Price : $subservicecharge 
												Service Provider Name : $spname   
												Service Provider Email Id : $spemailid
												Service Provider Contact Number :$spcontact ";

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
										  
										  echo("<script>alert('Your Service Is Canceled')</script>");
										  //Mail To Service Provider
					
											$query=mysqli_query($cn,"select * from client_details where C_Email_Id='$e' ");
											if($query)
											{
												while($row=mysqli_fetch_row($query))
												{
													$clientname=$row[0];
													$clientemailid=$row[1];
													$clientcontactnumber=$row[2];
													$clientaddress=$row[4];
											}

											$receiver = "kinal.k@ahduni.edu.in";
											$subject = "Service Canceled";
											$body = "Your Service Canceled By
													Client Name :$clientname
													Client Contact Number : $clientcontactnumber
													Client Email Address : $_SESSION[Client_Session]
													Service Name : $servicename
													Sub Service Name : $subservicename ";
											$sender = "From:homemaintenance2024@gmail.com";
											if(mail($receiver, $subject, $body, $sender)){
												echo "Email sent successfully to $receiver";
															}else{
																echo "Sorry, failed while sending mail!";
															}

											// require_once "Mail.php";
											// $e="ishachavda1999@gmail.com";
											// $from = "HomeServices <homemaintenance2024@gmail.com>";
											// $to = "<$e>";
											// $subject = "Service Canceled";
											// $body = "Your Service Canceled By
											// 		Client Name :$clientname
											// 		Client Contact Number : $clientcontactnumber
											// 		Client Email Address : $_SESSION[Client_Session]
											// 		Service Name : $servicename
											// 		Sub Service Name : $subservicename ";

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
											// } else 
											// {
											//   echo("<script>alert('Message successfully sent');<script>");
											// }
												
										}//query_one_sp
										else
										{
											mysqli_error($cn);
										}
											}
										}//query_five
										else
										{
											mysqli_error($cn);
										}
									}//query_four
									else
									{
										mysqli_error($cn);
									}
								}//query_three
								else
								{
									mysqli_error($cn);
								}
							}//query_two
							else
							{
								mysqli_error($cn);
							}
						}//query_one
						else
						{
							mysqli_error($cn);
						} 
			$q=mysqli_query($cn,"delete from client_service_details where Record_No='$rn'");
			if($q)
			{
				echo "<script>alert('Service Canceled');</script>";
				header("Location:Client_Cancle_Service.php");	
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
?>