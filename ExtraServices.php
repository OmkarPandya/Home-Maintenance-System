<?php
	session_start();
?>
<html>
<head>
<title>Client\Services</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
function div_hide()
{
	document.getElementById('abc').style.display = "none";
}

function show(name,image)
{
	document.getElementById('abc').style.display="block";
	document.getElementById('sname').value=name;
}

function show(name,image,arr)
{
	document.getElementById('abc').style.display="block";
	document.getElementById('sname').value=name;
	var str = image.split("/");
	var Service_Id = (str[str.length-1]).substring(0, str[str.length-1].lastIndexOf("."));
	var SId = (str[str.length-1]).substring(0, str[str.length-1].lastIndexOf("."));
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			document.getElementById("s_nameList").innerHTML = this.responseText;
		}
	};
	
	xhttp.open("GET", "Fetch_ExtraServices.php?Service_Id=" +Service_Id, true);
	xhttp.send();	
}
function googleTranslateElementInit() 
{
	new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<style type="text/css">

#abc 
{
	width:100%;
	height:100%;
	opacity:.97;
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
	max-width:900px;
	min-width:800px;
	padding:10px 50px;
	border:2px solid white;
	border-radius:10px;
	font-family:"segoe UI";
	background-color:#fff
}

div#popupContact 
{
	position:absolute;
	left:35%;
	top:2%;
	margin-left:-228px;
	font-family:"segoe UI";
}

#email 
{
	background-repeat:no-repeat;
	background-position:5px 7px
}

input[type=email],input[type=password] 
{
	width:60%;
	padding:10px;
	margin-top:30px;
	margin-left:20%;
	border:1px solid #2e312f;
	padding-left:30px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

#submit 
{
	width:60%;
	margin-left:20%;
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
	font-weight:500;
	font-family:"segoe ui";
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

#page
{
	font-family:comic sans ms;
	font-size:40;
}

input[type="text"]
{
	width:60%;
	padding:10px; 	
	margin-top:30px;
	border:1px solid #2e312f;
	padding-left:30px;
	margin-left:20%;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

#address
{	
	width:60%;
	padding:10px;
	margin-top:30px;
	border:1px solid #2e312f;
	margin-left:20%;
	padding-left:30px;
	font-size:20px;
	font-family:"segoe ui";
	font-weight:500;
}

#link
{
	height:170;
	width:120;
	text-align:center;
	font-family:"segoe UI";	
	font-size:20;
	font-weight:700;
	position:reative;
	float:left;
	margin:3%;
	cursor: pointer;
}

#a_Link
{
	position:absolute;
    display: block;
    margin-top:-30px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	float:left;
	color:black;
	font-weight:600;
	cursor:pointer;
}

#img_pic
{
	height:210;
	width:210;
	position:absolute;
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
footer
{
	height:62%;
	width:100%;
	background:black;
	clear:both;
}
#para
{
	font-family:segoe ui;
	font-weight:600;
	font-size:25;
	color:white;
}
#atag
{
	color:purple;
}
.container 
{
    overflow: hidden;
    background-color: #333;
    font-family:segoe ui;
}

.container a 
{
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 20px 22px;
	font-family:segoe ui;
	font-size:27;
	font-weight:700;
    text-decoration: none;
}

.dropdown 
{
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn 
{
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
}

.container a:hover, .dropdown:hover .dropbtn 
{
    background-color: red;
}

.dropdown-content 
{
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a 
{
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover 
{
    background-color:orange;
}

.dropdown:hover .dropdown-content 
{
    display: block;
}
</style>

</head>
<body>
<div id="google_translate_element" style="float:right;"></div>
<header id="head">
	<img src="Image/Home_Logo.png" id="fimage">
	<a href='Logout_Client.php' id="a_Link" style="margin-left:85%;">Logout</a>
	<a href='Help_Client.php' id="a_Link" style="margin-left:94.5%;">Help</a>
	<!----><br><br>
		<div class="container">	
	<div class="dropdown">
	</div> 
	<a href="ClientAMC.php">Book AMC</a>
	<a href="Feedback.php">Feedback</a>
	<a href="Tips.php">Tips</a>
	<a href="afterLogin.php">My Profile</a>
</div>
	<!--
	<a href="ClientAMC.php"id="a_Link" style="margin-left:72%;">Book AMC</a>
	<a href="Feedback.php"id="a_Link" style="margin-left:60%;">Feedback</a>
	<a href="afterLogin.php"id="a_Link" style="margin-left:47%;">My Profile</a>-->
	<?php
	
		$eid=$_SESSION["Client_Session"]; 
		$cn=mysqli_connect("localhost","root","root");
		$db=mysqli_select_db($cn,"home care");
		$q=mysqli_query($cn,"select C_Name from client_details where C_Email_Id='$eid'");	
		if($q)
		{
			$row=mysqli_fetch_row($q);
			echo "<a value='$row[0]' id='name' style='margin-top:2%;'>$row[0]</a>";
			
		}
		else
		{
			mysqli_error($cn);
		}
	?>
	
</header>
<?php
		
		$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$q=mysqli_query($cn,"select * from service");
				
				if($q)
				{
					while($row=mysqli_fetch_row($q))
					{
						$seid=$row[0];
						$dirname = "Services/$row[0]";
						
						$images = glob($dirname."*.*");
						
						foreach($images as $image) 
						{	
							$w=mysqli_query($cn,"select * from sub_service where Service_Id='$seid'");
							$count=mysqli_num_rows($w);
							if($count==0)
							{
								echo "<div id=\"link\" onclick=\"show('". $row[1] ."', '". $image ."')\">".'<div id=\"image\"><img  id=\"img_pic\" width=130 height=150 src="'.$image.'"></div>'.$row[1].'</div>';
							}
							else
							{
								while($ext=mysqli_fetch_row($w))
								{
									$arr=array($ext[2]);
									$str=implode(" ",$arr);
								}
									
									echo "<div id=\"link\" onclick=\"show('". $row[1] ."', '". $image ."', '". $str ."')\">".'<div id=\"image\"><img  id=\"img_pic\" width=130 height=150 src="'.$image.'"></div>'.$row[1].'</div>';
							}
						}
					}
				}
			}
		}	
?>

<div id="abc">
	
<script type="text/javascript">
</script>	
	
	<div id="popupContact">
	
	<form id="form" method="POST" name="form" action="#">
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Book Service</h2>
	
	<hr>
	
	<input type="text" id="sname" name="sname" readonly>
	
	<input type="text"  id="subname" name="subname" placeholder="Select Sub Service " list="sub_name" required />
	<div id="s_nameList">
	</div>
	
	<input type="email" name="c_email" readonly placeholder="Email" value="<?PHP echo $_SESSION['Client_Session']; ?>" type="text" id="c_email">
	 
		<?PHP
			$cn=mysqli_connect("localhost","root","root");
	 
			
			$db=mysqli_select_db($cn,"home care");
			
			$a=$_SESSION['Client_Session'];
			
			$add="select C_Address from client_details where C_Email_Id='$a'";
					
			$q=mysqli_query($cn,$add);

			if($q)
			{
				$row=mysqli_fetch_row($q);
				echo "<textarea name='address' rows='3' cols='5' id='address' placeholder='Address' required>". $row[0]. "</textarea>";
			}
			else
			{
				mysqli_error($cn);
						
			}		
		?>
	
	<input type="submit" name="submit" id="submit" value="Confirm Service"></a><br>

	</form>
	
	</div>
	
</div>
<footer>
	<center><br>
	<img src="Image/Logo.png"/>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;">
		<u>Vision</u></b>
		: Our goal is to provide the most preferable &amp; affordable service provider in service based market.
	</p>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;">
		<u>Mission</u></b> 
		: To access the need of every individual for providing organized services in the market &amp; make the difference.
	</p>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;">
		<u>Mail</u> <u>Us</u></b> 
		: <a href="" id="atag">homemaintenance2024@gmail.com</a>
	</p>
	<p id="para">
		<b style="font-size:25;font-weight:900;font-family:segoe ui;color:orange;"><a href="index.php" style="color:orange;">Go to Home</a></b>
	</p>
	<p id="para">
		&copy; 2022 Home Care All Rights Reserved
	</p>
	</center>
</footer>
</body>
</html>

<?PHP
	if(isset($_POST['submit']))
	{
		$serId=$_POST['SId'];
		$subS=$_POST['subname'];
		$s=strtok($subS,'-');
		$e=$_POST['c_email'];
		$address=$_POST['address'];
		$serPId=$_POST['rb'];
		$d=date('Y-m-d'); 

		$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$query=mysqli_query($cn,"select S_Sub_Id from sub_service where S_Sub_Name='$s' && Service_Id='$serId'");
				$subid=mysqli_fetch_array($query);
				$quer="insert into client_service_details values(NULL,'$e','$serId','$subid[0]','$serPId','$address','$d','0000-00-00',0,0)";
				$q=mysqli_query($cn,$quer);
				if($q)
				{
					//Mail To Client
					$query_one=mysqli_query($cn,"select MAX(Record_No) from client_service_details where Client_Email_Id='$e'");
					if($query_one)
					{
						while($row=mysqli_fetch_array($query_one))
						{
							$servicebookedno=$row[0];
						}
						
						$query_two=mysqli_query($cn,"select * from client_service_details where Record_No='$servicebookedno'");
						
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

										$receiver = "$eid";
										$subject = "Book Service";
										$body = "Your Service Is Booked Successfully  
												Service Name : $servicename 
												Sub Service Name : $subservicename  				
												Price : $subservicecharge 
												Service Provider Name : $spname   
												Service Provider Email Id : $spemailid
												Service Provider Contact Number :$spcontact ";
										$sender = "From:homemaintenance2024@gmail.com";
										if(mail($receiver, $subject, $body, $sender)){
											echo "Email sent successfully to $receiver";
										}else{
											echo "Sorry, failed while sending mail!";
										}
										// require_once "Mail.php";
										// $e=$e;
										// $from = "HomeServices <homemaintenance2024@gmail.com>";
										// $to = "<$e>";
										// $subject = "Book Service";
										// $body = "Your Service Is Booked Successfully  
										// 		Service Name : $servicename 
										// 		Sub Service Name : $subservicename  				
										// 		Price : $subservicecharge 
										// 		Service Provider Name : $spname   
										// 		Service Provider Email Id : $spemailid
										// 		Service Provider Contact Number :$spcontact ";

										// $host = "smtp.gmail.com";
										// $port = "587";
										// $username = //Sender's email ID;
										// $password = //Sender's email password;

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
										//   echo("<p>Message successfully sent!</p>");
										// }
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
				
					//Mail To Service Provider
					
					$query=mysqli_query($cn,"select * from client_details where C_Email_Id='$e'");
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
						$subject = "Book Service";
						$body = "Your Service Is Booked By
								Client Name :$clientname
								Client Contact Number : $clientcontactnumber
								Client Email Address : $_SESSION[Client_Session]
								Client Address : $_POST[address]
								Service Name : $servicename
								Sub Service Name : $subservicename ";
						$sender = "From:homemaintenance2024@gmail.com";
						if(mail($receiver, $subject, $body, $sender)){
							echo "Email sent successfully to $receiver";
										}
										else{
											echo "Sorry, failed while sending mail!";
										}

						// require_once "Mail.php";
						// $e="ishachavda1999@gmail.com";
						// $from = "HomeServices <homemaintenance2024@gmail.com>";
						// $to = "<$e>";
						// $subject = "Service Booked";
						// $body = "Your Service Is Booked By
						// 		Client Name :$clientname
						// 		Client Contact Number : $clientcontactnumber
						// 		Client Email Address : $_SESSION[Client_Session]
						// 		Client Address : $_POST[address]
						// 		Service Name : $servicename
						// 		Sub Service Name : $subservicename ";

						// $host = "smtp.gmail.com";
						// $port = "587";
						// $username = //Sender's email ID;
						// $password = //Sender's email password;

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
						//   echo "<script>alert('Successfully Booked')</script>";
						// }
							
					}//query_one_sp
					else
					{
						mysqli_error($cn);
					}
					
				}
				else
				{
					echo "<script>alert('Unsuccessfull Booking')</script>";
				}
			}
		}
	}
	
?>