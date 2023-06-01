<?PHP session_start(); ?>

<html>
<head>
<title>Service Provider</title>
<link rel="shortcut icon" href="Image/Logo.png">
<style>
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
	font-size:25;
	font-weight:700;
    text-decoration: none;
}
#mbtn
{
	float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 20px 22px;
	font-family:segoe ui;
	font-size:25;
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
    box-shadow: 2px 10px 18px 2px rgba(0,0,0,0.2);
    z-index: 1;
	margin-top:73px;
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
    background-color: #ddd;
}

.dropdown:hover .dropdown-content 
{
    display: block;
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
<body>
<header>
	<img src="Image/Home_Logo.png">
	<a href='Logout_serviceprovider.php' id="a_Link" style="margin-left:83%;">Logout</a>
	<a href='Help_serviceprovider.php' id="a_Link" style="margin-left:94%;">Help</a>
	<?php
		$sid=$_SESSION["SP_Session"]; 
		$cn=mysqli_connect("localhost","root","root");
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			if($db)
			{
				$q=mysqli_query($cn,"select * from service_provider_details where S_P_Id='$sid'");
				if($q)
				{
					$row=mysqli_fetch_row($q);
					echo "<a id='name'>$row[1]</a>";
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
	?>
</header>
<br><br>
<div class="container">	
	<a target="booked" href="ServiceProvider_Profile.php">My Details</a>
	<div class="dropdown">
    <button class="dropbtn" id="mbtn">Services</button>
    <div class="dropdown-content">
      <a target="booked" href="Book_ServiceProvider.php">Booked</a>
      <a target="booked" href="Provided_ServiceProvider.php">Provided</a>
    </div>
	</div> 
	
	<a target="booked" href="AddService.php">Add Service</a>
	
	<div class="dropdown">
    <button class="dropbtn" id="mbtn">AMC</button>
    <div class="dropdown-content">
      <a target="booked" href="Booked_AMC.php">Booked AMC</a>
	<a target="booked" href="Service_AMC.php">AMC Services</a>
	<a target="booked" href="Payment_AMC.php">AMC Payment</a>
    </div></div>

	<a target="booked" href="Icon.php">Proceed Service Payment</a>
	<a target="booked" href="SP_feedback.php">My Feedbacks</a>
</div>
<br>
<iframe name="booked" src="ServiceProvider_Profile.php" id="booked"style="height:100%;width:100%;border:none;"></iframe>
</body>
</html>