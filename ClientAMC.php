<?php
session_start();
?>
<html>
<head>
<title>Client\Client AMC</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
	function googleTranslateElementInit() 
	{
		new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>

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
	
	xhttp.open("GET", "Fetch_AmcServices.php?Service_Id=" +Service_Id, true);
	xhttp.send();	
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

input[type="contract"]
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
	height:55%;
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
</style>

</head>
<body>
<div id="google_translate_element" style="float:right;"></div>
<header id="head">
	<img src="Image/Home_Logo.png" id="fimage">
	<a href="Logout_Client.php" id="a_Link" style="margin-left:85%;">Logout</a>
	<a href="Help_Client.php" id="a_Link" style="margin-left:94.5%;">Help</a>
	<?php
	
		$eid=$_SESSION["Client_Session"]; 
		$cn=mysqli_connect("localhost","root","root");
		$db=mysqli_select_db($cn,"home care");
		$q=mysqli_query($cn,"select C_Name from client_details where C_Email_Id='$eid'");
		if($q)
		{
			$row=mysqli_fetch_row($q);
			echo "<a value='$row[0]' id='name'style='margin-top:2%;'>$row[0]</a>";
			
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
	
	<div id="popupContact">
	
	<form id="form" method="POST" name="form" action="#">
	<img id="close" src="Image/Close_C.png" onclick ="div_hide()" height="35px" width="75px">
	
	<h2>Book Service Contract</h2>
	
	<hr>
	
	<input type="text" id="sname" name="sname" readonly>
	
	<input type="hidden"  id="subname" name="subname" placeholder="Select Sub Service " list="sub_name"  required/>
	<div id="s_nameList">
	</div>
	
	<input type="text" list="cDuration" name="cDuration" placeholder="Select Contract Duration" required>
	<datalist id="cDuration">
    <option value="3 Month">
    <option value="6 Month">
    <option value="9 Month">
    <option value="12 Month">
	</datalist>
	
	<input type="email" name="c_email" placeholder="Email" value="<?PHP echo $_SESSION['Client_Session']; ?>" type="text" id="c_email" readonly>
	 
		<?PHP
			$cn=mysqli_connect("localhost","root","root");
	 
			
			$db=mysqli_select_db($cn,"home care");
			
			$a=$_SESSION['Client_Session'];
			
			$add="select C_Address from client_details where C_Email_Id='$a'";
					
			$q=mysqli_query($cn,$add);
			
			
			if($q)
			{
				$row=mysqli_fetch_row($q);
				echo "<textarea name='address' rows='3' cols='5' id='address' placeholder='Address' readonly>". $row[0]. "</textarea>";
			}
			else
			{
				mysqli_error($cn);					
			}		
		?>
	
	<input type="submit" name="submit" id="submit" value="Confirm"></a><br>

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
		$e=$_POST['c_email'];
		$address=$_POST['address'];
		$serPId=$_POST['rb'];
		$d=date("y-m-d");
		$duration=$_POST['cDuration'];
		$final = date("Y-m-d", strtotime($duration));
		
		$qtr=mysqli_query($cn,"select C_Price from service where Service_Id='$serId'");
		$p=mysqli_fetch_row($qtr);
		$ans=substr($duration,0,-6);
		$cprice=$p[0]*$ans;
		
		$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$q=mysqli_query($cn,"insert into 
				contract_details values(NULL,'$e','$serId','$serPId','$duration','$d','$final','$cprice',0)");
				
				if($q)
				{
					$query=mysqli_query($cn,"select * from contract_details where C_Email_Id='$e'");
					 
					$query_two=mysqli_query($cn,"select * from service_provider_details where S_P_Id='$serPId'");
					
					$query_three=mysqli_query($cn,"Select Service_Name from service where Service_Id='$serId'");
					
					if($query)
					{
						
						
						if($query_two)
						{
											 
							if($query_three)
							{
								
								while($row=mysqli_fetch_row($query))
								{
									$contractd=$row[4];
									$cstartdate=$row[5];
									$cenddate=$row[6];
								}
								
								while($row=mysqli_fetch_row($query_two))
								{
									$sname=$row[1];
									$sno=$row[4];
									$semailid=$row[3];
								}
								while($row=mysqli_fetch_row($query_three))
								{
									$cname=$row[0];
									$ext=$cname;
								}
									require_once "Mail.php";
									$e=$e;
									$from = "HomeServices <homemaintenance2024@gmail.com>";
									$to = "<$e>";
									$subject = "AMC Book";
									$body = "Your AMC Booked Successfully 
											AMC Name : $cname
										    Service Provider Name : $sname
										    AMC Duration : $contractd
										    AMC Start Date : $cstartdate 
										    AMC End Date : $cenddate
										    Service Provider Contact Number : $sno
										    Service Provider Email Id : $semailid";

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
										echo("<p>Message successfully sent!</p>");
										//Mail To Service Provider
										 $query=mysqli_query($cn,"select * from contract_details where C_Email_Id='$e'");
										 
										 $query_two=mysqli_query($cn,"select * from client_details where C_Email_Id='$e'");
										if($query)
										{
											if($query_two)
											{
												while($row=mysqli_fetch_row($query_two))
												{
													$cname=$row[0];
													$cno=$row[2];
													$caddress=$row[4];
													echo $cname." ".$cno." ".$caddress;
												}
										 
												while($row=mysqli_fetch_row($query))
												{
													$contractd=$row[4];
													$cstartdate=$row[5];
													$cenddate=$row[6];
												}
										 
												require_once "Mail.php";
												$e="ishachavda1999@gmail.com";
												$from = "HomeServices <homemaintenance2024@gmail.com>";
												$to = "<$e>";
												$subject = "AMC Booked";
												$body = "Your AMC Service Booked By 
														Client Name :$cname   
														Client Contact Number : $cno
														Client Address : $address
														Client Email Id : $_SESSION[Client_Session]
														Contract Duration : $contractd
														Contract Start Date : $cstartdate 
														Contract End Date : $cenddate 
														Service Name : $ext";

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
												  echo("<p>Message successfully sent!</p>");
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
									
										echo "<script>alert('Successfully Booked');</script>";
									}//sp mail bracket
								
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
					}//query
					else
					{
						mysqli_error($cn);
					}
				}//q
				else
				{
					mysqli_error($cn);
				}
			}//db
			else
			{
				mysqli_error($cn);
			}
		}//cn
		else
		{
			mysqli_error($cn);
		}
	}//isset	
?>