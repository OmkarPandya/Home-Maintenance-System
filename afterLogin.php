<?php
	session_start();
?>
<html>
<head>
<title>Home Care</title>
<link rel="shortcut icon" href="Image/Logo.png">
<style type="text/css">
div#main
{	
	width:100%;
	height:58%;
}
a
{
	font-family:segoe UI;
	text-decoration:none;
	font-size:50;
	padding-left:40;
	font-weight:600;
}
#main
{
	height:100%;
	width:100%;
	border:none;
	//overflow:auto;
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

<div id="header">
	<img src="Image/Home_Logo.png">
	<a href='Logout_Client.php' id="a_Link" style="margin-left:81%;">Logout</a>
	<a href='Help_Client.php' id="a_Link" style="margin-left:91%;">Help</a>
	<?php
	
		$eid=$_SESSION["Client_Session"]; 
		$cn=mysqli_connect("localhost","root","root");
		$db=mysqli_select_db($cn,"home care");
		$q=mysqli_query($cn,"select C_Name from client_details where C_Email_Id='$eid'");
		if($q)
		{
			$row=mysqli_fetch_row($q);
			echo "<a value='$row[0]' id='name'>$row[0]</a>";
			
		}
		else
		{
			mysqli_error($cn);
		}
	?>
</div>
<br>
<div class="container">	
	<div class="dropdown">
    <!--<button class="dropbtn">MyService</button>
    <div class="dropdown-content">
      <a target="booked" href="Book_ServiceProvider.php">Booked</a>
      <a target="booked" href="Provided_ServiceProvider.php">Provided</a>
    </div>-->
	</div> 
	<a target="main" href="Client_Profile.php">My Details</a>
	<a target="main" href="Client_Services.php">Booked Services</a>
	<a target="main" href="Client_Cancle_Service.php">Cancel Service</a>
	<a target="main" href="Client_Amc.php">AMC</a>
	<a target="main" href="RegisterAmc.php">Register AMC Services</a>
	<a href="Client_Feedback.php" target="main">Feedback</a>
</div>
<!--<a target="main" href="Client_Services.php">Booked Services</a>
<a target="main" href="Client_Cancle_Service.php">Cancel Service</a>
<a target="main" href="Client_Amc.php">AMC</a>
<a href="Client_Feedback.php" target="main">Feedback</a>-->

<iframe name="main" id="main" src="Client_Profile.php">
</iframe>

</body>
</html>
