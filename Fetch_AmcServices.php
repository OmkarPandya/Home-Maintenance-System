<html>
<head>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() 
{
	new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<style type="text/css">
<title>Client\FetchServices</title>
#spic
{
	height:100%;
	width:100%;
	background-color:red;
}
#photo
{
	height:180;
	width:110;
	display:inline-block;
	text-align:center;
	font-family:"segoe UI";	
	font-size:20;
	font-weight:700;
	border:1px solid black;
	position:relative;
	margin:2.8% auto;
	cursor:pointer;
	margin-left:20px;
}

#imgContainer
{
	width:100%;
	height:90%;
	margin: auto;
	text-align:center;
}

#img_photo
{
	height:130;
	width:110;
	position:relative;
}

input[type=radio]
{
	height:35;
	width:50;
}
</style>
</head>
<body>
<div id="google_translate_element"></div>
<?php

	$cn=mysqli_connect("localhost","root","root");
		
		if($cn)
		{
			$db=mysqli_select_db($cn,"home care");
			
			if($db)
			{
				$s = $_GET['Service_Id'];
				echo "<input type='hidden' id ='SId' name='SId' value='".$_GET['Service_Id']."' />";
				
				$qry = "SELECT * FROM service_provider_details s WHERE s.S_P_Id IN (SELECT S_P_Id FROM `service_provider_services` WHERE Service_Id='$s');";
				
				$spquery=mysqli_query($cn,$qry);
				
				echo "<div id='imgContainer'>";
				if($spquery)
				{	
					while($row=mysqli_fetch_row($spquery))
					{
						$dirname = "Service_Provider/$row[0]";
						
						$images=glob($dirname."*.*");
						
						foreach($images as $image)
						{
							
							echo  "<div  id='photo'> "."<div><img  id='img_photo' src='".$image."'  /><a href='ServiceProviderInfo.php?spid=$row[0]'>".$row[1]."</a><div>E.Year : ".$row[2]."<input type='radio' required name='rb' value='$row[0]'/></div></div></div>";
						
						}
					}
				}
				
				echo "</div>";
			}
		}
		
?>
</body>
</html>