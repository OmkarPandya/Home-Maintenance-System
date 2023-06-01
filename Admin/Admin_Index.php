<?php
session_start();
?>
<html>
<head>
<title>Admin Panel</title>
<link rel="shortcut icon" href="Image/Logo.png">
<script type="text/javascript">
  function iframeLoaded() {
      var iFrameID = document.getElementById('content');
      if(iFrameID) {
            // here you can make the height, I delete it first, then I make it again
            iFrameID.height = "";
            iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
      }   
  }
</script>
<style>
body
{
	overflow-y: scroll;
overflow-x: scroll;
}
header 
{
	height:17.2%;
	width:100%;
}
#Link
{
    display: block;
    margin-top:-125px;
    font-family:"segoe ui";
	font-size:35px;
	margin-right:-100px;
	text-decoration:none;
	color:black;
	font-weight:600;
}
#left
{
	float:left;
	height:81.9%;
	width:25%;
	position:relative;
	background:#333;
}
a
{
	font-family:"segoe ui";
	font-size:35px;
	text-decoration:none;
}
#right
{
	margin-left:25%;
	height:80%:
	width:75%;
	background:#250d00;
	//position:relative;
}
iframe
{
	height:80%;
	width:100%;
	border:none;
}
#left a:hover, .dropdown:hover .dropbtn 
{
    background-color: red;
}

#left a 
{	
	color: white;
    padding: 12px 16px;
    text-decoration: none;
    display:block;
	width:91.5%;
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
<body>
<header>
	
	<img src="../Image/Home_Logo.png">

	<!--<a href="Register_Admin.php" id="Link" style="margin-left:88%;">New Admin</a>--><br><br><br><br><br><br><br><br><br>
	<a href="Register_Admin.php" id="Link" style="margin-top:-185px;margin-left:70%;">Create New Admin</a>
	<a href="Logout_admin.php" id="Link" style="margin-top:-47px;margin-left:92%;">Logout</a>
	
	<?php
	
		$eid=$_SESSION["admin"]; 
		$cn=mysql_connect("localhost","root","");
		$db=mysql_select_db("home care");
		$q=mysql_query("select Name from admin where A_Email_Id='$eid'");
		if($q)
		{
			$row=mysql_fetch_row($q);
			echo "<a value='$row[0]' id='name' style='margin-top:2%;'>$row[0]</a>";
			
		}
		else
		{
			mysql_error();
		}
	?>
	
	

</header>
<br>
<!--<div class="container">	
	<a href="AddService.php" target="content">Add Service</a><br>
	<a href="AddSubService.php" target="content">Add Sub Service</a><br>
	<a href="RemoveService.php" target="content">Remove Service</a><br>
	<a href="RemoveSubService.php" target="content">Remove Sub Service</a>
</div>-->
<div id="left">
<a href="AddService.php" target="content">Add Service</a>
<a href="AddSubService.php" target="content">Add Sub Service</a>
<a href="RemoveService.php" target="content">Remove Service</a>
<a href="RemoveSubService.php" target="content">Remove Sub Service</a>
<a href="UpdateTable.php" target="content">Update Table</a>
<a href="AllTables.php" target="content">View Tables</a>
</div>

<div id="right">
<iframe id="content" name="content" onload="iframeLoaded()">
</iframe>
</div>
</body>
</html>	