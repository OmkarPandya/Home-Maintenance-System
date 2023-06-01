<?php
session_start();
?>
<html>
<head>
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
table
{
	text-align:center;
	font-family:"segoe ui";
}
th
{
	font-weight:800;
	font-size:25;
}
td
{
	font-weight:600;
	font-size:23;
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
	top:10%;
	margin-left:-202px;
	font-family:"segoe ui";
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

input[type=submit]
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
	font-weight:500;
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
#a_Link
{
	position:absolute;
    display: block;
    margin-top:-60px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
	cursor:pointer;
}
#name
{
	position:absolute;
    display: block;
    font-family:"segoe ui";
	font-size:35px;
	text-decoration:none;
	color:black;
	font-weight:600;
	cursor:pointer;
	top:10;
    right:0;
}
</style>
</head>
<body style="overflow:hidden" onload="div_hide();">
	
<center>
<?php

	$eid=$_SESSION["Client_Session"];
	
	$cn=mysqli_connect("localhost","root","root");
	
	if($cn)
	{
		$db=mysqli_select_db($cn,"home care");
		
		if($db)
		{
			$q=mysqli_query($cn,"Select * from Contract_details where C_Email_Id='$eid'");
			
			if($q)
			{
				echo "<table border='2' cellpadding='13' cellspacing='4'><tr><th>Service Name</th><th>Service Provider Name</th><th>Contract Plan</th><th>Start Date</th><th>End Date</th><th>Status</th></tr>";
				
				while($row=mysqli_fetch_array($q))
				{
					$q1=mysqli_query($cn,"select Service_Name from service where Service_Id='$row[2]'");
					$sname=mysqli_fetch_array($q1);
						 
					$cid=$row[0];	 
					$ceid=$row[1];	 
					$sid=$row[2];	 
					$spid=$row[3];	 
					$scplan=$row[4];	 
						 
					echo "<tr><td>$sname[0]</td>";
					
					$q2=mysqli_query($cn,"select S_P_Name from service_provider_details where S_P_Id='$row[3]'");
					$spname=mysqli_fetch_array($q2);
						 
					echo "<td>$spname[0]</td>";
					
					echo "<td>$row[4]</td>";
					
					echo "<td>$row[5]</td>";
					
					echo "<td>$row[6]</td>";
					
					if(strtotime(date("y-m-d"))<strtotime($row[6]))
					{
						echo "<td><a style='text-decoration:underline;color:blue;cursor:pointer;' onClick='show()'>Register Service</a></td>";
					}
					else
					{
						echo "<td>Contract Time Completed</td>";
					}
					echo "</tr>";
					
				}
				echo "</table>";
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
<div id="abc">
	<div id="popupContact">
	
	<form action="#" id="form" method="POST" name="form" >
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Register Service</h2>
	
	<hr>
	
	<input type="email" name='eid' value="<?php echo $_SESSION["Client_Session"];?>" readonly />
	
	<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" readonly />
	
	<input type="submit" name="submit" id="submit" value="Book"></a>
	</form>
	</div>
	
</div>
</body>
</html>
<?php

	if(isset($_POST["submit"]))
	{
		$e=$_SESSION["Client_Session"];
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$d=date('Y-m-d');
				$q=mysqli_query($cn,"insert into Contract_Record values(NULL,'$cid','$d','0000-00-00',0)");
				if($q)
				{
					
					echo "<script>alert('Successfully Booked Service');</script>";
					
					$query_one=mysqli_query($cn,"select * from contract_details where C_Id='$cid'");
					
					if($query_one)
					{
						while($row=mysqli_fetch_array($query_one))
						{
							$serviceid=$row[2];
							$serviceproviderid=$row[3];
						}
						
						$query_two=mysqli_query($cn,"select Service_Name from service where Service_Id='$serviceid'");
						if($query_two)
						{
							while($row=mysqli_fetch_array($query_two))
							{
								$servicename=$row[0];
							}
							
							$query_three=mysqli_query($cn,"select * from service_provider_details where S_P_Id='$serviceproviderid'");
							if($query_three)
							{
								while($row=mysqli_fetch_array($query_three))
								{
									$serviceprovidername=$row[1];
									$serviceprovideremail=$row[3];
									$serviceprovidercontact=$row[4];
								}
							
								require_once "Mail.php";
								$e=$e;
								$from = "HomeServices <homemaintenance2024@gmail.com>";
								$to = "<$e>";
								$subject = "Your AMC Service Booked";
								$body = "Your AMC Service Is Booked 
										Service Name : $servicename
										Service Provider Name : $serviceprovidername
										Service Provider Email Id : $serviceprovideremail
										Service Provider Contact Number : $serviceprovidercontact										
										Current Date : $d";

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
										require_once "Mail.php";
										$e="ishachavda1999@gmail.com";
										$from = "HomeServices <homemaintenance2024@gmail.com>";
										$to = "<$e>";
										$subject = "AMC Service Booked";
										$body = "Your AMC Service Is Booked By
												Client Name :$clientname
												Client Contact Number : $clientcontactnumber
												Client Email Address : $_SESSION[Client_Session]
												AMC Service Name : $servicename
												Date : $_POST[date]";

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
										} else 
										{
										  echo("<script>alert('Message successfully sent');<script>");
										}
									
									}//query_one_sp
									else
									{
										mysqli_error($cn);
									}
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
				}
				else
				{
					echo "<script>alert('Unsuccessfull');</script>";
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