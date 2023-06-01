<html>
<head>
<style type="text/css">
#content
{
	font-family:Segoe UI;
	font-size:20px;
	font-weight:700;
	text-align:justify;
	width:auto;
	height:auto;
	top:0;
	left:0;
}
</style>
</head>
<body>
<div id="content">
<?PHP
	$Sid=$_GET['Service_Id'];
	
	$myfile=fopen("TipsFiles/$Sid.txt","r");
		
		while(!feof($myfile)) 
		{
			echo fgets($myfile) . "<br>";
		}
		
		fclose($myfile);
?>
</body>
</html>